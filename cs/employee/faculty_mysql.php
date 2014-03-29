
<?php


/* This gets you the primary: */
$title[0] = "<a name=primary>Professors with primary appointments in CS<br>(potential graduate student advisors)";
$match[0] = "where facstaff.EmID=PosDept.EmID and PosDept.primary_assignment=1 and dept='CS' and (FacStaff='F' or FacStaff='B') and PosDept.position like '%prof%' and PosDept.position not like '%adj%' and PosDept.position not like '%visit%' and PosDept.position not like '%emerit%'";

/* lecturers */
$title[1] = "<a name=lecturers>Lecturers with primary appointments in CS";
$match[1] = "where facstaff.EmID=PosDept.EmID and PosDept.primary_assignment=1 and dept='CS' and (FacStaff='F' or FacStaff='B') and PosDept.position like '%lectur%' and PosDept.position not like '%emerit%'";

/* This gets you the secondary:*/
$title[2] = "<a name=secondary>Professors with secondary appointments in CS<br>(potential graduate student advisors)";
$match[2] = "where facstaff.EmID=PosDept.EmID and PosDept.primary_assignment>1 and dept='CS' and (FacStaff='F' or FacStaff='B') and PosDept.position like '%prof%' and PosDept.position not like '%adj%' and PosDept.position not like '%visit%'";

/* Adjunct */
$title[3] = "<a name=adjunct>Adjunct faculty in CS";
$match[3] = "where facstaff.EmID=PosDept.EmID and PosDept.primary_assignment=1 and dept='CS' and (FacStaff='F' or FacStaff='B') and PosDept.position like '%adj%'";

/* Emeritus */
$title[4] = "<a name=Emeritus>Emeritus";
$match[4] = "where facstaff.EmID=PosDept.EmID and PosDept.primary_assignment=1 and dept='CS' and (FacStaff='F' or FacStaff='B') and PosDept.position like '%emerit%'";

echo("<table width=100% border=0>\n");
for($m=0;$m<5;++$m) {
	echo("<tr><td bgcolor=white colspan=2><hr></b></td></tr>\n");
	echo("<tr><td bgcolor=white colspan=2><b><font size=+1>$title[$m]</font></b></td></tr>\n");
	echo("<tr><td bgcolor=white colspan=2><hr></b></td></tr>\n");
	$root = "http://www.cems.uvm.edu";

	$link = mysql_connect("mysql.cems.uvm.edu", "public", "");

    if(!($nice_faculty_name_result = mysql_db_query("web","SELECT depname FROM depts WHERE dept = '$whichd'",$link)))  echo(mysql_error());

    list($depname) = mysql_fetch_row($nice_faculty_name_result);

    $name_str = "SELECT distinct PosDept.dept,fname,lname,degree,alma_mater,facstaff.EmID,PosDept.position,piclname,expert FROM facstaff,PosDept ";

    $qstring = $name_str . $match[$m];
	$qstring = $qstring . "order by lname,fname";

    if(!($faculty_result = mysql_db_query("web",$qstring,$link))) echo(mysql_error());
    $count = 0;
    $color = "white";
    while (list($indept, $fname, $lname, $degree, $alma_mater, $EmID, $position,$piclname,$expert) = mysql_fetch_row($faculty_result)) {

		$href = "http://www.uvm.edu/~cems/?Page=employee/profile.php&SM=employee/_employeemenu.html&EmID=" . $EmID;
		echo("<table border=0 bgcolor=$color width=100%>\n");
		echo("<tr><td bgcolor=$color>");
		echo("<table border=0 width=100%><tr><td width=10%>");

		if(($piclname === 'temp.gif') || ($piclname === 'temp.jpg') || (!$piclname) || !strlen($piclname)) {
        	echo("<img src=http://www.uvm.edu/~cems/employee/photos/temp-new.gif width=100 alt=\"Photo not available.\" title=\"Photo not available\" border=0></a>");
        	}
		else {
        	$tempupic = strtolower ($piclname);
        	$starter = substr($tempupic, 0, 4);

        	if ($starter === 'http') {
               	echo("<img src=$piclname width=100 ");
               	echo("alt=\"$fname $lname\" title=\"$fname $lname\">");
               	}
        	else if($starter === 'emcf') {
               	$imagename = "http://www.cems.uvm.edu/profiles/photos/" . substr($tempupic, 5);
               	echo("<img src=$imagename width=100 ");
               	echo("alt=\"$fname $lname\" title=\"$fname $lname\">");
               	}
        	else {
               	echo("<img class='alignright' src=http://$piclname height='70' ");
               	echo("alt=\"$fname $lname\" title=\"$fname $lname\">");
               	}
       		}
		echo("</td><td valign=top>\n");
		echo("<a href=$href><b>$fname $lname</b></a>");
		echo("<br>");
		echo("<a href=mailto:$email>$email</a>");
		echo("<br>");
		if (strlen($expert)) {
			echo("<b>Expertise:</b><br>$expert");
			}
		echo("</td></tr></table></td></td>\n");

		echo("</td></tr></table>\n");

		$count++;
		if (strcmp($color,"white")) $color = "white";
		else $color = "#EEEEEE";
		}
	}

echo("</table>\n");
?>
