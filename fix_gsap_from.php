<?php
$d = 'E:/Disha Suthar/GitProject/weddingevent_tryangletech/resources/views/frontend';

$search = <<<EOT
      gsap.from(targets, {
        opacity: 0,
        y: 30,
        duration: 0.6,
        delay: 0.5,
        ease: "power2.out",
        stagger: {
          each: 0.2,
          from: "start"
        }
      });
EOT;

$replace = <<<EOT
      gsap.fromTo(targets, 
        { opacity: 0, y: 30 }, 
        {
          opacity: 1,
          y: 0,
          duration: 0.6,
          delay: 0.5,
          ease: "power2.out",
          stagger: {
            each: 0.2,
            from: "start"
          }
        }
      );
EOT;

$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($d));
foreach ($iterator as $file) {
    if ($file->isFile() && str_ends_with($file->getFilename(), '.blade.php')) {
        $path = $file->getPathname();
        $content = file_get_contents($path);
        
        // Normalize line endings for replacement
        $contentNormalized = str_replace("\r\n", "\n", $content);
        $searchNormalized = str_replace("\r\n", "\n", $search);
        
        if (strpos($contentNormalized, $searchNormalized) !== false) {
            $contentNormalized = str_replace($searchNormalized, $replace, $contentNormalized);
            file_put_contents($path, $contentNormalized);
            echo "Updated " . $path . "\n";
        }
    }
}
echo "Done.\n";
