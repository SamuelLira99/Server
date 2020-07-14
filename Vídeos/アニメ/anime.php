<?php $root = $_SERVER['DOCUMENT_ROOT'] ?>

<html>

<head>
    <title><?php echo $_GET['anime_dir']; ?></title>
    <link rel="stylesheet" href="/CSS/anime.css">
</head>

<body>
    <script src="/JS/jquery-3.4.1.min.js"></script>
    <!-- <script src="/JS/onepiece.js"></script> -->
    <script src="/JS/video-player.js"></script>
    <script src="/JS/episode-selector.js"></script>
    <script src="/JS/audio-extractor.js"></script>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    //print_r(globe('/*'));

    /*require('/home/samuel/php/connection.php');

        $conn = getConnection();

        $sql = 'SELECT * FROM animes';

        $stmt = $conn->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetchAll();

        foreach($result as $key => $value) {
            //echo '<br>'.$value['name'];
            $ep = $value['watching_episode'];
            //echo '<br>'.$value['total_episodes'];
        }*/

       // if(isset($ep)) {echo '$ep = '.$ep;} else {echo '$ep not set';}

    ?>

    <button onclick="location.href = 'animes.php'">戻る</button>

    <h1 id="h1-anime-name"><?php echo $_GET['anime_dir']; ?></h1>

    <?php
    $anime_name = $_GET['anime_dir'];
    $current_ep = $_GET['ep'];

    if($current_ep == '') {
        $current_ep = '01';
    }
	if($anime_name == 'ワンピース') {
		include 'onepiece.php';
	}


    $anime_dir = $_GET['anime_dir'].'/*.*';
    $episodes = glob($anime_dir);

    //extrair extensão dos arquivos
    $dot_pos = strpos($episodes[0], '.');
    $extension = substr($episodes[0], $dot_pos + 1);

    //adicionar número do episódio à string *
    $video_file = $anime_name.'/'.$anime_name.'第'.$current_ep.'話.'.$extension;
    // echo '<br>$video_file -> '.$video_file;
    //
    // echo '<br>$extension -> \''.$extension.'\'';
    ?>

    <div id="current_episode">
        <div id="video_player">
            <video id="vd" width="853" height="480" controls>
                <!--source src="<?php echo $episodes[$current_ep - 1] ?>"-->
                <source src="<?php echo $video_file ?>">
            </video>
        </div>
        <div id="ep_list">
            現在: <?php echo $current_ep;
            echo '<br><br><br>';

            foreach($episodes as $key => $value) {
                //Remover 'diretorio/' da string
                $slash_pos = strpos($episodes[$key], '/');
                $file_name = substr($episodes[$key], $slash_pos+1);

                $tmp_var = preg_match_all('/\d+/', $file_name, $matches);

                // echo $file_name.'<br>';
                // print_r($matches);
                echo '<a class="episode-changer" href="javascript:void" data-file="'.$file_name.'" data-anime-dir="'.$_GET['anime_dir'].'">第'.$matches[0][0].'話</a>';
                echo '<br>';
            }
            ?>
        </div>
    </div>

    <?php
    include "$root/php/div-ffmpeg.php";
    echo '<br><br><br>';
    // foreach($episodes as $key => $value) {
    //     //Remover 'diretorio/' da string
    //     $slash_pos = strpos($episodes[$key], '/');
    //     $file_name = substr($episodes[$key], $slash_pos+1);
    //
    //     echo $file_name.'<br>';
    //     echo '<video width="320" height="240" controls>
    //     <source src="'.$episodes[$key].'">
    //     </video></br></br></br></br></br>';
    // }

//     foreach($videos as $key => $value) {
//         echo $videos[$key].'</br>';
//         echo '<video src="'.$videos[$key].'" width="320" height="240" controls></video></br></br></br></br></br>';
//    }
?>
</body>
</html>
