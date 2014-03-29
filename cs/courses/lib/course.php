<?php
class course{

/*   Dept,#,Title,Comp Numb,Sec,Lec Lab,Camp Code,Max Enrollment,Current Enrollment,Start Time,End Time,Days,Bldg,Room,Instructor,Credits

"CS","008","Introduction: WWW Design (2-2)","13523","A","LEC","M","40","36","12:50","13:40","M  W  F   ","KALKIN","003","Erickson, Robert M.","3"

fldDept	char(4)	YES	 	NULL	 
fldCourseNum	int(11)	YES	 	NULL	 
fldTitle	varchar(255)	YES	 	NULL	 
fldCompNumb	int(11)	NO	PRI	NULL	 
fldSec	char(4)	YES	 	NULL	 
fldLecLab	char(4)	YES	 	NULL	 
fldCampusCode	char(4)	YES	 	NULL	 
fldMaxEnrollment	int(11)	YES	 	NULL	 
fldCurrentEnrollment	int(11)	YES	 	NULL	 
fldStartTime	varchar(15)	YES	 	NULL	 
fldEndTime	varchar(15)	YES	 	NULL	 
fldDays	varchar(20)	YES	 	NULL	 
fldBldg	varchar(60)	YES	 	NULL	 
fldRoom	varchar(60)	YES	 	NULL	 
fldInstructor	varchar(255)	YES	 	NULL	 
fldCredits	varchar(10)	YES	 	NULL	 
fldSemester	int(11)	NO	PRI	NULL	 
fldYear	int(11)	NO	PRI	NULL	 

fldDept
fldCourseNum
fldTitle
fldCompNumb
fldSec
fldLecLab
fldCampusCode
fldMaxEnrollment
fldCurrentEnrollment
fldStartTime
fldEndTime
fldDays
fldBldg
fldRoom
fldInstructor
fldCredits
fldSemester
fldYear

dept
courseNum
title
compNumb
sec
lecLab
campusCode
maxEnrollment
currentEnrollment
startTime
endTime
days
bldg
room
instructor
credits
semester
year

*/
//
var $tablename;         // table name
var $dbname;            // database name
var $rows_per_page;     // used in pagination
var $pageno;            // current page number
var $lastpage;          // highest page number
var $fieldlist;         // list of fields in this table
var $data_array;        // data from the database
var $errors;            // array of error messages

//constructor
 function myClass ()
  {
    $this->tablename       = 'tblCourse';
    $this->dbname          = 'RERICKSO_2';
    $this->rows_per_page   = 30;
    
    $this->fieldlist = array('dept', 'courseNum', 'title', 'compNumb', 'sec', 'lecLab', 'campusCode', 'maxEnrollment', 'currentEnrollment', 'startTime', 'endTime', 'days', 'bldg', 'room', 'instructor', 'credits', 'semester', 'year');
//    $this->fieldlist['column1'] = array('pkey' => 'y');
//pirmary key id year semester courseNum
  } // constructor
	
/*

$query = "SELECT $select_str FROM $from_str $where_str $group_str $having_str $sort_str $limit_str";

*/	
function getData ($where){
	$this->data_array = array();
  $pageno          = $this->pageno;
  $rows_per_page   = $this->rows_per_page;
  $this->numrows   = 0;
  $this->lastpage  = 0;	
		
	include("connectMe.php");
			
			if (empty($where)) {
         $where_str = NULL;
      } else {
         $where_str = "WHERE $where";
      } // if
			
			$query = "SELECT count(*) FROM $this->tablename $where_str";
      $result = mysql_query($query, $dbconnect) or trigger_error("SQL", E_USER_ERROR);
      $query_data = mysql_fetch_row($result);
      $this->numrows = $query_data[0];
			
			if ($this->numrows <= 0) {
         $this->pageno = 0;
         return;
      } // if
			
// If there is data then we want to calculate how many pages it will take based on the page size given in $rows_per_page.
      if ($rows_per_page > 0) {
         $this->lastpage = ceil($this->numrows/$rows_per_page);
      } else {
         $this->lastpage = 1;
      } // if

// Next we must ensure that the requested page number is within range. Note that the default is to start at page 1.
      if ($pageno == '' OR $pageno <= '1') {
         $pageno = 1;
      } elseif ($pageno > $this->lastpage) {
         $pageno = $this->lastpage;
      } // if
      $this->pageno = $pageno;
						
// Now we can construct the LIMIT clause for the database query in order to retrieve only those rows which fall within the specified page number:
      if ($rows_per_page > 0) {
         $limit_str = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;
      } else {
         $limit_str = NULL;
      } // if			

// Now we can build the query string and run it.
      $query = "SELECT * FROM $this->tablename $where_str $limit_str";
      $result = mysql_query($query, $dbconnect) or trigger_error("SQL", E_USER_ERROR);			

//extract the data and convert it into an associative array
     while ($row = mysql_fetch_assoc($result)) {
         $this->data_array[] = $row;
      } // while
			
			     mysql_free_result($result);
   
      return $this->data_array;
      
   } // getData			
			
} // end class

?>
