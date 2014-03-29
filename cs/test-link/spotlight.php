<?
//array of faculty memebers and their faculty spotlight
//display faculty based on the month of course it is not an even match 
//so the first three get displayed more than others.
$faculty[1] = "spotlights/blee.html";
$faculty[2] = "spotlights/bongard.html";
$faculty[3] = "spotlights/douglas.html";
$faculty[4] = "spotlights/erickson.html";
$faculty[5] = "spotlights/pechenick.html";
$faculty[6] = "spotlights/redmond.html";
$faculty[7] = "spotlights/skalka.html";
$faculty[8] = "spotlights/wang.html";
$faculty[9] = "spotlights/xwu.html";
//$faculty[10] = "spotlights/";
//$faculty[11] = "spotlights/";
//$faculty[12] = "spotlights/";

$facIndex=date(n);
if($facIndex>9){
	$facIndex=12-9;//ie if it is 10 then display blee, 11 display bongard etc
}
$current=$faculty[$facIndex];
print "<h3>Faculty Spotlight</h3>";
include ($current);
?>
