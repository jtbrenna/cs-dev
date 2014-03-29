
<!-- RIGHT HAND NAVIGATION BOX INCLUDE -->
<?php
include('_undergradsuppnav.html');
?>

<p>
<strong>Choose a term:</strong> [<a title="Courses available in Fall 2008" href="http://www.uvm.edu/~cems/cs/?Page=Courses&amp;category=CS&amp;term=200809">Fall 2008</a>]
 &nbsp; 
[<a title="Courses available in Summer 2008" href="http://www.uvm.edu/~cems/cs/?Page=Courses&amp;category=CS&amp;term=200806">Summer 2008</a>]
 &nbsp; 
[<a title="Courses available in Spring 2008" href="http://www.uvm.edu/~cems/cs/?Page=Courses&amp;category=CS&amp;term=200801">Spring 2008</a>]
 &nbsp; 
[<a title="Courses available in Fall 2007" href="http://www.uvm.edu/~cems/cs/?Page=Courses&amp;category=CS&amp;term=200709">Fall 2007</a>]
 &nbsp; 
[<a title="Courses available in Summer 2007" href="http://www.uvm.edu/~cems/cs/?Page=Courses&amp;category=CS&amp;term=200706">Summer 2007</a>]
 &nbsp; 
 [All courses]
</p>

<?php
$default_term = 200709;
require_once "{$_SERVER['UVMMAGIC']}/plugins/courses/Course_Catalogue_Web.php";
$debug = isset($_REQUEST['debug']) ? true : null;
$course =& new Course_Catalogue_Web($debug);
$course->setDefaultTerm($default_term);
print $course->browse($_REQUEST);
?>

