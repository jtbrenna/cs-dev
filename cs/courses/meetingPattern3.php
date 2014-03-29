<?php
/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
this program is designed to search for each semester a course has been offered. it uses
a database that is populated from the registrars historical records.

you need to pass in the course department code (ex CS), the course number (ex 008, or 8) nad how many years back you want to look (default is five)

it does filter out lab courses so it only works for courses listed as LEC.

*/
session_name("uvmCourses");
session_start();

$_SESSION["debug"] = false;

$databaseName="RERICKSO_COURSES";

// %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
include("lib/mydb.php");
include("lib/connectMe.php");

//fixes amp issue for validation
ini_set("arg_separator.output", "&amp;");
ini_set("url_rewriter.tags", "a=href,area=href,frame=src,input=src");

$newLine = "\n";


function inStr ($needle, $haystack) 
{ 
  $needlechars = strlen($needle); //gets the number of characters in our needle 
  $i = 0; 
  for($i=0; $i < strlen($haystack); $i++) //creates a loop for the number of characters in our haystack 
  { 
    if(substr($haystack, $i, $needlechars) == $needle) //checks to see if the needle is in this segment of the haystack 
    { 
      return TRUE; //if it is return true 
    } 
  } 
  return FALSE; //if not, return false 
}  
?>
<style type="text/css">

table{ 

	border-collapse:collapse;
}
table table {
	width: 100%;
	padding-left: .3em;
}


th, td, .meetingHistory {
	border-top: thin solid gray;
	border-bottom: thin solid gray;
	border: thin solid gray;
}

table th{
	padding: 0 1em 0 1em;
}
.springClass {
	color:#000000;
	background-color:#FFFF33;
}	
	
.summerClass {
	color:#000000;
	background-color:#070;
}	
.fallClass {
	color:#000000;
	background-color:#FF9933;
}	
.winterSession {
	color:#000000;
	background-color:#FFF;
}
.notOffered {
	color:#000000;
	background-color:#000;
}

/* put a border on every third column */
.endYear{
	border-right: medium solid grey;
}


</style>



<?php	
echo "Hello";
$debug=false;
//clear previous output
unset($outputBuffer);

//$outputBuffer[] = '<h2>Courses</h2>';

// how many years back do you want to see the history for?
//$yearsBack=5;
if(isset($_GET["yearsBack"])){
	$yearsBack=$_GET["yearsBack"]+1;
}else{
	$yearsBack=5;
}

$currentYear = date("Y");

// (2011 - 5 = 2006) + 1 since we want the current year included;
$oldestYear = $currentYear-$yearsBack+1;

if ($oldestYear<1995){
	$oldestYear=1995;
	$yearsBack=$currentYear-$oldestYear+1;
}


// which course do you want to find the meeting pattern for.
if(isset($_GET["deptCode"])){
	$dept=$_GET["deptCode"];
}else{
	$dept="CS";
}
if(isset($_GET["courseNum"])){
	$courseNumber=$_GET["courseNum"];
}else{
	$courseNumber=8;
}

//filter only lectures
$lecLab="Lec";

//grabs the courses
$query = 'SELECT DISTINCT fldCourseNum, fldTitle FROM tblCourseOffered ';
$query .= 'WHERE fldDept="' . $dept . '" ';
$query .= 'AND  fldLecLab="' . $lecLab . '" ';
$query .= 'AND fldYear>(Year(Now())-' . $yearsBack . ') ';
$query .= 'AND fldCurrentEnrollment>0 ';
if($courseNumber >0){
	$query .= 'AND fldCourseNum =' . $courseNumber . ' ';
}
$query .= 'ORDER BY fldCourseNum';

if($debug) print "<p>Line 36: " . $query;

$courseList = $myDatabase->numRows($query);

