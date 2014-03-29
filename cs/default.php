<link href="cs.css" rel="stylesheet" type="text/css" />
<div id="homecontainer">
  <div id="cshomeright">
<span class="header3">CS Intern Spotlight</span><br />

<?php
/* this code grabs the file names from the given folder putting them
 * into an array so that we can choose a random spotlight
 * 
 */
    $alumni = array();
    $url = "http://www.uvm.edu/~cems/internship/csthumbs";  
    error_reporting(0); //404 reports a warning i dont want
    $var = file_get_contents($url);
    error_reporting(1);   
    
    if($var!=""){      
        preg_match_all ("/a[\s]+[^>]*?href[\s]?=[\s\"\']+".
                        "(.*?)[\"\']+.*?>"."([^<]+|.*?)?<\/a>/", 
                        $var, &$matches);

        $matches = $matches[1];
        $list = array();

        foreach($matches as $var){    
                    $ext = pathinfo($var, PATHINFO_EXTENSION);
                    $firstLetter=substr($var,0,2);
                    $lastLetter=substr($var, -1);
                    $fileType=substr($var, -3);
                    //exclude these file names and folders
                    if(!($firstLetter == "?C" || $firstLetter == "/~" || $fileType == "php" || $lastLetter == "/" )) {
                            $alumni[]= $var;
                    }
        }
      
    } 
    
    //display all profiles
    //print join("\n<p>", $alumni);
    
    //get a random profile
    $randomPerson = rand(0, count($alumni)-1);
    
//    print "<P>Random: " . $randomPerson;
//   print "<P>Random Profile: " . $alumni[$randomPerson];
    
	$includefile = $url . '/' . $alumni[$randomPerson];
    include ($includefile);

echo("<p><hr><p><span class='header3'>Alumni Spotlight</span><br />\n");
    $alumni = array();
    $url = "http://www.uvm.edu/~cems/cs/alumni/thumbs";  
    error_reporting(0); //404 reports a warning i dont want
    $var = file_get_contents($url);
    error_reporting(1);   
    
    if($var!=""){      
        preg_match_all ("/a[\s]+[^>]*?href[\s]?=[\s\"\']+".
                        "(.*?)[\"\']+.*?>"."([^<]+|.*?)?<\/a>/", 
                        $var, &$matches);

        $matches = $matches[1];
        $list = array();

        foreach($matches as $var){    
                    $ext = pathinfo($var, PATHINFO_EXTENSION);
                    $firstLetter=substr($var,0,2);
                    $lastLetter=substr($var, -1);
                    $fileType=substr($var, -3);
                    //exclude these file names and folders
                    if(!($firstLetter == "?C" || $firstLetter == "/~" || $fileType == "php" || $lastLetter == "/" )) {
                            $alumni[]= $var;
                    }
        }
      
    } 
    
    //display all profiles
    //print join("\n<p>", $alumni);
    
    //get a random profile
    $randomPerson = rand(0, count($alumni)-1);
    
//    print "<P>Random: " . $randomPerson;
//   print "<P>Random Profile: " . $alumni[$randomPerson];
    
	$includefile = $url . '/' . $alumni[$randomPerson];
    include ($includefile);

?>

<p>
<a href=http://www.uvm.edu/~cems/cs/?Page=alumni.html>CS Alumni, send us your stories!</a>
<p>
<hr width=90%>
    <p><br />
<span class="header3">Upcoming Events</span><br />
<!--
      There are no seminars scheduled at this time. </p>
-->
<BLOCKQUOTE>
<p><span class="title"><a href=http://www.uvm.edu/~cems/cs/?Page=newsevents/seminars.php&SM=newsevents/_newseventsmenu.html>CS Seminars</a>
    <p><br />
</BLOCKQUOTE>
   <!--  needs oracle calendar -->
 <!-- 
<p>
<span class="datetimeplace">
Thursday December 8, 2011<br />
9:00 am - 4:00 pm<br />
101 Perkins Hall</span>
<p><strong>10th UVM Computer Science Research Day</strong></p>


<p><a href="?Page=newsevents/2011fall/researchDay.php">Agenda</a></p><br />

<h6>[ <a href="?Page=newsevents/seminars.php">all seminars</a> ]</h6>
-->
    <div id="newslistfeature"> <span class="header3">Headlines</span>
      <?php

	require_once( "{$_SERVER['UVMMAGIC']}/plugins/news/aggregate_driver.php" );  // DO NOT CHANGE!!! 
	// see additional documentation at: http://www.uvm.edu/webguide/templateguide/?Page=additional/news.html&SM=additional/additionalmenu.html

	// update the category to a group abbreviation for your basic stories 
	// update numFull to specify the number of stories of this category to display on the page
	makeNews( array("category:cemscs","numBasic:4","startFrom:1") )

