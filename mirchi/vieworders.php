<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mirchi 99 Order-Results</title>
</head>
<body>
    <h1>Mirchi 99 Matiari Fast Food</h1>
    <h2>Customers Orders</h2>
    <?php
    //creating A Short Variables
    $document_root = $_SERVER['DOCUMENT_ROOT'];
    ?>

    <?php
    @$orders= file("$document_root/mirchi/order.txt");

    $number_of_orders = count($orders);
    if ($number_of_orders == 0) {
        echo "<p><strong>No orders pending.<br />
        Please try again later.</strong></p>";
        
        }

        for($i=0; $i<$number_of_orders;$i++){
            echo $orders[$i]."<br/>";

        }

    ?>
</body>
</html>