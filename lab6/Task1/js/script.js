const messageInDiv = document.getElementById('messageDb');
const buttonGetAllUsers = document.getElementById('getAllUsers');
const divList = document.getElementById('divListUsers');


document.getElementById('registrationForm').addEventListener('submit', function (event){
    event.preventDefault();

    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();

    if(!name || !email || !password){
        messageInDiv.innerText = 'Всі поля мають бути заповнені';
        messageInDiv.style.color = 'red';
        return;
    }

    const formData = {name, email, password};
    registerUser(formData);
});

async function registerUser(userData){
    try{
        const response = await fetch('db.php?action=register', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(userData)
        });

        const result = await response.json();

        if(result.message){
            messageInDiv.innerText = result.message;
            messageInDiv.style.color = "green";
            document.getElementById('registrationForm').reset();
        }else{
            messageInDiv.innerText = "Помилка: " + result.error;
            messageInDiv.style.color = "red";
        }
    }catch (error){
        console.log("Критична помилка: ", error);
        messageInDiv.innerText = "Не вдалось підключитись до серверу";
    }
}

document.getElementById('loginForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    const email = document.getElementById('loginEmail').value.trim();
    const password = document.getElementById('loginPass').value.trim();

    if (!email || !password) {
        alert("Будь ласка, заповніть всі поля для входу");
        return;
    }


    login(email, password);
});

async function login(email, password){
    try {
        const response = await fetch('db.php?action=login', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email, password })
        });

        const result = await response.json();

        if (result.status === 'success') {

            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('registrationForm').style.display = 'none';

            const welcomeBlock = document.getElementById('welcomeBlock');
            const userNameText = document.getElementById('userName');

            welcomeBlock.style.display = 'block';
            userNameText.innerText = result.message;
            userNameText.style.color = "green";
            messageInDiv.innerText = "";
        } else {
            alert('Помилка: ' + result.message);
        }
    } catch (error) {
        console.error('Помилка запиту:', error);
    }
}

async function deleteUser(id){
    try{
        await fetch('db.php?action=delete',{
            method: 'POST',
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify({id: id})
        });
        loadAllUser();

    }catch (error){
        console.error('Помилка запиту:', error);
    }
}

async function updateUser(id, name, email){
    try{
        await fetch('db.php?action=update',{
            method: 'POST',
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify({id, name, email})
        });
        loadAllUser();
    }catch (error){
        console.error('Помилка запиту:', error);
    }
}

function editUser(id, name, email){
    const newName = prompt("Ваше нове Ім'я: ", name);
    const newEmail = prompt("Ваша нова почта: ", email);

    if (!newEmail || !newName)
        return;
    updateUser(id, newName, newEmail);
}

 async function loadAllUser(){

     const response = await fetch('db.php?action=list');
     const users = await response.json();

     let html = '<table border="1" cellpadding="5" style="margin-top: 10px; border-collapse: collapse"><tr><th>ID</th><th>Ім\'я</th><th>Почта</th></tr>';

     users.forEach(user => {
         html += `<tr>
            <td>${user.id}</td>
            <td>${user.name}</td>   
            <td>${user.email}</td>
            <td>
                <button onclick="deleteUser(${user.id})">Видалити</button>
                <button onclick="editUser(${user.id}, '${user.name}', '${user.email}')">Редагувати</button>
            </td>
            </tr>`
     });
     html += '</table>';
     divList.innerHTML = html;
}
buttonGetAllUsers.addEventListener('click', async () => {
    try{
        loadAllUser();
    }catch (error){
        divList.innerText = "Помилка завантаження списку";
    }
});