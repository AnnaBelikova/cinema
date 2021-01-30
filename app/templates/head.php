<?php

$sections = array(

);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <? foreach($css as $style): ?>
    <link rel="stylesheet" href="./styles/<?= $style; ?>"/>
    <? endforeach; ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</head>
<body >

<div>
    <nav class="lightnav navbar navbar-expand-md ">
        <div class="container nav__container"><a href="/" class="mr-auto navbar-brand">
            <div class="logo_complex">
                <div class="logo">ВК</div>

            </div>
        </a>
            <div class="collapse navbar-collapse col-8">
                <ul class="nav__items navbar-nav">

                    <li class="nav-item <? $activeTemplate == 'index.php' ? 'active' : ''?> "><a class="nav-link" href="/cinema/app/index.php">Кинотеатры</a>
                    <li class="nav-item <? $activeTemplate == 'seanses.php' ? 'active' : ''?>"><a class="nav-link" href="/cinema/app/seanses.php">Расписание</a>
                    <li class="nav-item <? $activeTemplate == 'movies.php' ? 'active' : ''?>"><a class="nav-link" href="/cinema/app/films.php">Фильмы</a>


                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron ">
        <div class="container"><img src="./assets/images/HeHHKOvWVm8.jpg" width="1920px" height="486px" class="img-fluid" alt="BG">
            <div class="row row-header">
                <div class="jumbotron__info"><h1> ВРЕМЯ КИНО</h1>
                    <p> Погрузитесь в новые миры.</p></div>
            </div>
        </div>
    </div>
</div>
<div class="container main_container">
    <div class="row">