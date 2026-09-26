<?php
$srcPath = 'E:/Disha Suthar/GitProject/weddingevent_tryangletech/resources/views/frontend/service-three.blade.php';
$src = file_get_contents($srcPath);

$start = '<div class="fda-navbar-wrapper">';
$end = '<div class="w-layout-vflex fda-nav-bottom-content">'; // We stop right before this, wait, no. The navbar-wrapper contains the bottom content?
// Let's use string positions to get the exact block.
$posStart = strpos($src, '<div class="fda-navbar-wrapper">');
$posEnd = strpos($src, '<div class="fda-menu-button w-nav-button">', $posStart);

$navbar = substr($src, $posStart, $posEnd - $posStart);

foreach (['portfolio.blade.php', 'portfolio-detail.blade.php'] as $file) {
    $path = 'E:/Disha Suthar/GitProject/weddingevent_tryangletech/resources/views/frontend/' . $file;
    $content = file_get_contents($path);
    
    $pStart = strpos($content, '<div class="fda-navbar-wrapper">');
    $pEnd = strpos($content, '<div class="fda-menu-button w-nav-button">', $pStart);
    
    if ($pStart !== false && $pEnd !== false) {
        $content = substr_replace($content, $navbar, $pStart, $pEnd - $pStart);
        file_put_contents($path, $content);
        echo "Replaced navbar in " . $file . "\n";
    }
}
