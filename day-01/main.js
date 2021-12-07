const util = require('util');
const fs = require("fs");

const path = process.argv[1].replace("/main.js", "");
const buffer = fs.readFileSync(`${path}/input.txt`);
const rows = buffer.toString().trimEnd().split("\n").map(r => Number(r));

let [increases, threeIncreases] = [0, 0];
for (const [idx, row] of rows.entries()) {
  increases += row > rows[idx-1] ? 1 : 0
  const threeNext = rows[idx+1] + rows[idx+2] + rows[idx+3]
  const threePrev = row + rows[idx+1] + rows[idx+2]
  threeIncreases += threeNext > threePrev ? 1 : 0
}

console.log(`Increases: ${increases} (part 1)`);
console.log(`3-increases: ${threeIncreases} (part 2)`);