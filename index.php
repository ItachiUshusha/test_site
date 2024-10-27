<?php

include("head.php");
include("header.php");



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
    default: include "body.php";
        break;
}

// include("body.php");
include("aside.php");
include("footer.php");



?>