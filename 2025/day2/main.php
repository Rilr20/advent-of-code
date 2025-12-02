<?php

namespace AdventOfCode\day2;

function part1($file): int
{
    $groups = explode(",", $file);
    // var_dump($groups);
    $res = 0;
    foreach ($groups as $group) {
        # code...
        [$start, $end] = explode("-", $group);
        for ($i = $start; $i <= $end; $i++) {
            $len = strlen((string)$i);
            if ($len % 2 == 0) {
                $substart = substr($i, 0, strlen($i) / 2);
                $subend = substr($i, strlen($i) / 2, strlen($i));
                if ($substart == $subend) {
                    $res += (int) $i;
                }
            }
        }
    }

    return $res;
}

function part2($file): int
{
    $groups = explode(",", $file);
    $res = 0;

    foreach ($groups as $group) {
        [$start, $end] = explode("-", $group);
        for ($i = $start; $i <= $end; $i++) {
            $number = (string) $i;
            $newstring = "";
            $oppositestring = "";
            for ($j = strlen($number) / 2; $j >= 1; $j--) {
                $newstring = substr($number, 0, $j);
                $oppositestring = substr($number, $j);
                $exploded = explode($newstring, $oppositestring);
                if (count($exploded) > 1) {
                    $is_empty = true;
                    foreach ($exploded as $item) {
                        if ($item != "") {
                            $is_empty = false;
                            break;
                        }
                    }
                    if ($is_empty) {
                        $res += $i;
                        break;
                    }
                }
            }
        }
    }
    return $res;
}
