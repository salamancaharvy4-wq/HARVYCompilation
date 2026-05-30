<?php
$file = __DIR__ . '/vendor/laravel/framework/src/Illuminate/Foundation/Application.php';
echo "Checking file: $file\n";
if (file_exists($file)) {
    echo "File exists!\n";
    require $file;
    echo "Class loaded successfully!\n";
} else {
    echo "File does not exist.\n";
}
