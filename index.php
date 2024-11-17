<?php

session_start();

$mysqli = new mysqli('127.0.0.1', 'root', '', 'MySite');
include("head.php");
include("header.php");
include("aside.php");


if(isset($_GET["s"])) $s=$_GET["s"];
else $s=1;

switch($s)
{
    case 1:
        include "body.php";
        break;
    case 2:
        include "content/about.php";
        break;
    case 3:
        include "content/services.php";
        break;
    case 4:
        include "content/portfolio.php";
        break;
    case 5:
        include "content/contact.php";
        break;
    case 228:
        include "content/add_article.php";
        break;
    default: include "body.php";
        break;
}


include("footer.php");

$mysqli->close();
?>