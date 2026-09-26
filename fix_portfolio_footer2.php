<?php
foreach (['portfolio.blade.php', 'portfolio-detail.blade.php'] as $file) {
    $path = 'E:/Disha Suthar/GitProject/weddingevent_tryangletech/resources/views/frontend/' . $file;
    $content = file_get_contents($path);
    $pStartFooter = strpos($content, '<!-- Instagram Gallery Footer Section -->');
    if ($pStartFooter !== false) {
        $pEndSection = strpos($content, '</section>', $pStartFooter);
        if ($pEndSection !== false) {
            $content = substr_replace($content, "@include('frontend.partials.footer')\n", $pStartFooter, $pEndSection - $pStartFooter + 10);
            file_put_contents($path, $content);
            echo 'Fixed footer for ' . $file . "\n";
        }
    }
}
