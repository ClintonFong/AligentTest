<?php

require( 'calcDiff.php' );

$strTimeZone 	= isset( $_REQUEST['timezone'] )? $_REQUEST['timezone']  : 'Australia/Sydney';
$dc 			= new DateCalc( $strTimeZone );

$fn 			= isset( $_REQUEST['fn'] )? $_REQUEST['fn'] : '';
$dateTime1 		= isset( $_REQUEST['datetime1'] )? $dc->createDateTime( $_REQUEST['datetime1'] ) : $dc->createDateTime();
$dateTime2 		= isset( $_REQUEST['datetime2'] )? $dc->createDateTime( $_REQUEST['datetime2'] ) : $dc->createDateTime();

$timeElement 	= isset( $_REQUEST['timeelement'] )? $_REQUEST['timeelement'] : '';

//echo "<pre>";
//print_r( $dateTime1 );
//print_r( $dateTime2 );
//echo "</pre>";

//apiTest.php?fn=daysdiff&datetime1=2021-05-06&datetime2=2021-05-29
//http://localhost:8080/aligent/apiTest.php?fn=daysdiff&datetime1=2021-05-06&datetime2=2021-05-29&timeelement=minutes

$retVal  = '{';
$retVal .= '"fn" : "' . $fn . '", ';
$retVal .= '"timezone" : "' . $dc->timeZone->getName() . '", ';
$retVal .= '"timeelement" : "' . $timeElement . '", ';
$retVal .= '"datetime1" : "' . $dateTime1->format('Y-m-d H:i:s') . '", ';
$retVal .= '"datetime2" : "' . $dateTime2->format('Y-m-d H:i:s') . '", ';

switch( $fn ){
	case 'daysdiff':
		$retVal .= '"result" : "' . $dc->daysDiff( $dateTime1, $dateTime2, $timeElement ) . '"';
		break;
		
	case 'weekdaysdiff':
		$retVal .= '"result" : "' . $dc->weekdaysDiff( $dateTime1, $dateTime2, $timeElement ) . '"';
		break;

	case 'completetimeperiod':
		$retVal .= '"result" : "' . $dc->weekdaysDiff( $dateTime1, $dateTime2, $timeElement ) . '"';
		break;
		
	default:
		$retVal .= '"error" : "Missing function"';
}

//echo 'daysDiff=' . $dc->daysDiff( $dateTime1, $dateTime2 ) . '<br>';
//echo 'weekdaysDiff(weeks)=' . $dc->weekdaysDiff( $dateTime1, $dateTime2, DateCalc::WEEK ) . '<br>';
//echo 'completeTimePeriods(year)=' . $dc->completeTimePeriods(  $dateTime1, $dateTime2, DateCalc::YEAR ) . '<br>';

//$xxx = '{"xxx":"yyy"}';
//var_dump( json_decode( $xxx ) );


$retVal .= '}';

echo $retVal;
