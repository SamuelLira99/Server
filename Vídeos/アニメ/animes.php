<html>
<head>
    <title>アニメ</title>
</head>

<body>
    <h1>アニメ</h1>

<?php
    $animes = (glob("*", GLOB_ONLYDIR));

    foreach($animes as $key => $value) {
        if($animes[$key] == 'ワンピース') {
            //echo '$animes[$key] => \''.$animes[$key].'\'<br>';
            echo '<a href="onepiece.php?ep="><img src=".thumbs/'.$animes[$key].'.jpg" width="225" height="318" alt="'.$animes[$key].'" title="'.$animes[$key].'"></a>';
        } else {
            echo '<a href="anime.php?anime_dir='.$animes[$key].'&ep="><img src=".thumbs/'.$animes[$key].'.jpg" width="225" height="318" alt="'.$animes[$key].'" title="'.$animes[$key].'"></a>';
        }
        
        
    }//'.$animes[$key].'
?>

</body>
</html>
