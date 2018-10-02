<?php
include 'dbconnect.php';

$category = $_POST['category'];

$value = getGameInfoFromCategory($category);
$points = getPointBaseValues($value);

echo $points[0] ."," . $points[1];



