'use strict';
const fs = require("fs");
import {part1, part2} from "./main";

function getFile(filepath) {
    return fs.readFileSync(filepath);
}

let file = getFile('input.txt');
function part_1_test_example_1() {
    let example = ""
    let expected = ""
    let result = part1(example);
    if (result == expected) {
        console.log("PASSED: part 1 returned" + result);   
    } else {
        console.log("FAILED: part 1 returned" + result + "instead of " + expected);
    }
}

function part_1_test_example_2() {
    let example = ""
    let expected = ""
    let result = part1(example);
    if (result == expected) {
        console.log("PASSED: part 1 returned" + result);   
    } else {
        console.log("FAILED: part 1 returned" + result + "instead of " + expected);
    }
}

function part_1_test_real_input() {
    let file = getFile('input.txt');
    let expected = ""
    let result = part1(file);
    if (result == expected) {
        console.log("PASSED: part 1 returned" + result);   
    } else {
        console.log("FAILED: part 1 returned" + result + "instead of " + expected);
    }    part1
}
function part_2_test_example_1() {
    let example = ""
    let expected = ""
    let result = part2(example);
    if (result == expected) {
        console.log("PASSED: part 2 returned" + result);   
    } else {
        console.log("FAILED: part 2 returned" + result + "instead of " + expected);
    }
}

function part_2_test_example_2() {
    let example = ""
    let expected = ""
    let result = part2(example);
    if (result == expected) {
        console.log("PASSED: part 2 returned" + result);   
    } else {
        console.log("FAILED: part 2 returned" + result + "instead of " + expected);
    }
}

function part_2_test_real_input() {
    let file = getFile('input.txt');
    let expected = ""
    let result = part2(file);
    if (result == expected) {
        console.log("PASSED: part 2 returned" + result);   
    } else {
        console.log("FAILED: part 2 returned" + result + "instead of " + expected);
    }
}