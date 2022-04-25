<?php

spl_autoload_register(function ($className) {
    $path = sprintf(
        '%1$s%2$s%3$s.php',
        realpath(dirname(__FILE__)),
        '/',
        str_replace('\\', '/', $className)
    );

    if (file_exists($path)) {
        include $path;
    } else {
        throw new Exception(
            sprintf(
                'Class with name %1$s not found. Looked in %2$s.',
                $className,
                $path
            )
        );
    } 
});
