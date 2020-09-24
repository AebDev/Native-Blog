<?php
include 'functions.php';
$path = get_path();
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
$active_article = '';
$active_auteur = '';
$active_categorie = '';
$active_comentaire = '';
if (basename($_SERVER['PHP_SELF']) == 'admin_article.php') {
    $active_article = 'is-active';
}
if (basename($_SERVER['PHP_SELF']) == 'admin_author.php') {
    $active_auteur = 'is-active';
}
if (basename($_SERVER['PHP_SELF']) == 'admin_category.php') {
    $active_categorie = 'is-active';
}
if (basename($_SERVER['PHP_SELF']) == 'admin_comment.php') {
    $active_comentaire = 'is-active';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= basename($_SERVER['SCRIPT_NAME']) ?></title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script> 
</head>
<body class="sidebar-is-reduced">
    <header class="l-header">
        <div class="l-header__inner clearfix">
            <div class="c-header-icon js-hamburger">
                <div class="hamburger-toggle"><span class="bar-top"></span><span class="bar-mid"></span><span class="bar-bot"></span></div>
            </div>
            <?php if (isset($_SESSION['username'])) : ?>
                <div class="header-icons-group">
                    <a href="admin_header.php?logout='1'" style="color: red;">
                        <div class="c-header-icon logout"><i class="fa fa-power-off"></i></div>
                    </a>
                </div>
            <?php endif ?>
        </div>
    </header>
    <div class="l-sidebar">
        <div class="logo">
            <a class="logo__txt" href="<?= $path ?>"><img src="./assets/img/logo/adminlogo.png" width="50" alt=""></a>
        </div>
        <div class="l-sidebar__content">
            <nav class="c-menu js-menu">
                <ul class="u-list">
                    <li class="c-menu__item <?= $active_article ?>" data-toggle="tooltip" title="Article">
                        <a style="color: #fff;text-decoration: none;" href="<?= $path ?>/admin_article.php">
                            <div class="c-menu__item__inner"><i class="fas fa-th-list"></i>
                                <div class="c-menu-item__title"><span>Article </span></div>
                            </div>
                        </a>
                    </li>
                    <li class="c-menu__item <?= $active_auteur ?>" data-toggle="tooltip" title="Auteur">
                        <a style="color: #fff;text-decoration: none;" href="<?= $path ?>/admin_author.php">
                            <div class="c-menu__item__inner"><i class="fas fa-users"></i>
                                <div class="c-menu-item__title"><span>Auteur</span></div>
                            </div>
                            <a>
                    </li>
                    <li class="c-menu__item <?= $active_categorie ?>" data-toggle="tooltip" title="Categorie">
                        <a style="color: #fff;text-decoration: none;" href="<?= $path ?>/admin_category.php">
                            <div class="c-menu__item__inner"><i class="fas fa-tags"></i>
                                <div class="c-menu-item__title"><span>Categorie</span></div>
                            </div>
                            <a>
                    </li>
                    <li class="c-menu__item <?= $active_comentaire ?>" data-toggle="tooltip" title="Comentaire">
                        <a style="color: #fff;text-decoration: none;" href="<?= $path ?>/admin_comment.php">
                            <div class="c-menu__item__inner"><i class="fas fa-comments"></i>
                                <div class="c-menu-item__title"><span>Comentaire</span></div>
                            </div>
                        <a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>