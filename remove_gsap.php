<?php
$d = 'E:/Disha Suthar/GitProject/weddingevent_tryangletech/resources/views/frontend';
$target = '<script src="{{ asset(\'js/gsap.min.js\') }}"></script>';

$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($d));
foreach ($iterator as $file) {
    if ($file->isFile() && str_ends_with($file->getFilename(), '.blade.php')) {
        $path = $file->getPathname();
        $content = file_get_contents($path);
        if (strpos($content, $target) !== false) {
            $content = str_replace($target, '', $content);
            file_put_contents($path, $content);
            echo "Updated " . $path . "\n";
        }
    }
}
echo "Done.\n";
