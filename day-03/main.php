<?php

$file = sprintf("%s/input.txt", __DIR__);
$rows = file($file, FILE_IGNORE_NEW_LINES);

$sums = array_fill(0, count(str_split($rows[0])), 0);
foreach ($rows as $idx => $row) {
  $bits = str_split($row);
  foreach ($bits as $jdx => $bit) {
    $sums[$jdx] += $bits[$jdx];
  }
}
$gamma = array_map(fn($x) => $x > count($rows)/2 ? 1 : 0, $sums);
$epsilon = array_map(fn($x) => $x === 1 ? 0 : 1, $gamma);
$gdec = bindec(implode($gamma));
$edec = bindec(implode($epsilon));

printf("Power consumption: %s (part 1)\n", $gdec * $edec);
printf("Another something: %s (part 2)\n", 2);