?>
    </div>
    
  <!-- BEGIN ROBOT ROTATOR --> 
    
    <script type="text/javascript">
function getNextImage(){
	hideImage = "robot"+current;
	hideDivImage(hideImage);
	if(	current == total ){
	 current = 1;
	}
	else { current++;}
	showImage = "robot"+current;
	showDivImage(showImage);	
}
function getPreviousImage(){
hideImage = "robot"+current;
	hideDivImage(hideImage);
	if(	current == 1 ){
	 current = total;
	}
	else { current--;}
	showImage = "robot"+current;
	showDivImage(showImage);
}
function showDivImage(showImage) { 
	document.getElementById(showImage).style.display = "block";
}
function hideDivImage(hideImage) {
	document.getElementById(hideImage).style.display = "none";
}
var total = 5;
var showImage = "robot"+ current;
var current = 1;
</script> 
    <span class="header3">Videos</span>
    <p>By the students in CS 195 (Hands-On Robotics):</p>
    <noscript>
    <p>Javascript is required.</p>
    </noscript>
    <div id="robot1">
      <div class="csvideobox""> <a href="http://www.uvm.edu/~cems/?Page=video/2009-cs195_baseball.php&SM=newsevents/_newsmenu.html"> <span class="title">Mindstorms Strikeout<br />
        Baseball</span><br />
        <img src="http://www.uvm.edu/~cems/video/gfx/2009-cs195/robot1.jpg" alt="Mindstorms Strikeout Baseball" title="Mindstorms Strikeout Baseball" width="126" height="78" border="0" /></a> </div>
    </div>
    <div id="robot2" style="display:none;">
      <div class="csvideobox""> <a href="http://www.uvm.edu/~cems/?Page=video/2009-cs195_eggsorting.php&SM=newsevents/_newsmenu.html"> <span class="title">Egg-Sorting Robot</span><br />
        <img src="http://www.uvm.edu/~cems/video/gfx/2009-cs195/robot2.jpg" alt="Egg-Sorting Robot" title="Egg-Sorting Robot" width="126" height="78" border="0" /></a> </div>
    </div>
    <div id="robot3" style="display:none;">
      <div class="csvideobox""> <a href="http://www.uvm.edu/~cems/?Page=video/2009-cs195_pianoplayer.php&SM=newsevents/_newsmenu.html"> <span class="title">NXJ Piano Player</span><br />
        <img src="http://www.uvm.edu/~cems/video/gfx/2009-cs195/robot3.jpg" alt="NXJ Piano Player" title="NXJ Piano Player" width="126" height="78" border="0" /></a> </div>
    </div>
    <div id="robot4" style="display:none;">
      <div class="csvideobox""> <a href="http://www.uvm.edu/~cems/?Page=video/2009-cs195_recyclebot.php&SM=newsevents/_newsmenu.html"> <span class="title">RecycleBot</span><br />
        <img src="http://www.uvm.edu/~cems/video/gfx/2009-cs195/robot4.jpg" alt="RecycleBot" title="RecycleBot" width="126" height="78" border="0" /></a> </div>
    </div>
    <div id="robot5" style="display:none;">
      <div class="csvideobox"> <a href="http://www.uvm.edu/~cems/?Page=video/2009-cs195_rover.php&SM=newsevents/_newsmenu.html"> <span class="title">Rover</span><br />
        <img src="http://www.uvm.edu/~cems/video/gfx/2009-cs195/robot5.jpg" alt="Rover" title="Rover" width="126" height="78" border="0" /></a> </div>
    </div>
    <p class="rotator"><a href="#self" onclick="Javascript:getPreviousImage()"><img class="rotator" src="gfx/arrow_green-previous.gif" border="0" alt="previous" title="previous" /></a><a href="#self"  onclick="Javascript:getNextImage()"><img class="rotator" src="gfx/arrow_green-next.gif" border="0" alt="next" title="next" /></a></p>
    
    <!-- END ROBOT ROTATOR --> 
    
<?php 
/*
include_once("{$_SERVER['UVMMAGIC']}/news/News_Class.php");
$news=new News;
echo $news->ShowHeadlines("cems:cs",3,0,"News");
*/
?>
    <!-- News Headlines end --> 
 
  </div>
  <!-- END RIGHT COLUMN --> 
  
  <!-- BEGIN LEFT CONTENT AREA --> 
  
  <!-- The Department of Computer Science offers outstanding undergraduate and graduate degree programs with an emphasis on creative problem solving.
