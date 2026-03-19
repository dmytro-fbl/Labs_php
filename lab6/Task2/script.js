const noteForm = document.getElementById('noteForm');
const notesList = document.getElementById('notesList');
const messageBox = document.getElementById('messageBox');
const cancelBtn = document.getElementById('cancelBtn');

document.addEventListener('DOMContentLoaded', loadNotes);

noteForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const id = document.getElementById('noteId').value;
    const title = document.getElementById('title').value.trim();
    const text = document.getElementById('text').value.trim();

    if (!title || !text) {
        showMessage('Заповніть всі поля!', 'error');
        return;
    }

    const action = id ? 'update' : 'create';
    const payload = id ? { id, title, text } : { title, text };

    try {
        const response = await fetch(`db.php?action=${action}`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });

        const result = await response.json();

        if (result.message) {
            showMessage(result.message, 'success');
            resetForm();
            loadNotes();
        } else {
            showMessage(result.error, 'error');
        }
    } catch (error) {
        showMessage('Помилка з\'єднання з сервером', 'error');
    }
});

async function loadNotes() {
    try {
        const response = await fetch('db.php?action=list');
        const notes = await response.json();

        notesList.innerHTML = '';

        if (notes.length === 0) {
            notesList.innerHTML = '<p>Заміток поки немає.</p>';
            return;
        }

        notes.forEach(note => {
            const div = document.createElement('div');
            div.className = 'note';
            div.innerHTML = `
                <h4>${escapeHTML(note.title)}</h4>
                <p>${escapeHTML(note.text)}</p>
                <button onclick="editNote(${note.id}, '${escapeQuotes(note.title)}', '${escapeQuotes(note.text)}')">Редагувати</button>
                <button onclick="deleteNote(${note.id})">Видалити</button>
            `;
            notesList.appendChild(div);
        });
    } catch (error) {
        notesList.innerHTML = '<p class="error">Не вдалося завантажити замітки.</p>';
    }
}

function editNote(id, title, text) {
    document.getElementById('noteId').value = id;
    document.getElementById('title').value = title;
    document.getElementById('text').value = text;

    document.getElementById('saveBtn').innerText = 'Оновити замітку';
    cancelBtn.style.display = 'inline-block';
}

async function deleteNote(id) {
    if (!confirm('Видалити цю замітку?')) return;

    try {
        const response = await fetch('db.php?action=delete', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id })
        });
        const result = await response.json();

        if (result.message) {
            showMessage(result.message, 'success');
            loadNotes();
        } else {
            showMessage(result.error, 'error');
        }
    } catch (error) {
        showMessage('Помилка видалення', 'error');
    }
}


cancelBtn.addEventListener('click', resetForm);

function resetForm() {
    document.getElementById('noteId').value = '';
    document.getElementById('title').value = '';
    document.getElementById('text').value = '';
    document.getElementById('saveBtn').innerText = 'Зберегти замітку';
    cancelBtn.style.display = 'none';
}

function showMessage(text, type) {
    messageBox.innerText = text;
    messageBox.className = type;
    setTimeout(() => { messageBox.innerText = ''; }, 3000);
}


function escapeHTML(str) {
    const div = document.createElement('div');
    div.innerText = str;
    return div.innerHTML;
}
function escapeQuotes(str) {
    return str.replace(/'/g, "\\'").replace(/"/g, '&quot;');
}