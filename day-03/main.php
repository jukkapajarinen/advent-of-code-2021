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
$powerConsumption = bindec(implode($gamma)) * bindec(implode($epsilon));

$find_ones = fn($arr, $idx) => count(array_filter($arr, fn($x) => substr($x, $idx, 1) === "1"));
$find_zeroes = fn($arr, $idx) => count(array_filter($arr, fn($x) => substr($x, $idx, 1) === "0"));
list($oxygen, $scrubber, $oKeeps, $sKeeps) = ["", "", $rows, $rows];
for ($i = 0; $i < strlen($rows[0]); $i++) {
  $oBit = $find_ones($oKeeps, $i) >= $find_zeroes($oKeeps, $i) ? "1" : "0";
  $sBit = $find_ones($sKeeps, $i) < $find_zeroes($sKeeps, $i) ? "1" : "0";
  $oKeeps = array_filter($oKeeps, fn($row) => substr($row, $i, 1) === $oBit);
  $sKeeps = array_filter($sKeeps, fn($row) => substr($row, $i, 1) === $sBit);
  printf("%s) possible oxygens: %s, scrubbers: %s\n", $i+1, count($oKeeps), count($sKeeps));

  if ($oxygen === "" && count($oKeeps) === 1) {
    $oxygen = array_values($oKeeps)[0];
    printf("\n => Oxygen is: %s\n\n", $oxygen);
  }
  if ($scrubber === "" && count($sKeeps) === 1) {
    $scrubber = array_values($sKeeps)[0];
    printf("\n => Scrubber is: %s\n\n", $scrubber);
  }
}
$lifeSupport = bindec($oxygen) * bindec($scrubber);

printf("Power consumption: %s (part 1)\n", $powerConsumption);
printf("Life support rating: %s (part 2)\n", $lifeSupport);