if($courseList){
	$courseList = $myDatabase->select($query);
	
	$outputBuffer[] = '<table>';
    $outputBuffer[] = '<tr>';
//	$outputBuffer[] = '<th>Degree Requirement</th>';
    $outputBuffer[] = '<th>Dept</th>';
    $outputBuffer[] = '<th>Number</th>';
    $outputBuffer[] = '<th>Title</th>';
//	$outputBuffer[] = '<th>Description</th>';
//    $outputBuffer[] = '<th>Credits</th>';
    $outputBuffer[] = '<th>Meeting Pattern<br />Last ' . $yearsBack . ' Years</th>';
    $outputBuffer[] = '</tr>';

	//display the information for this course
	foreach ($courseList as $courseNumbers){
		$query='SELECT fldYear, fldSemester ';
		$query .='FROM tblCourseOffered  ';
		$query .='GROUP BY tblCourseOffered.fldYear,  ';
		$query .='tblCourseOffered.fldSemester,  ';
		$query .='tblCourseOffered.fldDept,  ';
		$query .='tblCourseOffered.fldCourseNum,  ';
		$query .='tblCourseOffered.fldLecLab  ';
		$query .='HAVING (((tblCourseOffered.fldYear)>Year(Now())-' . $yearsBack . ')  ';
		$query .='AND ((tblCourseOffered.fldCourseNum)=' . $courseNumbers["fldCourseNum"] . ')  ';
		$query .='AND ((tblCourseOffered.fldDept)="' . $dept . '")  ';
		$query .='AND ((Sum(tblCourseOffered.fldCurrentEnrollment))>0)  ';
		$query .='AND ((tblCourseOffered.fldLecLab)="' . $lecLab . '"))';
	
if($debug) print "<p>Line 71: " . $query;

	   	$results = $myDatabase->numRows($query);
       
        if($results){
			
			//print out course information
        	$results = $myDatabase->select($query);
            $outputBuffer[] = '<tr>';
        //    $outputBuffer[] = '<td></td>';
            $outputBuffer[] = '<td>' . $dept . '</td>';
            $outputBuffer[] = '<td>' . $courseNumbers["fldCourseNum"] . '</td>';
            $outputBuffer[] = '<td>' . $courseNumbers["fldTitle"] . '</td>';
 //           $outputBuffer[] = '<td>Description</td>';
 //           $outputBuffer[] = '<td>Credits</td>';
               	 
           	// output meeting pattern in a table
			// 2006 2007 2008 2009 2010 2011
			//
           	
			$outputBuffer[] = '<td><table>';
          	//$a=0;
       		$outputBuffer[] = '<tr>';
						
			for($i=$oldestYear;$i<=$currentYear;$i++){
				$outputBuffer[] = '<th colspan="3" class="endYear">' . $i . "</th>";
			}
			
			$outputBuffer[] = '</tr>';
          		
          	$outputBuffer[] = '<tr>';	
          
          	$a=0;
          	$compareYear=$oldestYear;
			
			$printYear=0;
			$outputLine="";
          	foreach ($results as $key => $row){
				

				
				if($row["fldYear"]!=$printYear){
					if($printYear!=0){
						if(!inStr("1", $printed)) $outputLine .= '<td class="notOffered">&nbsp;';
						if($debug) $outputLine .= substr($printYear, -2);
						$outputLine .= '</td>';	
						
						if(!inStr("6", $printed)) $outputLine .= '<td class="notOffered">&nbsp;';
						if($debug) $outputLine .= substr($printYear, -2);
						$outputLine .=  '</td>';
						
						if(!inStr("9", $printed)) $outputLine .= '<td class="notOffered endYear">&nbsp;';
						if($debug) $outputLine .= substr($printYear, -2);
						$outputLine .=  '</td>';
				
						// print out blanks if course was not offered in a year.
						// this needs fixing because new course wont be padded
						$c=$row["fldYear"]-$printYear - 1;  
						if($debug) print "<p>Line 112" . $row["fldYear"] . " " . $printYear;
						// c is the year of display, like first year, second year ... current year
						for($b=0;$b<$c;$b++){
							if($debug) print "<p>Line 112 b=: " . $b . " c=" . $c;
												
							$outputLine .= '<td class="notOffered">&nbsp;</td>';
							$outputLine .= '<td class="notOffered">&nbsp;</td>';
							$outputLine .= '<td class="notOffered endYear">&nbsp;</td>';
						} // end for each		
					}else{ //course was not offered that far back
					$c=$row["fldYear"]-$oldestYear;  
						for($b=0;$b<$c;$b++){
							$outputLine .= '<td class="notOffered">&nbsp;</td>';
							$outputLine .= '<td class="notOffered">&nbsp;</td>';
							$outputLine .= '<td class="notOffered endYear">&nbsp;</td>';
						}
					}
					$printed="";
					$printYear=$row["fldYear"];
				}
				//set style for td
				switch ($row["fldSemester"]){
					case 1:
						$outputLine .= '<td class="springClass">&nbsp;';
						if($debug) $outputLine .= substr($row["fldYear"], -2);
						$outputLine .=  '</td>';
						$printed=1;			
						break;
					case 6:
						if($printed!=1) {
							$outputLine .= '<td class="notOffered">&nbsp;';
							if($debug) $outputLine .= substr($row["fldYear"], -2);
						$outputLine .=  '</td>';
							$printed.=1;
						}
						$outputLine .= '<td class="summerClass">&nbsp;';
						if($debug) $outputLine .= substr($row["fldYear"], -2);
						$outputLine .=  '</td>';
						$printed.=6;					
						break;
					case 9:
						if(!inStr("1", $printed)) {
							$outputLine .= '<td class="notOffered">&nbsp;';
						if($debug) $outputLine .= substr($row["fldYear"], -2);
						$outputLine .=  '</td>';
							$printed.=1;
						}
						if(!inStr("6", $printed)) {
							$outputLine .= '<td class="notOffered">&nbsp;';
						if($debug) $outputLine .= substr($row["fldYear"], -2);
						$outputLine .=  '</td>';
							$printed.=6;
						}
						$outputLine .= '<td class="fallClass endYear">&nbsp;';
						if($debug) $outputLine .= substr($row["fldYear"], -2);
						$outputLine .=  '</td>';		
						$outputLine .= '<!-- printed=' . $printed . " instr=" . inStr("1", $printed) . "-->";
						$printed.=9;				
						break;
					default:
						$outputLine = "mistake";
						break;
				} // switch
			}
			$outputBuffer[] = $outputLine;
			$outputBuffer[] = '</tr>';
			$outputBuffer[] = '</table></td>';
			$outputBuffer[] = '</tr>'; // ends row for course
		} // if for single class data
		
	} // for each course number
    	//display legend
//echo '<table width="200" border="1">';
$outputBuffer[] =  '  <tr>';
$outputBuffer[] =  '    <td colspan="4">NOTE: Color coding by semester</td></tr>';
$outputBuffer[] =  ' <tr>   <th class="springClass">Spring Class</th>';
$outputBuffer[] =  '    <th class="summerClass" style="color:#ffffff;">Summer Class</th>';
$outputBuffer[] =  '    <th class="fallClass">Fall Class</th>';
$outputBuffer[] =  '    <th class="notOffered" style="color:#ffffff;">Class Not Offered</th>';
$outputBuffer[] =  '  </tr>';
$outputBuffer[] =  '    <td colspan="4">NOTE: Sequence pattern is for course number so title changes simply repeat. Page does not work for special topic courses.</td></tr>';
//echo '</table>';
	$outputBuffer[] = '</table>';
} //ends if for course number

