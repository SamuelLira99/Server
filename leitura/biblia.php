<?php
include '../php/connection.php';

// $book_name = 'Esdras';
// $book_chapters = 10;

// for($i = 1; $i <= $book_chapters; $i++) {
//     $query = "INSERT INTO books(already_read, `name`, chapters) VALUES(0, '$book_name', $i)";

//     $stmt = $conn->prepare($query);
//     if (!$stmt->execute()) {
//         echo 'erro - ';
//     } else {
//         echo 'inserido - ';
//     }
// }


?>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="/CSS/bootstrap/bootstrap.css">
</head>

<body>
    <script src="/JS/jquery-3.4.1.min.js"></script>
    <script src="/JS/leitura-biblia.js"></script>
    <h1 id="title-last-read" align="center">LAST
        <!-- <?php echo $last ?> -->
    </h1>

    <table id="tbl-bible-read" class="table table-striped">
    </table>
</body>

</html>