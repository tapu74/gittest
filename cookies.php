<?php
if(isset($_GET["color"]))
{
    setcookie("color", $_GET["color"]);    
    header("Location: " . $_SERVER["PHP_SELF"]);
}

if(isset($_GET["reset"]))
{
    setcookie("color", "");
    header("Location: " . $_SERVER["PHP_SELF"]);
}

if(isset($_COOKIE["color"]))
{
    echo "Your favorite color is: " . $_COOKIE["color"] . "<br />"; 
    echo "<a href=\"?reset=1\">Click here to reset</a>";
}
else
{
    echo "What's your favorite color?<br /><br />";
    echo "<a href=\"?color=red\">Red</a>&nbsp;&nbsp;";
    echo "<a href=\"?color=green\">Green</a>&nbsp;&nbsp;";
    echo "<a href=\"?color=blue\">Blue</a>&nbsp;&nbsp;";
}
?>