<?php

namespace AdventOfCode\day2;
function part1($file):int {
    $groups = explode(",", $file);
    // var_dump($groups);
    $res = 0;
    foreach ($groups as $group) {
        # code...
        [$start, $end] = explode("-",$group);
        for ($i=$start; $i <= $end ; $i++) { 
            $len = strlen((string)$i);
            if ($len% 2 == 0) {
                $substart = substr($i,0,strlen($i)/2);
                $subend = substr($i, strlen($i) / 2, strlen($i));
                if ($substart == $subend) {
                    $res += (int) $i;
                }
            }
        }
    }

    return $res;
}

function part2($file):int {
    return 0;
}