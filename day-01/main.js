const util = require('util');
const fs = require("fs");

const path = process.argv[1].replace("/main.js", "");
const buffer = fs.readFileSync(`${path}/input.txt`);
const rows = buffer.toString().trimEnd().split("\n");

let increases = 1;
for (const [idx, row] of rows.entries()) {
  increases += row > rows[idx-1] ? 1 : 0
}


console.log(`Increases: ${increases} (part 1)`);
console.log(`Another something: ${2} (part 2)`);