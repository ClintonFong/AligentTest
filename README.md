# AligentTest

There are many questions, approaches, interpretations, and ways we can view in answering the questions.

I started off with the first 3 questions as specified in days. Complete weeks starts on a Sunday and ends on a Saturday inclusively. 
And a day has to be 24 hours to be counted as a day.

Accepting a 3 parameter to convert the results to a year could also be interpreted in a variety of ways. One way is to just get the 
results of whatever was returned from the previous functions and convert it to the requested format, be that hours, minutes, seconds, 
or years. Another question arises what if it isn't a full day. Would we consider the x amount of hours or minutes that didn't quite make
up the full day be counted if asked for hours, minutes or seconds? The easiest answer would be just take the full day and convert that and
ignore the hours, minutes, and seconds that didn't make the full day. Because the calculations were done in days, this was the approach we
took. We could have calculated based on the asked format such as hours, minutes, seconds, or year, and increment the counts by that format.
This would leave the year to be either 0 or a fraction based on how we do the calculations.

I did not include any 3rd party tools since that will confuse the issues further since our interpretations of what is required and ideas
on how things are to be calculated may differ from those of 3rd party developers.

I have a Windows computer and somehow was having challenges with docker and getting a Linux emulation terminal working properly on my computer. 
So the sure way to get this working on any platform is use the most basic codes even though it may not look so elegant or how the API is called. 
One of the simplest way to call the api is through a url passing the relevant parameters across to it, which I used.

example /apiTest.php?fn=daysdiff&datetime1=2021-05-06&datetime2=2021-05-29&timeelement=minutes&timezone=Australia/Sydney

Possible values for 'fn' are 'daysdiff' | 'weekdaysdiff' | 'completetimeperiod'
Possible values for 'timeelement' are 'seconds'	|  'minutes' | 'hours' | 'days' | 'weeks' | 'years' 

timezone has to be in a valid DateTimeZone value such 'Australia/Sydney'. Valid timezones can be found at https://www.php.net/manual/en/timezones.php

There is no or limited error checking. So we would need to enter the values in correctly for it to work. 

date strings are to be of valid values for 'DateTime' values, and datetime1 has to be before/less than datetime2 for weekdaysdiff to work correctly.
There was no check and correction of these date values before implementation of the code.

There is no routing, etc., to keep the code simple. 

The files
src/calcDiff.php - the class that does the calculations.
src/apiTest.php - the file that handles the api calls.
src/test.php - used for testing.


 





