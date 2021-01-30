<?php
    include_once ('./functions.php');

    $title = "Расписание";
    $css=['style.css'];
    $js='js.js';

    view('./templates/head.php', compact('title', 'css'));
    view('./templates/seanses.php', compact('title','css'));
    view('./templates/footer.php', compact('css', 'js'));
