<?php
$time = "13/01/2025 10:38:47";
$day = (int) sprintf("%02d", substr($time, 0, 2));
$month = (int) sprintf("%02d", substr($time, 3, 2));
$year = (int) sprintf("%04d", substr($time, 6, 4));
$hour = (int) sprintf("%02d", substr($time, 11, 2));
$minute = (int) sprintf("%02d", substr($time, 14, 2));
$sec = (int) sprintf("%02d", substr($time, 17, 2));
// Combine the day, month, year, hour, and minute into a single integer value
$int_value = $year * 10000000000 + $month * 100000000 + $day * 1000000 + $hour * 10000 + 100* $minute + $sec;
echo $int_value;
?>
