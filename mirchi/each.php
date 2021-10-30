<?php
$prices = array('Chicken Roll'=>100, 'Tikka Boti'=>240, 'Mutton Handi'=>350, 'Pasta'=>120, 'Cuppuccino Coffe'=>150);

echo "<ol>";
foreach($prices as $key => $value){
    echo "<li> $key _$value</li>";
    
}
echo "</ol>";
?>
