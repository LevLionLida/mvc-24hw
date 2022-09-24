<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= !empty($pageTitle) ? $pageTitle : 'Home' ?></title>
    <link rel="stylesheet" href="<?= ASSET_URL . '/libs/bootstrap/css/bootstrap.min.css' ?>">
<!--    <link rel="stylesheet" href="--><?= ''// ASSET_URL . '/css/main.css' ?><!--">-->
</head>
<body>
<?php Core\View::render('nav'); ?>