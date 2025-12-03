<?php

namespace AdventOfCode\Template;

function part1($file): int
{
    $rows = explode("\n", $file);
    $res = 0;
    foreach ($rows as $row) {
        $largest = 0;
        for ($i = 0; $i < strlen($row) - 1; $i++) {

            if ($row[$i + 1] < $row[$i] || $row[$i + 1] != strlen($row) - 1) {
                for ($j = $i + 1; $j < strlen($row); $j++) {
                    if ($row[$i] . $row[$j] > $largest) {
                        $largest = (int) $row[$i] . $row[$j];
                    }
                }
            }
        }
        $res += $largest;
    }
    return $res;
}

function part2($file): int
{
    $rows = explode("\n", $file);
    $res = 0;
    foreach ($rows as $row) {
        $largest = "";

        $new_large = "";

        while (strlen($largest) < 12) {

            var_dump($largest);
            for ($i = strlen($largest); $i < strlen($row) - 11 + strlen($largest); $i++) {
                $current = $row[$i];

                if ($new_large === "" ||  $current > substr($new_large, -1)) {
                    $new_large = $largest . $current;
                }
            }
            if (strlen($new_large) == strlen($largest)) {
                $new_large = $largest . $row[strlen($largest)];
            }
            $largest = $new_large;
        }
        var_dump($largest);
        $res += $largest;
    }
    return $res;
}
