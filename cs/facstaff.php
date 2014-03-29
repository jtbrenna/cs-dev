<a name="top" id="top"></a>

<h3>Faculty &amp; Staff </h3>
<p>
<img src="gfx/faculty06.jpg" alt="CS Faculty" width="518" height="296" /><br />
</p>

<h4>Faculty</h4>

<p>The faculty of the Department of Computer Science aspires to excellence in teaching computer science at all levels, emphasizing both long-term academic preparation and shorter-term economic importance. The faculty is also dedicated to excellence in research and graduate education by developing strengths in a small number of focused research areas and by exploiting Computer Science's unique opportunities for collaboration with other strong research areas at the University.</p>

<p>Click the links below to see profiles of our faculty.</p>

<p>
<table class="main">

<?php
/*******************************
			FACULTY
*******************************/
$root = "http://www.cems.uvm.edu";

$link = mysql_connect("mysql.cems.uvm.edu", "public", "");

$whichd = "CS";
    if(!($nice_faculty_name_result = mysql_db_query("web","SELECT depname FROM depts WHERE dept = '$whichd'",$link)))  echo(mysql_error());

    list($depname) = mysql_fetch_row($nice_faculty_name_result);

    $name_str = "SELECT distinct PosDept.dept,fname,lname,degree,alma_mater,facstaff.EmID,PosDept.position FROM facstaff,PosDept WHERE ";

    $match_str = "PosDept.dept = '$whichd' and PosDept.EmID=facstaff.EmID and (PosDept.FacStaff='F' or PosDept.FacStaff='B') and PosDept.position not like '%adjunct%' and PosDept.position not like '%visit%' and PosDept.position not like '%emerit%'";
    $qstring = $name_str . $match_str;
	$qstring = $qstring . "order by lname,fname";

    if(!($faculty_result = mysql_db_query("web",$qstring,$link))) echo(mysql_error());
    $count = 0;
    $color = "white";
    while (list($indept, $fname, $lname, $degree, $alma_mater, $EmID, $position) = mysql_fetch_row($faculty_result)) {

        //$href = $root . "/profile.php?EmID=" . $EmID . "&dept=" . $whichd;
$href = "http://www.uvm.edu/~cems/?Page=employee/profile.php&SM=employee/_employeemenu.html&EmID=" . $EmID;
        echo("<tr><td bgcolor=$color><a href=$href>$fname $lname, $position");
            if ($alma_mater) echo(" ($alma_mater)");

        echo("</a></td></tr>\n");
        $count++;
        if (strcmp($color,"white")) $color = "white";
        else $color = "#EEEEEE";
        }

echo("<tr><td></td></tr>\n");

/*******************************
		Adjunct Faculty
*******************************/

	$whichd = "CS";
    if(!($nice_faculty_name_result = mysql_db_query("web","SELECT depname FROM depts WHERE dept = '$whichd'",$link)))  echo(mysql_error());

    list($depname) = mysql_fetch_row($nice_faculty_name_result);

    $name_str = "SELECT distinct PosDept.dept,fname,lname,degree,alma_mater,facstaff.EmID,PosDept.position FROM facstaff,PosDept WHERE ";

    $match_str = "PosDept.dept = '$whichd' and PosDept.EmID=facstaff.EmID and (PosDept.FacStaff='F' or PosDept.FacStaff='B') and PosDept.position like '%adjunct%' and PosDept.position not like '%visit%'";
    $qstring = $name_str . $match_str;
	$qstring = $qstring . "order by lname,fname";

    if(!($faculty_result = mysql_db_query("web",$qstring,$link))) echo(mysql_error());

	// if $faculty_result is empty, don't show header
	$num_results = mysql_num_rows($faculty_result);
	if ($num_results > 0){
		echo("<tr><td class=left><b>Adjuncts</b></td></tr>\n");
	}
	
    $count = 0;
    $color = "white";
    while (list($indept, $fname, $lname, $degree, $alma_mater, $EmID, $position) = mysql_fetch_row($faculty_result)) {

        //$href = $root . "/profile.php?EmID=" . $EmID . "&dept=" . $whichd;
		$href = "http://www.uvm.edu/~cems/?Page=employee/profile.php&SM=employee/_employeemenu.html&EmID=" . $EmID;
        echo("<tr><td bgcolor=$color><a href=$href>$fname $lname, $position");
            if ($alma_mater) echo(" ($alma_mater)");

        echo("</a></td></tr>\n");
        $count++;
        if (strcmp($color,"white")) $color = "white";
        else $color = "#EEEEEE";
        }

echo("<tr><td>&nbsp;</td></tr>\n");

/*********************************
* Computer Science Emeriti Faculty
*********************************/

$whichd = "CS";
    if(!($nice_faculty_name_result = mysql_db_query("web","SELECT depname FROM depts WHERE dept = '$whichd'",$link)))  echo(mysql_error());

    list($depname) = mysql_fetch_row($nice_faculty_name_result);

    $name_str = "SELECT distinct PosDept.dept,fname,lname,degree,alma_mater,facstaff.EmID,PosDept.position FROM facstaff,PosDept WHERE ";

    $match_str = "PosDept.dept = '$whichd' and PosDept.EmID=facstaff.EmID and (PosDept.FacStaff='F' or PosDept.FacStaff='B') and PosDept.position like '%emerit%'";
    $qstring = $name_str . $match_str;
	$qstring = $qstring . "order by lname,fname";

    if(!($faculty_result = mysql_db_query("web",$qstring,$link))) echo(mysql_error());

	// if $faculty_result is empty, don't show header
	$num_results = mysql_num_rows($faculty_result);
	if ($num_results > 0){
		echo("<tr><td class=left colspan=2><b>Emeriti</b></td></tr>\n");
	}
	
    $count = 0;
    $color = "white";
    while (list($indept, $fname, $lname, $degree, $alma_mater, $EmID, $position) = mysql_fetch_row($faculty_result)) {

        //$href = $root . "/profile.php?EmID=" . $EmID . "&dept=" . $whichd;
$href = "http://www.uvm.edu/~cems/?Page=employee/profile.php&SM=employee/_employeemenu.html&EmID=" . $EmID;
        echo("<tr><td bgcolor=$color><a href=$href>$fname $lname, $position");
            if ($alma_mater) echo(" ($alma_mater)");

        echo("</a></td></tr>\n");
        $count++;
        if (strcmp($color,"white")) $color = "white";
        else $color = "#EEEEEE";
        }
?>
</table>
</p>

<p></p>

<h4>Staff</h4>
<p>The CS staff is committed to helping our students handle all their non-academic requirements smoothly and expeditiously.</p>
<p>Although academic advising resides primarily in the hands of the  faculty, the support and advice our students receive from the experienced staff of the <a href="http://www.uvm.edu/%7Ecems/?Page=current/studentservices.php&amp;SM=current/_currentmenu.html">Office of Student Services</a> is integral to ensuring that our students navigate their college years as easily as possible. <a href="http://www.uvm.edu/%7Ecems/?Page=current/careerservices.php&amp;SM=current/_currentmenu.html">Career services</a> provides help with obtaining pre-professional work, career planning, networking and researching graduate programs. Our <a href="http://www.uvm.edu/%7Ecems/?Page=outreach/default.html">Outreach</a> and <a href="http://www.uvm.edu/%7Ecems/?Page=diversity/default.html">Diversity</a> staff strive to involve potential students in the world of engineering,  mathematics and computer science while increasing the number of women  and minority students in our programs, creating a dynamic student body.</p>

<p>Click the links below to see profiles of our staff:</p>

<ul>

<?php
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

?>

</ul>
<br />
