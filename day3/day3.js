'use strict';
const fs = require("fs");

let filename = "input.txt"

function myfun(filePath) {
    return fs.readFileSync(filePath);
}
let res = myfun(filename)
let documentstring = res.toString();

let documentRow = documentstring.split("\n")

let sum = 0

documentRow.forEach((row) => {
    
})