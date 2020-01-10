<?php

include './Connection.php';

$term = $_POST['term'];
$subCategory = $_POST['subCategoryId'];
$query = "SELECT food_id as id, food_name as value, food_price FROM `tbl_food_item` where subcategory_id = '" . $subCategory . "' AND  food_name like '%$term%'";

$result = mysqli_query($conn, $query);
if (!$result) {
    die(mysqli_error($conn));
}

$output = array();
while ($row = mysqli_fetch_assoc($result)) {
    $output[] = $row;
}
if (is_array($output)) {
    echo json_encode($output, JSON_NUMERIC_CHECK);
}

mysqli_free_result($result);
mysqli_close($conn);

