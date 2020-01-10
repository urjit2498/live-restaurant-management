<?php

include './Connection.php';

if ($_POST['page'] == 'sltCategory') {
    $query = "SELECT category_id as id, category_name as name FROM tbl_category order by category_name";
} else if ($_POST['page'] == 'sltSubCategory') {
    $id = $_POST['id'];
    $query = "SELECT subcategory_id as id, subcategory_name as name FROM tbl_subcategory WHERE category_id = '" . $id . "' order by subcategory_name";
} else if ($_POST['page'] == 'sltFood') {
    $id = $_POST['id'];
    $query = "SELECT food_id as id, food_name as name FROM tbl_food_item WHERE subcategory_id = '" . $id . "' order by food_name";

    echo $query;
}

echo("<option value = '0'>---Select---</option>");

$result = mysqli_query($conn, $query);
if (!$result) {
    mysqli_error($conn);
    die('Invalid Query' . $query);
}
while ($row = mysqli_fetch_array($result)) {
    echo("<option value = '" . $row['id'] . "' >" . $row['name'] . "</option>");
}



mysqli_free_result($result);
mysqli_close($conn);




