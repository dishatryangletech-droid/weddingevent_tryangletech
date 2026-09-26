<?php
$files = [
    'E:/Disha Suthar/GitProject/weddingevent_tryangletech/resources/views/errors/404.blade.php'
];

foreach ($files as $path) {
    if (file_exists($path)) {
        $content = file_get_contents($path);
        
        // Replace Header
        $pStartNav1 = strpos($content, '<div data-wf--fda-navbar--variant');
        $pStartNav2 = strpos($content, '<div data-animation="default"');
        $pStartNav = $pStartNav1 !== false ? $pStartNav1 : $pStartNav2;
        $pEndNav = strpos($content, '<main>');
        if ($pEndNav === false) {
            $pEndNav = strpos($content, '<section'); // For pages without <main>
            if ($pEndNav === false) $pEndNav = strpos($content, '<div class="fda-utility-page-wrap'); // Fallback for 404
        }
        
        if ($pStartNav !== false && $pEndNav !== false) {
            $content = substr_replace($content, "@include('frontend.partials.header')\n  ", $pStartNav, $pEndNav - $pStartNav);
        }

        // Replace Footer
        $pStartFooter = strpos($content, '<section class="fda-footer');
        $pEndFooter = strpos($content, '</section>', $pStartFooter);
        if ($pStartFooter !== false && $pEndFooter !== false) {
            $pEndFooter += 10;
            $content = substr_replace($content, "@include('frontend.partials.footer')", $pStartFooter, $pEndFooter - $pStartFooter);
        }

        file_put_contents($path, $content);
        echo "Refactored $path\n";
    }
}

$file401 = 'E:/Disha Suthar/GitProject/weddingevent_tryangletech/resources/views/frontend/401.blade.php';
if (file_exists($file401)) {
    $content = file_get_contents($file401);
    $content = str_replace("route('home-two')", "url('#')", $content);
    file_put_contents($file401, $content);
    echo "Fixed route in 401\n";
}
