<?php
$id = $_POST['id'];
$red_occurrences = $_POST['red_occurrences'];
$orange_occurrences = $_POST['orange_occurrences'];
$yellow_occurrences = $_POST['yellow_occurrences'];
$color = $_POST['color'];

//echo "<<<RED: $red_occurrences>>> - <<<ORANGE: $orange_occurrences>>> - <<<YELLOW: $yellow_occurrences>>>";
//echo "color: $color";

include '../php/connection.php';

$conn = getConnection('calendar');

$query = "UPDATE calendar_days
SET bg_color = '$color',
occurrences_red = $red_occurrences,
occurrences_orange = $orange_occurrences,
occurrences_yellow = $yellow_occurrences
WHERE id = $id";

$stmt = $conn->prepare($query);

$status = $stmt->execute() ? '完了' : 'エラー';

echo 'status: '.$status;
//echo $query;