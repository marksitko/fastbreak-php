<?php

function the_header($data = array())
{
    require APP_ROOT . '/views/components/core/header.php';
}

function the_footer($data = array())
{   
    require APP_ROOT . '/views/components/core/footer.php';
}

function env($value, $fallback)
{
    return getenv($value) ? getenv($value) : $fallback;
}
