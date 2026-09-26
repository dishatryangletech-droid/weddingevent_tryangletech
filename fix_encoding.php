<?php
$file = 'E:/Disha Suthar/GitProject/weddingevent_tryangletech/resources/views/frontend/service-three.blade.php';
$content = file_get_contents($file);

// Fix "Making yourÂ Â "
$content = preg_replace('/Making your.*?<br \/>/u', 'Making your <br />', $content);

// Fix "You'll"
$content = preg_replace('/You.*?ll receive/u', 'You\'ll receive', $content);

// Fix "Let's"
$content = preg_replace('/Let.*?s create/u', 'Let\'s create', $content);

file_put_contents($file, $content);
echo "Fixed encoding issues.\n";
