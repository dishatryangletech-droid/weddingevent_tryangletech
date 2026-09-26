<?php

$dir = 'E:/Disha Suthar/GitProject/weddingevent_tryangletech/resources/views/frontend';
$partialsDir = $dir . '/partials';
if (!is_dir($partialsDir)) {
    mkdir($partialsDir, 0755, true);
}

// 1. Extract header and footer from service-three.blade.php
$sourceFile = $dir . '/service-three.blade.php';
$sourceContent = file_get_contents($sourceFile);

// Extract Header
$startNav1 = strpos($sourceContent, '<div data-wf--fda-navbar--variant');
$startNav2 = strpos($sourceContent, '<div data-animation="default"');
$startNav = $startNav1 !== false ? $startNav1 : $startNav2;
$endNav = strpos($sourceContent, '<main>');
if ($endNav === false) {
    $endNav = strpos($sourceContent, '<section'); // Fallback if no main
}
// Trim any trailing whitespace or newlines from the extracted header
$headerHtml = trim(substr($sourceContent, $startNav, $endNav - $startNav));
file_put_contents($partialsDir . '/header.blade.php', $headerHtml);
echo "Created partials/header.blade.php\n";

// Extract Footer
$startFooter = strpos($sourceContent, '<section class="fda-footer');
$endFooter = strpos($sourceContent, '</section>', $startFooter) + 10;
$footerHtml = trim(substr($sourceContent, $startFooter, $endFooter - $startFooter));
file_put_contents($partialsDir . '/footer.blade.php', $footerHtml);
echo "Created partials/footer.blade.php\n";

// 2. Iterate over all blade files
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
foreach ($iterator as $file) {
    if ($file->isFile() && str_ends_with($file->getFilename(), '.blade.php')) {
        $path = $file->getPathname();
        
        // Skip partials and layouts
        if (strpos($path, 'partials') !== false || strpos($path, 'layouts') !== false) {
            continue;
        }

        $content = file_get_contents($path);
        
        // Replace Header
        $pStartNav1 = strpos($content, '<div data-wf--fda-navbar--variant');
        $pStartNav2 = strpos($content, '<div data-animation="default"');
        $pStartNav = $pStartNav1 !== false ? $pStartNav1 : $pStartNav2;
        $pEndNav = strpos($content, '<main>');
        if ($pEndNav === false) {
            $pEndNav = strpos($content, '<section');
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

echo "Done.\n";
