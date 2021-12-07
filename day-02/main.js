const util = require('util');
const fs = require("fs");

const path = process.argv[1].replace("/main.js", "");
const buffer = fs.readFileSync(`${path}/input.txt`);
const rows = buffer.toString().trimEnd().split("\n");

let [horizontal, depth] = [0, 0]
rows.forEach(row => {
  const cmd = row.split(" ")
  switch (cmd[0]) {
    case "forward": horizontal += Number(cmd[1]); break;
    case "up": depth -= Number(cmd[1]); break;
    case "down": depth += Number(cmd[1]); break;
  }
});

console.log(`horizontal * depth: ${horizontal * depth} (part 1)`);
console.log(`Another something: ${2} (part 2)`);