<?php
$pictures = array('chicken-roll.png', 'tikka-boti.png','mutton-handi.png','pasta.png','coffe.png');

shuffle($pictures);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Mirchi 99</title>
</head>
<body>
    <h1>Mirchi 99 Matiari Fast Food</h1>
    <div align="center">
        <table style="width:100%;border: 0">
        <tr>
            <?php
            for ($i = 0; $i < 3; $i++) {
                echo "<td style=\"width: 25%; text-align: center\">
                <img src=\"";
                echo $pictures[$i];
                echo "\"/></td>";
                }
            
            ?>

        </tr>
        </table>
    </div> 
</body>
</html>