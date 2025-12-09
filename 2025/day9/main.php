<?php

namespace AdventOfCode\Template;

function part1($file): int
{
    $rows = explode("\n", $file);
    $sizes = [];
    foreach ($rows as $row) {
        $rowsplit = explode(",",$row);
        foreach ($rows as $row2) {
            $rowsplit2 = explode(",", $row2);

            if($row != $row2) {
                $x = abs($rowsplit[0] - $rowsplit2[0])+1;
                $y = abs($rowsplit[1] - $rowsplit2[1])+1;
                array_push($sizes, $x*$y);
            }
        }
    }
    rsort($sizes);
    // var_dump($sizes);
    // var_dump($sizes[0]);
    return $sizes[0];
}

function part2($file): int
{
    return 0;
}
