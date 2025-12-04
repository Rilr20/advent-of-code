<?php

namespace AdventOfCode\Template;

function part1($file): int
{
    $rows = explode("\n", $file);
    $accessable = 0;
    // $toiletpaper = [];
    for ($y = 0; $y < count($rows); $y++) {
        $width = strlen($rows[$y]);
        for ($x = 0; $x < $width; $x++) {
            $tp = 0;

            if ($y - 1 >= 0) {
                $tp += $rows[$y - 1][$x] == "@" ? 1 : 0;

                if ($x - 1 >= 0) {
                    $tp += $rows[$y - 1][$x - 1] == "@" ? 1 : 0;
                }

                if ($x + 1 <= $width) {
                    $tp += $rows[$y - 1][$x + 1] == "@" ? 1 : 0;
                }
            }

            if ($y + 1 <= count($rows) - 1) {
                $tp += $rows[$y + 1][$x] == "@" ? 1 : 0;

                if ($x - 1 >= 0) {
                    $tp += $rows[$y + 1][$x - 1] == "@" ? 1 : 0;
                }

                if ($x + 1 <= $width) {
                    $tp += $rows[$y + 1][$x + 1] == "@" ? 1 : 0;
                }
            }

            if ($x - 1 >= 0) {
                $tp += $rows[$y][$x - 1] == "@" ? 1 : 0;
            }
            if ($x + 1 <= $width) {
                $tp += $rows[$y][$x + 1] == "@" ? 1 : 0;
            }


            if ($rows[$y][$x] == "@" && $tp < 4) {
                // array_push($toiletpaper, [$x, $y]);
                $accessable++;
            }
        }
    }
    // var_dump($toiletpaper);
    // foreach ($toiletpaper as $coords) {
    //     list($x, $y) = $coords;
    //     $rows[$y][$x] = "X";
    // }

    // $newFile = implode("\n", $rows);
    // var_dump($newFile);
    return $accessable;
}

function part2($file): int
{

    $rows = explode("\n", $file);
    $accessable = 0;
    $removed = true;

    while ($removed) {
        $removed = false;
        for ($y = 0; $y < count($rows); $y++) {
            $width = strlen($rows[$y]);
                for ($x = 0; $x < $width; $x++) {
                    $tp = 0;

                    if ($y - 1 >= 0) {
                        $tp += $rows[$y - 1][$x] == "@" ? 1 : 0;

                        if ($x - 1 >= 0) {
                            $tp += $rows[$y - 1][$x - 1] == "@" ? 1 : 0;
                        }

                        if ($x + 1 <= $width) {
                            $tp += $rows[$y - 1][$x + 1] == "@" ? 1 : 0;
                        }
                    }

                    if ($y + 1 <= count($rows) - 1) {
                        $tp += $rows[$y + 1][$x] == "@" ? 1 : 0;

                        if ($x - 1 >= 0) {
                            $tp += $rows[$y + 1][$x - 1] == "@" ? 1 : 0;
                        }

                        if ($x + 1 <= $width) {
                            $tp += $rows[$y + 1][$x + 1] == "@" ? 1 : 0;
                        }
                    }

                    if ($x - 1 >= 0) {
                        $tp += $rows[$y][$x - 1] == "@" ? 1 : 0;
                    }
                    if ($x + 1 <= $width) {
                        $tp += $rows[$y][$x + 1] == "@" ? 1 : 0;
                    }


                    if ($rows[$y][$x] == "@" && $tp < 4) {
                        // array_push($toiletpaper, [$x, $y]);
                        $accessable++;
                        $rows[$y][$x] = ".";
                        $removed = true;
                    }
                }
            }
    }

    return $accessable;
}
