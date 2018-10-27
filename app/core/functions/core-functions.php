<?php

function getHeader($data = array())
{
    require APP_ROOT . '/views/components/core/header.php';
}

function getFooter($data = array())
{   
    require APP_ROOT . '/views/components/core/footer.php';
}

function env($value, $fallback)
{
    return getenv($value) ? getenv($value) : $fallback;
}

function namespaceByContent($src)
{
    if (preg_match('#^namespace\s+(.+?);$#sm', $src, $m)) {
        return $m[1];
    }
    return null;
}
