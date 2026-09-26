<?php
$d = 'E:/Disha Suthar/GitProject/weddingevent_tryangletech/resources/views/frontend';

$search = <<<EOT
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('event') }}"
                    class="fda-menu-font-v1">Events</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
EOT;

$replace = <<<EOT
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('event') }}"
                    class="fda-menu-font-v1">Events</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('portfolio') }}"
                    class="fda-menu-font-v1">Portfolio</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
EOT;

$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($d));
foreach ($iterator as $file) {
    if ($file->isFile() && str_ends_with($file->getFilename(), '.blade.php')) {
        $path = $file->getPathname();
        $content = file_get_contents($path);
        
        $contentNormalized = str_replace("\r\n", "\n", $content);
        $searchNormalized = str_replace("\r\n", "\n", $search);
        $replaceNormalized = str_replace("\r\n", "\n", $replace);
        
        // Only insert if it doesn't already have the Portfolio link
        if (strpos($contentNormalized, "route('portfolio')") === false && strpos($contentNormalized, $searchNormalized) !== false) {
            $contentNormalized = str_replace($searchNormalized, $replaceNormalized, $contentNormalized);
            file_put_contents($path, $contentNormalized);
            echo "Updated " . $path . "\n";
        }
    }
}
echo "Done.\n";
