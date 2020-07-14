<?php $root  = $_SERVER['DOCUMENT_ROOT']; 

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    include "$root/php/connection.php";

    $conn = getConnection('animes');
    $query = "SELECT * FROM onepiece";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach($result as $value) {
        echo $value['saga'].' <--> '.$value['arc'].' <--> '.$value['episode'];
        echo '<br>';
    }

?>
<html>

<head>
    <title>ONEPIECE</title>
    <link rel="stylesheet" href="/CSS/onepiece.css">

</head>

<body>
    <script src="/JS/jquery-3.4.1.min.js"></script>
    <script src="/JS/onepiece.js"></script>
    <script src="/JS/video-player.js"></script>
    <script src="/JS/audio-extractor.js"></script>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    echo '海賊王に俺は成る！から';

    $current_episode = str_pad($_GET['ep'], 3, "0", STR_PAD_LEFT);
    // echo "ep: $current_episode";
    ?>
    
    <h1>リーラーサムエル君サーバー/アニメ/ワンピース(開発中)</h1>

    <div id="current-episode">
        <div id="video-player">
            <video id="vd" controls>
                <source src="ワンピース/ワンピース第<?php echo $current_episode; ?>話.mp4">
            </video>
        </div> <div id="ep-list">
                現在: <?php echo $current_episode; ?>
        </div>
    </div>

    <?php include "$root/php/div-ffmpeg.php" ?>

    <br><br><br><br>

    <ul id="onepiece-sagas">
        <li><a id="onepiece-saga-east-blue">東の海編</a>
            <ul>
                <li><a id="onepiece-arc-romance-dawn">Romance Dawn</a></li>
                <li><a id="onepiece-arc-orange town">Orange Town</a></li>
                <li><a id="onepiece-arc-syrup-village">Syrup Village</a></li>
                <li><a id="onepiece-arc-baratie">Baratie</a></li>
                <li><a id="onepiece-arc-arlong-park">Arlong Park</a></li>
                <li><a id="onepiece-arc-loguetown">Loguetown</a></li>
            </ul>
        </li>

        <li><a>アラバスタ編</a>
            <ul>
                <li><a>Reverse Mountain</a</li>
                <li><a>Whiskey Peak</a></li>
                <li><a>Little Garden</a></li>
                <li><a>Drum Island</a></li>
                <li><a>Alabasta</a></li>
            </ul>
        </li>
        
        <li><a>空島編</a>
            <ul>
                <li><a>Jaya</a></li>
                <li><a>Skypiea</a></li>
                <li><a>Goat Island</a></li>
                <li><a>Ruluka Island</a></li>
                <li><a>G-8</a></li>
            </ul>
        </li>
        
        <li><a>ウオーターセブン編</a>
            <ul>
                <li><a>Long Ring Long Land</a></li>
                <li><a>Water 7</a></li>
                <li><a>Enies Lobby</a></li>
                <li><a>Post Enies Lobby</a></li>
                <li><a>Ocean's Dream</a></li>
                <li><a>Foxy's Return</a></li>
            </ul>
        </li>
        
        <li><a>スリラーバーク編</a>
            <ul>
                <li><a>Thriller Bark</a></li>
                <li><a>Ice Hunter</a></li>
                <li><a>Spa Island</a></li>
            </ul>
        </li>
        
        <li><a>頂上戦争編</a>
            <ul>
                <li><a>Sabaody Archipelago</a></li>
                <li><a>Amazon Lily</a></li>
                <li><a>Impel Down</a></li>
                <li><a>Marine Ford</a></li>
                <li><a>Posr-War</a></li>
                <li><a>Little East Blue</a></li>
            </ul>
        </li>
        
        <li><a>魚人島編</a>
            <ul>
                <li><a>Return to Sabaody</a></li>
                <li><a>Fishman Island</a></li>
            </ul>
        </li>
        
        <li><a>ドレスロザ編</a>
            <ul>
                <li><a>Punk Hazard</a></li>
                <li><a>Dressrosa</a></li>
                <li><a>Z's Ambition</a></li>
                <li><a>Caesar Retrieval</a></li>
            </ul>
        </li>
        
        <li><a>四帝編</a>
            <ul>
                <li><a>像<a></li>
                <li><a>ホールケーキ<a></li>
                <li><a>レベリー<a></li>
                <li><a>ワノ国<a></li>
                <li><a>Silver Mine<a></li>
                <li><a>Marine Rookie<a></li>
                <li><a>Carbonic Acid King<a></li>
            </ul>
        </li>
    </ul>
   
</body>

</html>