<?php

use function PHPSTORM_META\type;

if(isset($_POST['send'])){

    if(isset($_POST['title'])) $title = $_POST['title'];
    else $title='';

    if(isset($_POST['annotation'])) $annotation= $_POST['annotation'];
    else $annotation='';

    if(isset($_POST['text'])) $text = $_POST['text'];
    else $text='';

    if(isset($_POST['teg'])) $teg = $_POST['teg'];
    else $teg='';

    $title = mysqli_real_escape_string($mysqli, $title);
    $annotation = mysqli_real_escape_string($mysqli, $annotation);
    $text = mysqli_real_escape_string($mysqli, $text);
    $teg = mysqli_real_escape_string($mysqli, $teg);

    $data= date("Y-m-d");
    $id_user=$_SESSION['id'];
    echo $id_user;
    $comments = 5;

    $sql_art = "INSERT INTO `articles`(`id_user`, `title`, `annotation`, `text`, `teg`, `data`, `comments`) VALUES ($id_user, '$title', '$annotation', '$text', '$teg', '$data', '$comments')";
    $mysqli->set_charset('utf8mb4');
    $result = $mysqli->query($sql_art);
    if ($result) {
        echo "Статья успешно добавлена!";
    } else {
        echo "Ошибка: " . $mysqli->error;
    }
}

echo '
        <article>
            <form method="post">
                <li>
                    <span class="twitter">Название</span>
                    <input type="text" name="title" placeholder="Введите название статьи" required=true/>
                </li>
                <li>
                    <span class="twitter">Аннотация</span>
                    <input type="text" name="annotation" placeholder="Введите аннотацию статьи" required=true/>
                </li>
                <li>
                    <span class="twitter">Текст</span>
                    <input type="text" name="text" placeholder="Введите текст статьи" required=true/>
                </li>
                <li>
                    <span class="twitter">Тэги</span>
                    <input type="text" name="teg" placeholder="Введите тэги статьи" required=true/>
                </li>

                <input type="submit" value="Отправить статью" name="send"/>
            </form>
        </article>';

        echo $id_user;
?>