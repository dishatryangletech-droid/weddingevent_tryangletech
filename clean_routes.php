<?php

$dirs = [
    'E:/Disha Suthar/GitProject/weddingevent_tryangletech/resources/views/frontend',
    'E:/Disha Suthar/GitProject/weddingevent_tryangletech/resources/views/errors'
];

$simpleRoutes = [
    'home-two',
    'home-three',
    'service-one',
    'service-two',
    'classic-package',
    'elegance-package',
    'luxury-package',
    'venue',
    'style-guide',
    'licenses',
    'changelog',
    'instructions',
    'password-protected'
];

function processDirectory($dir, $simpleRoutes) {
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($iterator as $file) {
        if ($file->isFile() && str_ends_with($file->getFilename(), '.blade.php')) {
            $path = $file->getPathname();
            $content = file_get_contents($path);
            $originalContent = $content;

            foreach ($simpleRoutes as $route) {
                $content = str_replace("route('" . $route . "')", "url('#')", $content);
                $content = str_replace('route("' . $route . '")', "url('#')", $content);
                // Also handle cases with extra spaces
                $content = preg_replace("/route\(\s*'" . preg_quote($route, '/') . "'\s*\)/", "url('#')", $content);
            }

            // Handle parameterized venue.detail routes (like route('venue.detail', ['slug' => '...']))
            $content = preg_replace("/route\(\s*'venue\.detail'[^)]+\)/", "url('#')", $content);
            $content = preg_replace('/route\(\s*"venue\.detail"[^)]+\)/', "url('#')", $content);

            if ($content !== $originalContent) {
                file_put_contents($path, $content);
                echo "Cleaned routes in $path\n";
            }
        }
    }
}

foreach ($dirs as $dir) {
    if (is_dir($dir)) {
        processDirectory($dir, $simpleRoutes);
    }
}

echo "All extra route code removed.\n";
