<?php

require( 'calcDiff.php' );

//$myTimezone = date_default_timezone_get();
//dump($myTimezone);

//date_default_timezone_set($userTimezone);
//$userDay = date('l', $userTimestamp);
//date_default_timezone_set($myTimezone);


//$dateTime1 = new DateTime("2021-05-06 23:00:00");
//$dateTime2 = new DateTime("2021-05-29 01:0:0");
//$dateTime1 = new DateTime("2021-05-06");
//$dateTime2 = new DateTime("2021-05-29");

$dc = new DateCalc('Australia/Sydney');

$dateTime1 = $dc->createDateTime("2021-05-06");
$dateTime2 = $dc->createDateTime("2021-05-29");
/*
echo "2021-05-06 - 2021-05-29<br>";
echo 'daysDiff(days)=' . $dc->daysDiff( $dateTime1, $dateTime2 ) . '<br>';
echo 'weekdaysDiff(days)=' . $dc->weekdaysDiff( $dateTime1, $dateTime2 ) . '<br>';
echo 'completeTimePeriods(default)=' . $dc->completeTimePeriods(  $dateTime1, $dateTime2 ) . '<br>' ;
echo '-------------------<br>';

$dateTime1 = $dc->createDateTime("2021-05-06 23:00:00");
$dateTime2 = $dc->createDateTime("2021-05-29 01:0:0");

echo "2021-05-06 23:00:00 - 2021-05-29 01:0:0<br>";
echo 'daysDiff=' . $dc->daysDiff( $dateTime1, $dateTime2 ) . '<br>';
echo 'weekdaysDiff(weeks)=' . $dc->weekdaysDiff( $dateTime1, $dateTime2, DateCalc::WEEK ) . '<br>';
echo 'completeTimePeriods(week)=' . $dc->completeTimePeriods(  $dateTime1, $dateTime2, DateCalc::WEEK ) . '<br>';
echo '-------------------<br>';

$dateTime1 = $dc->createDateTime("2021-05-06 23:10:00");
$dateTime2 = $dc->createDateTime("2021-05-07 01:0:0");

echo $dateTime1->format('Y-m-d H:i:s') . " - " . $dateTime2->format('Y-m-d H:i:s') . "<br>";

echo 'daysDiff=' . $dc->daysDiff( $dateTime1, $dateTime2 ) . '<br>';
echo 'weekdaysDiff(weeks)=' . $dc->weekdaysDiff( $dateTime1, $dateTime2, DateCalc::WEEK ) . '<br>';
echo 'completeTimePeriods(week)=' . $dc->completeTimePeriods(  $dateTime1, $dateTime2, DateCalc::WEEK ) . '<br>';
echo '<br>';
echo 'daysDiff(hour)=' . $dc->daysDiff( $dateTime1, $dateTime2, DateCalc::HOUR ) . '<br>';
echo 'weekdaysDiff(hour)=' . $dc->weekdaysDiff( $dateTime1, $dateTime2, DateCalc::HOUR ) . '<br>';
echo 'completeTimePeriods(hour)=' . $dc->completeTimePeriods(  $dateTime1, $dateTime2, DateCalc::HOUR ) . '<br>';
echo '<br>';

echo 'daysDiff(minute)=' . $dc->daysDiff( $dateTime1, $dateTime2, DateCalc::MINUTE ) . '<br>';
echo 'weekdaysDiff(minute)=' . $dc->weekdaysDiff( $dateTime1, $dateTime2, DateCalc::MINUTE ) . '<br>';
echo 'completeTimePeriods(minute)=' . $dc->completeTimePeriods(  $dateTime1, $dateTime2, DateCalc::MINUTE ) . '<br>';

echo '-------------------<br>';

$dateTime1 = $dc->createDateTime("2021-05-06 23:00:00");
$dateTime2 = $dc->createDateTime("2022-05-07 01:0:0");

echo $dateTime1->format('Y-m-d H:i:s') . " - " . $dateTime2->format('Y-m-d H:i:s') . "<br>";
echo 'daysDiff=' . $dc->daysDiff( $dateTime1, $dateTime2 ) . '<br>';
echo 'weekdaysDiff(weeks)=' . $dc->weekdaysDiff( $dateTime1, $dateTime2, DateCalc::WEEK ) . '<br>';
echo 'completeTimePeriods(year)=' . $dc->completeTimePeriods(  $dateTime1, $dateTime2, DateCalc::YEAR ) . '<br>';
echo '-------------------<br>';

$dateTime1 = $dc->createDateTime("2021-05-06 23:0:0");
$dateTime2 = $dc->createDateTime("2021-05-07 01:00:00");

echo $dateTime1->format('Y-m-d H:i:s') . " - " . $dateTime2->format('Y-m-d H:i:s') . "<br>";
echo 'daysDiff=' . $dc->daysDiff( $dateTime1, $dateTime2 ) . '<br>';
echo 'weekdaysDiff(weeks)=' . $dc->weekdaysDiff( $dateTime1, $dateTime2, DateCalc::WEEK ) . '<br>';
echo 'completeTimePeriods(year)=' . $dc->completeTimePeriods(  $dateTime1, $dateTime2, DateCalc::YEAR ) . '<br>';
echo '-------------------<br>';
*/

$dateTime1 = $dc->createDateTime("2021-05-07 0:0:0");
$dateTime2 = $dc->createDateTime("2021-05-21 01:00:00");

echo $dateTime1->format('Y-m-d H:i:s') . " - " . $dateTime2->format('Y-m-d H:i:s') . "<br>";
echo 'daysDiff(days)=' . $dc->daysDiff( $dateTime1, $dateTime2 ) . '<br>';
echo 'weekdaysDiff(weeks)=' . $dc->weekdaysDiff( $dateTime1, $dateTime2, DateCalc::WEEK ) . '<br>';
echo 'completeTimePeriods(year)=' . $dc->completeTimePeriods(  $dateTime1, $dateTime2, DateCalc::YEAR ) . '<br>';
echo 'completeWeeks(week)=' . $dc->completeWeeks(  $dateTime1, $dateTime2, DateCalc::WEEK ) . '<br>';
echo '-------------------<br>';

$dateTime1 = $dc->createDateTime("2021-05-07 1:0:0");
$dateTime2 = $dc->createDateTime("2021-05-16 0:00:00");

echo $dateTime1->format('Y-m-d H:i:s') . " - " . $dateTime2->format('Y-m-d H:i:s') . "<br>";
echo 'daysDiff(hour)=' . $dc->daysDiff( $dateTime1, $dateTime2, DateCalc::HOUR ) . '<br>';
echo 'weekdaysDiff(weeks)=' . $dc->weekdaysDiff( $dateTime1, $dateTime2, DateCalc::WEEK ) . '<br>';
echo 'completeTimePeriods(year)=' . $dc->completeTimePeriods(  $dateTime1, $dateTime2, DateCalc::YEAR ) . '<br>';
echo 'completeWeeks(weeks)=' . $dc->completeWeeks(  $dateTime1, $dateTime2 ) . '<br>';
echo 'completeWeeks(days)=' . $dc->completeWeeks(  $dateTime1, $dateTime2, DateCalc::DAY ) . '<br>';
echo '-------------------<br>';


