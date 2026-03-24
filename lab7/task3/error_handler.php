<?php
ob_start();

register_shutdown_function(function (){

    $error = error_get_last();

    if($error !== null && $error['type'] === E_ERROR){

        if (ob_get_length()) {
            ob_clean();
        }

        http_response_code(500);

        $resolveTime = date('H:i', strtotime('+2 hours'));

        echo "<div style='text-align: center; margin-top: 50px; font-family: sans-serif;'>";
        echo "<h1>500 Internal Server Error</h1>";
        echo "<h2>Щось пішло не так</h2></div>";
    }

    if(ob_get_length()){
        ob_end_flush();
    }
});

http_response_code(200);
echo "<h1>Вітаємо на сайті!</h1>";

//some_non_existent_function_to_crash_server();