<?php
declare(strict_types=1);

namespace AdventOfCode\day2\Tests;

require_once __DIR__ . "/main.php";

use function AdventOfCode\day2\part1;
use function AdventOfCode\day2\part2;

function getFile($filepath) {
    if(file_exists($filepath)) {
        return file_get_contents($filepath);
    } else {
        return "";
    }
}

$file = getFile("example.txt");
function part_1_test_example_1() {
    global $file;
    $expected = 1227775554;
    $result = part1($file);

    if ($result == $expected) {
        echo "PASSED: part 1 returned $result\n";
    } else {
        echo "FAILED: part 1 returned $result instead of $expected\n";
    }
}

function part_1_test_real_input()
{
    $file = getFile("input.txt");
    $result = part1($file);
    echo "Part 1 returned $result\n";
}

function part_2_test_example_1()
{
    global $file;
    $expected = 4174379265;
    $result = part2($file);

    if ($result == $expected) {
        echo "PASSED: part 2 returned $result\n";
    } else {
        echo "FAILED: part 2 returned $result instead of $expected\n";
    }
}
function part_2_test_real_input()
{
    $file = getFile("input.txt");
    $result = part2($file);
    echo "Part 2 returned $result\n";
}

function runTests()
{
    part_1_test_example_1();
    // part_1_test_example_2();
    part_1_test_real_input();

    part_2_test_example_1();
    // part_2_test_example_2();
    part_2_test_real_input();
}

runTests();