<?php
include_once ('./functions.php');



$title = "Забронированные места";
$css=['style.css'];

view('./templates/head.php', compact('title', 'css'));
view('./templates/places.php', compact('css'));
view('./templates/footer.php', compact('css'));