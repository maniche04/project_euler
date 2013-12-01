<?php

function get_factors($number) { //does not appear to work at the very moment!
    $factors = array();
    $factors[] = $number;
    $testnum = 2;

    Do {
        Do {

            if (($number % $testnum) == 0) {
                if (!in_array($testnum, $factors)) {
                    $factors[] = $testnum;
                }
                if (!in_array(($number / $testnum), $factors)) {
                    $factors[] = ($number / $testnum);
                }
                $number = $number / $testnum;
            }
        } while (($number % $testnum) == 0);
        $testnum = $testnum + 1;
    } while ($testnum <= $number);

    return $factors;
}

function get_triangle($number) {
    $a = 1;
    $num = 0;
    Do {
        $num += $a;
        $a += 1;
    } while ($a <= $number);

    return $num;
}

function get_num_factors($number) {
    $factors = array();
    $testnum = 2;
    $result = 1;
    Do {
        Do {

            if (($number % $testnum) == 0) {
                $key = $testnum . "count";
                if (array_key_exists($key, $factors)) {
                    $factors["$key"] += 1;
                } else {
                    $factors["$key"] = 1;
                }
                $number = $number / $testnum;
            }
        } while (($number % $testnum) == 0);

        $testnum = $testnum + 1;
    } while ($testnum <= $number);

    foreach ($factors as $key => $value) {
        $result = ($value + 1) * $result;
    }

    return $result;
}

echo print_r(get_factors(2016));

?>