else {
		$outputBuffer[] = "<p>Sorry course: $dept $courseNumber does not exist</p>";
	}
//save output buffer until later

// display form
echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="get" name="frmCourseHistory">';
include ("DeptList.html");

// #$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%
// here it would be good to use ajax to go and get the course numbers for that department
//
echo '<input name="courseNum" type="text" value="' . $courseNumber . '" size="5" maxlength="3" />';

// #$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%@#$%
// here it would be find duplicated titles so the person can pick one.
//

echo '<select name="yearsBack">';
for($i=$currentYear;$i>=1995;$i--){
	echo '<option value="' . ($currentYear-$i)*1 . '"';
	if($i==$oldestYear){
		echo ' selected="selected" ';
	}
	echo '>' . $i . "</option>\n";	
}
echo '</select>';
echo '<input name="cmdSubmit" type="submit" value="Find Course History" />';
echo '<input name="cmdReset" type="reset" value="Reset" />';
echo '</form>';
$outputBuffer[] = '</div> <!-- ########### main Content ########### -->';
$outputBuffer[] = '</body>';
$outputBuffer[] = '</html>';
$output = join("\n", $outputBuffer);
//display meeting pattern
echo $output; 

//include ('bottomFooter.php');
?>
<script type="text/javascript">
<!--
document.getElementById("deptCode").value="<?print $dept;?>"
//-->
</script>
