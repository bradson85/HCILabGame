<?php
include 'dbconnect.php';

$cluedata = matchCategoryClue('life');
$soldata = matchCategorySolution('life');


print_r($cluedata);
print_r($soldata);
?>