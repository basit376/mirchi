<?php
//creating a short variables 
$document_root = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mirchi 99</title>
    <style type="text/css">
table, th, td {
border-collapse: collapse;
border: 1px solid black;
padding: 6px;
}
th {
background: lightseagreen;
}
</style>
</head>
<body>
<h1>Mirchi 99 Matiari Fast Food</h1>
<h2>Customers Orders</h2>
<?php
//Read The Entire file 
//all order become element in array
$orders = file("$document_root/mirchi/order.txt");

//count the numbers of elements in array
$number_of_orders = count($orders);

if($number_of_orders == 0){
    echo "<p><strong>No orders pending.<br />
Please try again later.</strong></p>";
}
echo "<table>\n";
echo "<tr>
<th>Order Date</th>
<th>Chicken Roll</th>
<th>Tikka Boti</th>
<th>Mutton Handi</th>
<th>Pasta</th>
<th>Cuppuccino Coffe</th>
<th>Total</th>
<th>Address</th>
<tr>";
for ($i=0; $i<$number_of_orders; $i++) {
    //split up each line
    $line = explode("\t", $orders[$i]);
    // keep only the number of items ordered
$line[1] = intval($line[1]);
$line[2] = intval($line[2]);
$line[3] = intval($line[3]);
$line[4] = intval($line[4]);
$line[5] = intval($line[5]);
// output each order
echo "<tr>
<td>".$line[0]."</td>
<td style=\"text-align: right;\">".$line[1]."</td>
<td style=\"text-align: right;\">".$line[2]."</td>
<td style=\"text-align: right;\">".$line[3]."</td>
<td style=\"text-align: right;\">".$line[4]."</td>
<td style=\"text-align: right;\">".$line[5]."</td>
<td style=\"text-align: right;\">".$line[6]."</td>
<td>".$line[7]."</td>
</tr>";
}
echo "</table>";

?>    
</body>
</html>