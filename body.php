<div>
<div id="content">
<?php

$sql_count = "SELECT count(*) FROM articles";
$article_max= $mysqli->query($sql_count)->fetch_assoc()['count(*)'];

$page=isset($_GET['page']) ? (int)$_GET['page']+1 : 1;

if(isset($_SESSION['login'])){
    $n = $_SESSION['art_in_page'];
}
else $n = 5;

$page_max=ceil($article_max/$n);

if($page==1) 
{
    $start=0;
    $end=$n;
}
else 
{
    $start = ($page-1)*$n;
    $end = $start+$n-1;
}

$article_sql = $mysqli->query("SELECT `title`, `annotation`, `text`, `teg`, `comments`, `data`, `id_user` FROM `articles` limit $start , $n");

if ($article_sql->num_rows > 0) {
    $articles = [];

    while($row= $article_sql->fetch_assoc()){
        $articles[] = $row;
    }
    } 
    else {
        echo "Статьи не найдены.";
    }


foreach($articles as $index=>$article){

    if($_SESSION['id'] == $article['id_user']) echo"<b><a href=index.php?s=128&id_art=".$article['id_user'].">Удалить статью</a></b>";
    echo "
        <article>
            <header>
                <div class='comments'>".htmlspecialchars($article['comments'])."</div>
                <div class=time>
                    <div class=year>".htmlspecialchars(substr($article['data'], 0, 4))."</div>
                    <div class=date>".htmlspecialchars(substr($article['data'], 5, 7-5))."<span>".htmlspecialchars(substr($article['data'], 8, 10-8 ))."</span></div>
                </div>
            </header>
            <h1>".htmlspecialchars($article['title'])."</h1>
            <p>".htmlspecialchars($article['text'])."</p>
            <footer>                  
            </footer>
        </article>";
}

echo '<div id="indented">';
for($i=1; $i<=$page_max; $i++) echo'<a class=pageStyle href=index.php?s=1&page='.($i-1).'>'.$i.'</a>';

?>
</div>
</div>