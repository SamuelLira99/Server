<?php

$video_source = $_POST['videoSource'];
$from_time = $_POST['fromTime'];
$to_time = $_POST['toTime'];

$datetime = date('Y-m-d-H-i-s');
$file_extension = '.mp3';
$filename = '文-'.$datetime;
$file = $filename.$file_extension;

shell_exec('rm /home/samuel/tmp/*');

$command = '/usr/bin/ffmpeg -y -i "/home/samuel/Vídeos/アニメ/'.$video_source.'" -ss '.$from_time.' -to '.$to_time.' "/home/samuel/tmp/'.$file.'" 2>&1';


// echo shell_exec($command);

$res = array();

$res['file'] = $file;
$res['output'] = shell_exec($command);

echo json_encode($res);
// echo 'executing \''.$command.'\' for your anki deck, ご主人様！';