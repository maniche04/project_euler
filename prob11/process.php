<?php

$file = "source.txt";

$handle = fopen($file, 'r');

$data = array();

$num1 = 0;


Do {
    $num2 = 0;
    $skip = 0;
    $text = fgets($handle);
    //echo $text . "<br>";
    Do {
        $data[$num1][$num2] = substr($text, $skip, 2);
        //echo "[{$num1},{$num2}]" . " = " . $data[$num1][$num2];
        $skip += 3;
        $num2 += 1;
    } while ($num2 <= 19);
    //echo "<hr>";
    $num1 += 1;
} while ($num1 <= 19);

//the things starts here

$result_h = 0;
$result_v = 0;
$result_d = 0;

$a = 0;
$b = 0;

//horizontal greatest

Do {
    //HORIZONTAL
    $b =0;
    Do {
    if ($b < 16) {
        $product = $data[$a][$b] * $data[$a][$b+1] * $data[$a][$b+2] * $data[$a][$b+3] ;
        if ($product > $result_h) {
            //echo "<hr> Found a greater product. Horizontal: Line Number " . ($a +1) . " | Column Number " . ($b +1) . "<hr>";
            $result_h = $product;
        }
    }
    $b +=1;
    } while ($b <=19);
        
    //VERTICAL
    $b =0;
    Do {
    if ($a < 16) {
        $product = $data[$a][$b] * $data[$a+1][$b] * $data[$a+2][$b] * $data[$a+3][$b] ;
        if ($product > $result_v) {
            //echo "<hr> Found a greater product. Horizontal: Line Number " . ($a +1) . " | Column Number " . ($b +1) . "<hr>";
            $result_v = $product;
        }
    }
    $b +=1;
    } while ($b <=19);
    
    //DIAGONAL RIGHT
    $b =0;
    Do {
    if ($a < 16 && $b <16) {
        $product = $data[$a][$b] * $data[$a+1][$b+1] * $data[$a+2][$b+2] * $data[$a+3][$b+3] ;
        if ($product > $result_d) {
            //echo "<hr> Found a greater product. Horizontal: Line Number " . ($a +1) . " | Column Number " . ($b +1) . "<hr>";
            $result_d = $product;
        }
    }
    $b +=1;
    } while ($b <=19);
    
    //DIAGONAL LEFT
    $b =0;
    Do {
    if ($a < 16 && $b >= 3) {
        $product = $data[$a][$b] * $data[$a+1][$b-1] * $data[$a+2][$b-2] * $data[$a+3][$b-3] ;
        if ($product > $result_d) {
            //echo "<hr> Found a greater product. Horizontal: Line Number " . ($a +1) . " | Column Number " . ($b +1) . "<hr>";
            $result_d = $product;
        }
    }
    $b +=1;
    } while ($b <=19);
    
    $a +=1; 
} while ($a<=19);


echo "The greatest product for Horizantal line is : " . $result_h . "<br>";
echo "The greatest product for Vertical line is : " . $result_v . "<br>";
echo "The greatest product for Diagonal line is : " . $result_d;

echo "The greatest product is: " . max($result_d,$result_h,$result_v);

?>
