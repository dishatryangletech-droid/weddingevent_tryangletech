<?php
$headerPath = 'E:/Disha Suthar/GitProject/weddingevent_tryangletech/resources/views/frontend/partials/header.blade.php';
$content = file_get_contents($headerPath);
$content = preg_replace("/{{ route\('venue\.detail', \['slug' => '[^']+'\]\) }}/", "{{ url('#') }}", $content);
file_put_contents($headerPath, $content);
echo "Fixed venue.detail routes";
