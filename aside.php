<?php

if(isset($_POST['logout'])) {
    unset($_SESSION['login']);
    unset($_SESSION['id']);
    session_destroy();
    header('Location: index.php');
    exit();    
}

echo '<div>';

if(isset($_POST['login'])) {$login = $_POST['login'];}
else $login = "";

if(isset($_POST['password'])) {$password = $_POST['password'];}
else $password = "";



$sql = "SELECT `id`, `login`, `art_in_page` FROM `users` WHERE `login`='$login' AND `password`='$password'";

$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    $_SESSION = $result->fetch_assoc();
}

echo '
    <aside>
        <section>
            <h1>Авторизация</h1>
            <form method="post" id="login_form">
            <ul id=inTouch>';

if(!(isset($_SESSION['id']))){
    echo '
                <li>
                    <span class="twitter">Логин:</span>
                    <input type="text" name="login" id="login"/>
                </li>
                <span id="msgbox" stile="display:none"></span>
                <li>
                    <span class=twitter>Пароль:</span>
                    <input type="password" name="password"/>
                </li>
                <input type="submit" value="Вход"/>
        ';
}
else if((isset($_SESSION['id']))) {
    echo '<h2>Добро пожаловать '.$_SESSION['login'].'</h2>
    <b><a href=index.php?s=228>Написать статью<br></a></b>  
    <input type="submit" name="logout" value="Выход"/>'
    ;
   }

echo '      </ul>
            </form>
        </section>
    </aside>
</div>';

?>
