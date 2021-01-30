<?php
    include_once ('./functions.php');

    $title = "Главная";
    $activeTemplate = "index.php";
    $css=['style.css'];
    $js='js.js';

    view('./templates/head.php', compact('title', 'css', 'activeTemplate'));
    view('./templates/cinemas.php', compact('title','css', 'js'));
    view('./templates/footer.php', compact(  'js', 'css'));
?>