<div>
<div id="content">
<?php
$mysqli = new mysqli('127.0.0.1', 'root', '', 'MySite');
$article_max= $mysqli->query("SELECT count(*) FROM articles")->fetch_assoc()['count(*)'];
$n=5;
$page_max=ceil($article_max/$n);
$page=isset($_GET['page']) ? (int)$_GET['page']+1 : 1;

if($page==1) 
{
    $start=1;
    $end=$n;
}
else 
{
    $start = ($page-1)*$n+1;
    $end = $start+$n-1;
}

for($i=$start; $i<=$end; $i++)
{
    echo "
    <article>
        <header>
            <h1>Статья №$i</h1>
        </header>
        <p>Curabitur ut congue hac, diam turpis maecenas id vestibulum nulla nisl, libero leo, ut scelerisque maecenas id, ornare magna orci. In blandit sed et sagittis non, ullamcorper nec metus felis vel, vestibulum a in sit. Leo non odio fermentum lectus cubilia, mauris aliquam nunc eu neque ac sollicitudin. Tincidunt nisl morbi nulla rutrum, adipisicing tellus integer nunc massa id quis. Cursus sagittis massa ac sociis interdum, sem cursus, enim aptent sit, semper mauris, quam urna sed quis vivamus</p>
        <footer> </footer>
    </article>";

    if($i==$article_max) break;
}
echo '<div id="indented">';
for($i=1; $i<=$page_max; $i++) echo'<a class=pageStyle href=index.php?s=1&page='.($i-1).'>'.$i.'</a>';

$mysqli->close();
?>
</div>
</div>