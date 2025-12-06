<?php

namespace AdventOfCode\Template;

function part1($file): int
{
    $rows = explode("\n", $file);

    $rotatedArray = [];
    foreach ($rows as $key => $row) {
        $splitRows = preg_split("/[ ]+/", trim($row));
        foreach ($splitRows as $splitKey => $splitRow) {
            if (!isset($rotatedArray[$splitKey])) {
                $rotatedArray[$splitKey] = [];
            }
            array_push($rotatedArray[$splitKey], $splitRow);
        }
    }

    $total = 0;
    foreach ($rotatedArray as $rows) {
        $operator = "";
        $localResult = 0;
        for ($i = count($rows) - 1; $i >= 0; $i--) {
            if (!is_numeric($rows[$i])) {
                $operator = $rows[$i];
                if ($operator === "*" && $localResult === 0) {
                    $localResult= 1;
                }
            } else {



                var_dump($rows[$i]);
                switch ($operator) {
                    case '*':
                        $localResult = $localResult * $rows[$i];

                        break;

                    case "+":
                        $localResult = $localResult + $rows[$i];

                        break;

                }
            }
        }
        $total += $localResult;
    }

    return $total;
}

function part2($file): int
{
    return 0;
}
