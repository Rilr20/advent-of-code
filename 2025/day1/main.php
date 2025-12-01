<?php

namespace AdventOfCode\day1;
function part1($file):int {
    $lines = explode("\n", $file);
    $number = 50;
    $result = 0;
    foreach ($lines as $key => $value) {
        $code = [
            $value[0],
            substr($value, 1)
        ];
        switch ($code[0]) {
            case 'L':
                $number = $number - $code[1];

                $number = ($number%100+100) % 100;

                break;
            case 'R':
                $number = $number + $code[1];

                $number = ($number%100);
                break;
        }
        if ($number == 0) {
            $result++;
        }
    }
    return $result;
}

function part2($file):int {
    $lines = explode("\n", $file);
    $number = 50;
    $rotations =0;
    foreach ($lines as $key => $value) {
        $code = [
            $value[0],
            substr($value, 1)
        ];
        switch ($code[0]) {
            case 'L':
                for ($i=0; $i < intval($code[1]); $i++) { 
                    if ($number-1 < 0) {
                        $number = 99;
                    } else {
                        $number--;
                    }
                    if ($number == 0) {
                        $rotations++;
                    }
                }
                
                break;
            case 'R':
                for ($i = 0; $i < intval($code[1]); $i++) {
                    if ($number + 1 > 99) {
                        $number = 0;
                    } else {
                        $number++;
                    }
                    if ($number == 0) {
                        $rotations++;
                    }
                }
                var_dump($number);
                break;
        }
    }
    return $rotations;
}