<?php
function autoLoad($classe)
{
    $file = 'Modele/Classes/' . $classe . '.php';
    if (file_exists($file))
        include $file;
}

spl_autoload_register('autoLoad');