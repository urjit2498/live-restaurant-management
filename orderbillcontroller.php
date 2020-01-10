<table border="1px black solid">
        <th>Food Name</th>
        <th>Order Cost</th>
        <th>Food Quantity</th>
        
           

<?php
include './Connection.php';
if(!$conn){
    mysqli_connect_errno();
}
else{
      
       
        $query = "SELECT fi.*,obt.* from order_bill_txn obt LEFT JOIN tbl_food_item fi ON fi.food_id=obt.food_id ";
       // $query="select ob.* from tbl_order_bill ORDER BY ob.table_name";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr> <td>" . $row['food_name'] . "</td>"
                . "<td>" . $row['order_cost'] . "</td>"
                . "<td>" . $row['quantity'] . "</td></tr>";
             
            }
        }
}
        ?>
</table>
            
