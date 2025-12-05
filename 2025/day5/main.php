<?php

namespace AdventOfCode\Template;

function part1($file): int
{
    [$freshrange, $fruits] = explode("\n\n", $file);
    $fresh = 0;

    $freshrange = explode("\n", $freshrange);
    $fruits = explode("\n", $fruits);
    for ($i = 0; $i < count($freshrange); $i++) {
        $freshrange[$i] = explode("-", $freshrange[$i]);
    }

    foreach ($fruits as $fruit) {
        $isfresh = false;
        foreach ($freshrange as $freshness) {
            if ((int)$freshness[0] <= (int)$fruit && (int)$freshness[1] >= (int)$fruit) {

                $isfresh = true;
            }
            if ($isfresh) {
                $fresh++;
                break;
            }
        }
    }
    return $fresh;
}

function part2($file): int
{
    return 0;
}
