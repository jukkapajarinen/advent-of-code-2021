<?php

$file = sprintf("%s/input.txt", __DIR__);
$rows = file($file, FILE_IGNORE_NEW_LINES);

list($horizontal, $depth) = [0, 0];
foreach ($rows as $idx => $row) {
  $cmd = explode(" ", $row);
  $cmd[0] === "forward" ? $horizontal += $cmd[1] : NULL;
  $cmd[0] === "up" ? $depth -= $cmd[1] : NULL;
  $cmd[0] === "down" ? $depth += $cmd[1] : NULL;
}

list($horizontal2, $depth2, $aim) = [0, 0, 0];
foreach ($rows as $idx => $row) {
  $cmd = explode(" ", $row);
  if ($cmd[0] === "forward") {
    $horizontal2 += $cmd[1];
    $depth2 += $aim * $cmd[1];
  }
  $cmd[0] === "up" ? $aim -= $cmd[1] : NULL;
  $cmd[0] === "down" ? $aim += $cmd[1] : NULL;
}

printf("horizontal * depth: %s (part 1)\n", $horizontal * $depth);
printf("horizontal2 * depth2: %s (part 2)\n", $horizontal2 * $depth2);
