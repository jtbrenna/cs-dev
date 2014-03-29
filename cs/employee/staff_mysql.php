
<?php
echo("<ul>\n");
/*******************************
			STAFF
*******************************/
$link = mysql_connect("mysql.cems.uvm.edu", "public", "");
$selectstr = "SELECT distinct PosDept.dept,fname,lname,degree,alma_mater,facstaff.EmID,PosDept.position FROM facstaff,PosDept WHERE
PosDept.EmID=facstaff.EmID and (PosDept.FacStaff='S' or PosDept.FacStaff='B') ";

$orderstr = "order by lname,fname";
$deptstr = "and (PosDept.dept='CS' and
PosDept.position not like '%Director%')";

$qstring = $selectstr . " " . $deptstr . " " . $orderstr;

if(!($faculty_result = mysql_db_query("web",$qstring,$link))) echo(mysql_error());
$count = 0;
$color = "white";
 
while (list($dept,$fname,$lname,$degree,$alma_mater,$EmID,$position) = mysql_fetch_row($faculty_result)) {

	$href = $root . "/profile2.php?EmID=" . $EmID . "&dept=" . $dept;
	$href = $root . "/profile2.php?EmID=" . $EmID;

	$href = "http://www.uvm.edu/~cems/?Page=employee/profile.php&SM=employee/_employeemenu.html&EmID=" . $EmID;

	echo("<li><a href=$href>$fname $lname,");
	if ($degree) echo(" $degree,");
	echo(" $position");
	if ($alma_mater) echo(" ($alma_mater)");

	echo("</a></li>\n");
	$count++;
	}


echo("</ul>\n");
?>
