<?php
$headerPath = 'E:/Disha Suthar/GitProject/weddingevent_tryangletech/resources/views/frontend/partials/header.blade.php';
$content = file_get_contents($headerPath);

$removedRoutes = [
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

foreach ($removedRoutes as $route) {
    $content = str_replace("route('" . $route . "')", "url('#')", $content);
    $content = str_replace('route("' . $route . '")', "url('#')", $content);
}

file_put_contents($headerPath, $content);
echo "Header routes updated.\n";
