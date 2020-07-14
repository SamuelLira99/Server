<?php
$query = "SELECT * FROM last_read";

$stmt = $conn->prepare($query);
$stmt->execute();

$result = $stmt->fetchAll();

foreach($result as $value) {
    $last_read_book = "$value[book] $value[chapter]";
    $res['last_read_book'] = $last_read_book;
}
?>