<?php 

/**
 * Including app folder files
 */
array_map(function ($file) {

    require __DIR__ . "/app/{$file}.php";

}, ['setup', 'admin', 'helpers', 'class-app']);