<br />
<h3>Why study computer science at CEMS?</h3>
<p>Why study computer science at all? To find out the answers to these questions and more, see our <a href="?Page=welcome/faqs.php&amp;SM=welcome/_welcomemenu.html"><strong>FAQs</strong></a>. Or, if you'd like to learn about some really cool careers in computing, go to <a href="http://computingcareers.acm.org/">ACM Computing Careers</a>.</p>
-->
  
  
 <!-- <p class="home-emphasis"><span class="dkgreen">Prospective students </span> <a href="http://www.uvm.edu/~cems/cs/?Page=welcome/prospectives.php&SM=welcome/_welcomemenu.html">find out more...</a></p>
  <h3><img class="alignright" src="gfx/triptych.jpg" alt="CS research" width="300" height="97" />  
    Academic Programs</h3>
  <ul>
    <li class="inlineList"><a href="?Page=grad/default.php&amp;SM=grad/_gradmenu.html">Graduate</a> | </li>
    <li class="inlineList"><a href="?Page=undergrad/default.php&amp;SM=undergrad/_undergradmenu.html">Undergraduate</a> |</li>
    <li class="inlineList"><a href="?Page=undergrad/minor-cert.php&amp;SM=undergrad/_undergradmenu.html">Minor - Certificate</a></li>
  </ul>-->
  
  <!--
 <br />
<a href="http://www.uvm.edu/~cems/cs/?Page=courses/iCompute-track.php"><img src="gfx/whats-new-top.jpg" alt="Integrative Computing (iCompute) - a new curriculum track" width="260" height="143" border="0" /></a><br />
  <a href="http://www.uvm.edu/~cems/cs/gfx/pdf/UVM-CS_PhDpositions09-10.pdf" target="_blank"><img src="gfx/whats-new-bottom.jpg" alt="PhD Assistantships starting  January 2009" width="260" height="84" border="0" /></a>--> 
  
  <!--  bob changed sept 30 2011

<p class="home-emphasis"><span class="dkgreen">prospective student? </span>  Considering studying Computer Science at UVM? <a href="http://www.uvm.edu/~cems/cs/?Page=welcome/prospectives.php&SM=welcome/_welcomemenu.html">Find out more about us...</a></p> --> 
  
  <!-- New additions Sept 30, 2011 --> 
  <!--==========================================-->
  <!-- <h3 style="margin-top: 0;">CS Today</h3> -->
  <!--==========================================--> 
  
  <!-- <div class="cemsfeature-topline"></div> -->
  
  <div class="feature-cems">
<?php
	// update the category to a group abbreviation for feature stories
	//makeNews( array("category:cemscs","numFull:2","numBasic:0") );	
?>
<center>
<table bgcolor=yellow border=3 bordercolor=red><tr><td>
<input type=button value='See Results of our First Ever CS Fair!' onclick='javascript:window.location="http://www.uvm.edu/~cems/cs/csfair/2013/fairover/home.php";'>
</td></tr></table>
</center>
  <h1 style="margin-top: 0;">Shape the Future! Consider Computing at UVM!</h1>
  <h3 style="margin-top: 0;">Chair's Welcome</h3>
<img style=float:left;margin-left:10px;margin-right:10px; src=gfx/meppstei.jpg height=120 margin'>
This is an amazing time to go into computing, with unprecedented opportunities. Computers are a ubiquitous and
growing presence in all aspects of modern society, and thus there is
<a href=http://www.cems.uvm.edu/~meppstei/CSDemand.jpg target=_blank>huge and increasing demand</a>
for computing professionals that is
<a href=http://www.cems.uvm.edu/~meppstei/CSsupply.jpg target=_blank>far from being met</a>
 by the profile of today's graduates.
This is why unemployment is near zero for Computing Professionals who want to work, and Computing Professionals
earn some of the
<a href=http://www.bls.gov/ooh/computer-and-information-technology/software-developers.htm target=_blank>highest salaries</a> in the U.S. But it's not just the money and jobs that make Computing such an exciting profession - Computing-related careers are some of the most <a href=http://www.bls.gov/ooh/computer-and-information-technology/software-developers.htm#tab-7 target=_blank> versatile</a>, creative, and satisfying career choices you can make, and computational thinking and skills are valuable complements to virtually all other career areas.
<a href=http://www.uvm.edu/~cems/cs/?Page=welcome/default.php&SM=welcome/_welcomemenu.html>More...</a>
  </div>

<h3>Latest CS news</h3>

<?php
makeNews( array("category:cemscs","numBasic:1","startFrom:0") )
?>

<!-- rotate spotlight -->
<? include("spotlight.php") ?>
  
</div>


