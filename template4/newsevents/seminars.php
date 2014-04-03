<?php
$today = getdate();
$year = $today[year];
$mon = $today[mon];
if ($mon < 10) $mon = "0" . $mon;
$day = $today[mday];
if ($day < 10) $day = "0" . $day;

$date = $year . $mon . $day;
echo("<script language=javascript>\n");
echo("window.location = 'http://www.uvm.edu/~cems/cs/?Page=newsevents/seminarlist.php&SM=newsevents/_newseventsmenu.html#$date';");
echo("</script>\n");
?>
