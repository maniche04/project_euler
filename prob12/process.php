<?php

require_once("functions.php");

$a = 1;
$trg = 0;
$greatest = 0;
$greatest_trg = 0;
Do {
    $trg += $a;
    $factor_count = get_num_factors($trg);

    if ($factor_count > $greatest) {
        $greatest = $factor_count;
        $greatest_trg = $trg;
        echo "New number found: " . $greatest_trg . " with " . $greatest . " factors. <br>";
        
    }
    if ($greatest > 500) {
        echo "The greatest factor is: " . $greatest . " for the triangle number: " . $greatest_trg;
        exit;
    }
    $a +=1;
} while ($greatest <= 500);
?>
