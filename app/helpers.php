<?php

use Illuminate\Support\Str;

/**
 * Calculate the estimated reading time for blog.
 *
 * @param   string $text 
 * @return int $minToRead
 */
if (!function_exists('readDuration')) {
 function readDuration($text)
 {
  $totalWrods = Str::wordcount(strip_tags($text));
  $minToRead = round($totalWrods / 120);

  return (int)max(1, $minToRead);
 }
}
