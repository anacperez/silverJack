<?php

$suits = array("clubs", "diamonds", "hearts", "spades");
$deck = array();
for($i = 0; $i < 53; $i++)
{
    $deck[] = $i;
}
shuffle($deck);

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>
            SilverJack!
        </title>
        <link rel="stylesheet" type = "text/css" href="styles.css">
    </head>
    <body>
        <div id="header1">
            <h1><center>SilverJack</center></h1>
        </div>
    </body>
</html>