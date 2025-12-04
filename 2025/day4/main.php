<?php

namespace AdventOfCode\Template;
function part1($file):int {
    $rows = explode("\n", $file);
    $accessable = 0;
    for ($y=0; $y < count($rows)-1; $y++) { 
        $width = strlen($rows[$y])-1;
        for ($x=0; $x < $width; $x++) {
            $toiletpaper = 0;
            $directions = [
                [-1,1], [0,1],  [1,1],
                [-1,0],         [1,0],
                [-1,-1], [0,-1],[1,-1]
            ];

            foreach ($directions as [$dirX, $dirY]) {
                $neighbourX = $dirX + $x;
                $neighbourY = $dirY + $y;

                if (
                    $neighbourY >= 0 && $neighbourY <= count($rows) && $neighbourX >= 0 && $neighbourX <= $width
                ) {
                    if ($rows[$neighbourY][$neighbourX] == "@") {
                        $toiletpaper++;
                    }
                }
            }

            if ($toiletpaper < 4) {
                $accessable = $accessable+1;
            }
        }
    }
    return $accessable;
}

function part2($file):int {
    return 0;
}