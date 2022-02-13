<?php

spl_autoload_register('myautoloader');

function myautoloader($className)
{
    $path = "../classes/";
    $extention = ".class.php";
    $fullPath = $path . $className . $extention;

    if (!file_exists($fullPath)) {
        return false;
    }
    require $fullPath;
}


