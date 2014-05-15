<style type="text/css">
	img {
		float:left;
		padding-right: 5px;
	}
</style>
<?
//array of faculty memebers and their faculty spotlight
//display faculty based on the month of course it is not an even match 
//so the first three get displayed more than others.
$faculty[1] = "spotlights/blee.html";
$faculty[2] = "spotlights/bongard.html";
$faculty[3] = "spotlights/erickson.html";
$faculty[4] = "spotlights/horton.html";
$faculty[5] = "spotlights/pechenick.html";
$faculty[6] = "spotlights/skalka.html";
//$faculty[8] = "spotlights/xwu.html";

$facIndex=date(n);

if($facIndex>7){
	$facIndex=13-$facIndex;//ie if it is 10 then display blee, 11 display bongard etc
}

$current=$faculty[$facIndex];
print "<h3>Faculty Spotlight</h3>";
include ($current);
?>
