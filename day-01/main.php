<?php

$file = sprintf("%s/input.txt", __DIR__);
$rows = file($file, FILE_IGNORE_NEW_LINES);

$keys_around = fn($arr, $idx, $offsets) => array_map(fn($x) => $arr[$idx + $x] ?? NULL, $offsets);
$all_numeric = fn($arr) => array_reduce($arr, fn($a, $b) => $a && is_numeric($b), TRUE);

list($increases, $threeIncreases) = [0, 0];
foreach ($rows as $idx => $row) {
  list($prev, $curr, $next, $next2, $next3) = $keys_around(
    $rows, $idx, [-1, 0, 1, 2, 3]);
  $okay = $all_numeric([$curr, $prev]);
  $okay2 = $all_numeric([$next, $next2, $next3, $curr]);
  $increases += $okay && $curr > $prev ? 1 : 0;
  $threeIncreases += $okay2 && $next + $next2 + $next3 > $curr + $next + $next2 ? 1 : 0;
}

printf("Increases: %s (part 1)\n", $increases);
printf("3-increases: %s (part 2)\n", $threeIncreases);
