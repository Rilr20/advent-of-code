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
    [$freshrange, $fruits] = explode("\n\n", $file);
    $freshrange = explode("\n", $freshrange);
    for ($i = 0; $i < count($freshrange); $i++) {
        $freshrange[$i] = explode("-", $freshrange[$i]);
    }

    usort($freshrange, function ($a, $b) {
        return $a[0] <=> $b[0];
    });

    $fresh = 0;
    $new_ranges = [];

    $checked = [];
    foreach ($freshrange as $key => $range) {
        $start = $range[0];
        $end = $range[1];

        if (!in_array($key, $checked)) {

            foreach ($freshrange as $checkKey => $checkrange) {
                if ($start <= $checkrange[1] && $end >= $checkrange[0]) {
                    $start = min($start, $checkrange[0]);

                    $end = max($end, $checkrange[1]);
                    array_push($checked, $checkKey);
                }
            }
            array_push($new_ranges, [$start, $end]);
        }
    }


    foreach ($new_ranges as $range) {
        $fresh += abs($range[0] - 1 - $range[1]);
    }
    return $fresh;
}
