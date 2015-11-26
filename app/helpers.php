<?php

function base_path($appends = '')
{
    if ($appends) {
        $appends = '/'.$appends;
    }

    return realpath(__DIR__.'/../').$appends;
}

function back()
{
    header('Location: '.$_SERVER['HTTP_REFERER']);
    exit;
}

function e($nonsafe)
{
    if (is_array($nonsafe)) {
        return array_map('e', $nonsafe);
    }
    else {
        return htmlspecialchars($nonsafe, ENT_QUOTES);
    }
}