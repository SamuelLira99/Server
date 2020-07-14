<?php
include "../php/connection.php";
$action = $_POST['action'];

$res = Array();

$table = '
<thead class="thead-dark">
    <tr>
        <th>Lido</th>
        <th>Livro</th>
        <th>Capítulo</th>
    </tr>
</thead>
<tbody>'."\n";


// $root = $_SERVER['DOCUMENT_ROOT'];

$conn = getConnection('bible');

include 'aj-inc-bible-last-read.php';

$query = "SELECT * FROM books";
    
$stmt = $conn->prepare($query);

if (!$stmt->execute()) {
    echo 'falha ao utilizar ajax';
} else {
    //echo 'com sucesso';
    $result = $stmt->fetchAll();
    
    foreach($result as $value) {
                
        $checked = $value['already_read'];
        $checked = $checked == 1 ? 'checked' : '';
                
        $table .= '
        <tr>
            <td><input id="checkbox-id-'.$value['id'].'" type="checkbox" '.$checked.'></td>
            <td id="book-id-'.$value['id'].'">'.$value['name'].'</td>
            <td id="chapter-id-'.$value['id'].'">'.$value['chapters'].'</td>
        </tr>'."\n";
        }
        $table .= ' </tbody>';
        $res['table'] = $table;
}

echo json_encode($res);
    
    
?>