<?php
$footerPath = 'E:/Disha Suthar/GitProject/weddingevent_tryangletech/resources/views/frontend/partials/footer.blade.php';
$content = file_get_contents($footerPath);

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

file_put_contents($footerPath, $content);
echo "Footer routes updated.\n";
