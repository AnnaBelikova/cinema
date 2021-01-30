<?php
include_once ('./functions.php');



$title = "Фильмы";
$css=['style.css'];

view('./templates/head.php', compact('title', 'css'));
view('./templates/films.php', compact('css'));
view('./templates/footer.php', compact('css'));
