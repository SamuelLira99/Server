<?php 
include "../php/connection.php";

$id = $_POST['id'];
$alreadyRead = $_POST['alreadyRead'];
$book = $_POST['book'];
$chapter = $_POST['chapter'];

$res = Array();

$conn = getConnection('bible');
$query = "UPDATE books SET already_read = $alreadyRead WHERE id = $id";

$stmt = $conn->prepare($query);

if(!$stmt->execute()) {
    $res['statusAlreadyRead'] = 'erro ao atualizar os dados';
} else {
    $res['statusAlreadyRead'] = 'atualizado com sucesso';
}


// echo "\n".$query;

if($book != NULL && $chapter != NULL) {
   $query = "UPDATE last_read SET book = '$book', chapter = $chapter";

   $stmt = $conn->prepare($query);
   
    if(!$stmt->execute()) {
        $res['statusLastRead'] = 'erro ao atualizar ultimo livro';
    } else {
        $res['statusLastRead'] = 'ultimo livro atualizado com sucesso';
    }

    include 'aj-inc-bible-last-read.php';

//    echo "\n".$query;
}

// echo "\nid => ".$id;

// echo "\n".print_r($id);
echo json_encode($res);

?>