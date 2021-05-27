<?php

class DateCalc {

	public const SECOND = 'seconds'; 
	public const MINUTE = 'minutes'; 
	public const HOUR 	= 'hours'; 
	public const DAY 	= 'days'; 
	public const WEEK 	= 'weeks'; 
	public const YEAR 	= 'years'; 

	
	public $timeZone; 
	
	function __construct( string $strTimeZone = 'Australia/Sydney' ) {
        
		$this->timeZone = new DateTimeZone( $strTimeZone );
		
    } // __construct
	
	//-----------------------------
	function createDateTime( string $theDateTime = '' ){
		
		if( $theDateTime == '' ){ return new DateTime( 'NOW', $this->timeZone ); }
		else 					{ return new DateTime( $theDateTime, $this->timeZone ); }
		
	} // createDateTime
	
	
	//-----------------------------
	function daysDiff( 	$dateTime1,
						$dateTime2,
						$format=self::DAY){
		
		if( empty($format) ){ $format=self::DAY;  }
		
	//	$now = time(); // or your date as well
	//	$your_date = strtotime("2010-01-31");
	//	$datediff = $now - $your_date;

	//	echo round($datediff / (60 * 60 * 24));	
	
		switch( $format ){
			case self::HOUR:
				return $dateTime2->diff( $dateTime1 )->h + ($dateTime2->diff( $dateTime1 )->days * 24);
				break;
			
			case self::MINUTE:
				return $dateTime2->diff( $dateTime1 )->i + (($dateTime2->diff( $dateTime1 )->h + ($dateTime2->diff( $dateTime1 )->days * 24)) * 60);
				break;

			case self::SECOND:
				return $dateTime2->diff( $dateTime1 )->s + (($dateTime2->diff( $dateTime1 )->i + (($dateTime2->diff( $dateTime1 )->h + ($dateTime2->diff( $dateTime1 )->days * 24)) * 60)) * 60);
				break;

			case self::DAY:
				return $dateTime2->diff( $dateTime1 )->days;	
				break;
				
			case self::WEEK:
				return $dateTime2->diff( $dateTime1 )->days * 7;
				break;
				
			case self::YEAR:
				return $dateTime2->diff( $dateTime1 )->y;
				break;
				
		} // switch
		
		return false;
		
	} // daysDiff

	//----------------------------
	function weekdaysDiff( 	$dateTime1,
							$dateTime2,
							$format=self::DAY ){

		if( empty($format) ){ $format=self::DAY;  }
							
		$Weekend 		= array( 0, 6 ); // 0=sun, 6=sat
		$isCountStarted = false;
		$iWeekdayCount 	= 0;
		$iCount 		= 0;
		
		$iDateNext 	= clone $dateTime1;
		$iDate 		= $iDateNext;
		
		while( $iDate <= $dateTime2 ) {
		
			$iDateNext = clone $iDate;
			$iDateNext->modify("+1 ".$format); 
			
			//echo "xx=>".$iDate->format('Y-m-d H:i:s')."<br>";
			//echo "yy=>".$iDateNext->format('Y-m-d H:i:s')."<br>";
		
			if( $iDateNext <= $dateTime2 ){
				$day = $iDate->format('w');  // 0=sun, 1=mon, ..., 6=sat
				
				if( $iCount > 0 )								{ $isCountStarted = true; } 
				else if( intval( $iDate->format('His')) == 0 ) 	{ $isCountStarted = true; }
				
				if( !in_array( $day, $Weekend ) && $isCountStarted ) {
					$iWeekdayCount++;
				}
			}
		
			$iDate = $iDateNext;
			$iCount++;
			//echo 'iDate=' . $iDate->format('Y-m-d H:i:s') . '| day=' . $day . '| ' . $iDate->format('Y-m-d H:i:s') . "<br>";
		
		} // while
		
	
		return $this->convertDayToFormat( $iCount, $format );
	  
	} // weekdaysDiff

	//-----------------------------
	function convertDayToFormat( 	$nDays,
									$format ){
	
		switch( $format ){
			case self::HOUR:
				return $nDays * 168;
				break;
			
			case self::MINUTE:
				return $nDays * 10080;
				break;

			case self::SECOND:
				return $nDays * 604800;
				break;

			case self::DAY:
				return $nDays * 7;
				break;
				
			case self::WEEK:
				return $nDays;
				break;
				
			case self::YEAR:
				return $nDays * 365;
				break;
				
		} // switch
		
		return false;
		
	} // convertWeekToFormat


	//-------------------------
	function completeWeeks(	$dateTime1,
							$dateTime2,
							$format=self::WEEK ){
										
		if( empty($format) ){ $format=self::WEEK;  }

		$Weekend 		= array( 0, 6 ); // 0=sun, 6=sat
		$isCountStarted = false;
		$iWeekCount 	= 0;
		$iCount 		= 0;
		
		$iDateNext 	= clone $dateTime1;
		$iDate 		= $iDateNext;
		
		while( $iDate <= $dateTime2 ) {
		
			$iDateNext = clone $iDate;
			$iDateNext->modify("+1 day"); 
			
			//echo "xx=>".$iDate->format('Y-m-d H:i:s')."<br>";
			//echo "yy=>".$iDateNext->format('Y-m-d H:i:s')."<br>";
		
			if( $iDateNext <= $dateTime2 ){
				$day = $iDate->format('w');  // 0=sun, 1=mon, ..., 6=sat
				
				if( $day == 0 ){ 
					if( $iCount > 0) 								{ $isCountStarted = true; } 
					else if( intval( $iDate->format('His')) == 0 ) 	{ $isCountStarted = true; }
				}
				if( $isCountStarted && ($day == 6) ){ $iWeekCount++; }
			}
		
			$iDate = $iDateNext;
			$iCount++;
			//echo 'iDate=' . $iDate->format('Y-m-d H:i:s') . '| day=' . $day . '| ' . $iDate->format('Y-m-d H:i:s') . "<br>";
		
		} // while
		
		return $this->convertWeekToFormat( $iWeekCount, $format );

	} // completeWeeks

	//-----------------------------
	function convertWeekToFormat( 	$nWeeks,
									$format ){
		
	
		switch( $format ){
			case self::HOUR:
				return $nWeeks * 168;
				break;
			
			case self::MINUTE:
				return $nWeeks * 10080;
				break;

			case self::SECOND:
				return $nWeeks * 604800;
				break;

			case self::DAY:
				return $nWeeks * 7;
				break;
				
			case self::WEEK:
				return $nWeeks;
				break;
				
			case self::YEAR:
				return $nWeeks * 0.0191781;
				break;
				
		} // switch
		
		return false;
		
	} // convertWeekToFormat
	
	//-------------------------
	function completeTimePeriods( 	$dateTime1,
									$dateTime2,
									$format=self::WEEK ){
	
		return intval( $this->daysDiff( $dateTime1, $dateTime2, $format ) );

	} // completeTimePeriods
		
} // DateCalc

?>