<?php

/**
 * @param string $path - posts/5
 */
function redirect(string $path = '')
{
    header('Location: ' . SITE_URL . '/' . $path);
}

function redirectBack()
{
    $redirect =  $_SERVER['HTTP_REFERER'] ?? '/';
    header('Location: ' . $redirect);
    exit;
}

function url(string $link = ''): string
{
    return SITE_URL . '/' . $link;
}
function isAdminRoute(): bool
{
    $parts = explode('/', $_SERVER['REQUEST_URI']);
    return in_array('admin', $parts);
}
