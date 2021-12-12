<?php

$file = sprintf("%s/input.txt", __DIR__);
$rows = file($file, FILE_IGNORE_NEW_LINES);

foreach ($rows as $idx => $row) {
  printf("%s\n", $row);
}

printf("Something: %s (part 1)\n", 1);
printf("Another something: %s (part 2)\n", 2);
