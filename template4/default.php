<!-- Be sure not to change the below php code -->
<?php require_once( "{$_SERVER['UVMMAGIC']}/plugins/news/aggregate_driver.php" ); ?>

<!-- see additional documentation at: http://www.uvm.edu/webguide/templateguide/?Page=additional/news.html&SM=additional/additionalmenu.html -->
<div id="container">
<div id="content">
<h2>Shape the Future! Consider Computing at UVM!</h2>
<h3 style="margin-top: 0;">Chair's Welcome</h3>
<div id="intro">
<img style="float:left;margin-left:10px;margin-right:10px;" src="gfx/meppstei.jpg" height=120>
<p>This is an amazing time to go into computing, with unprecedented opportunities. Computers are a ubiquitous and
growing presence in all aspects of modern society, and thus there is
<a href=http://www.cems.uvm.edu/~meppstei/CSDemand.jpg target=_blank>huge and increasing demand</a>
for computing professionals that is
<a href=http://www.cems.uvm.edu/~meppstei/CSsupply.jpg target=_blank>far from being met</a>
 by the profile of today's graduates.
This is why unemployment is near zero for Computing Professionals who want to work, and Computing Professionals
earn some of the
<a href=http://www.bls.gov/ooh/computer-and-information-technology/software-developers.htm target=_blank>highest salaries</a> in the U.S. But it's not just the money and jobs that make Computing such an exciting profession - Computing-related careers are some of the most <a href=http://www.bls.gov/ooh/computer-and-information-technology/software-developers.htm#tab-7 target=_blank> versatile</a>, creative, and satisfying career choices you can make, and computational thinking and skills are valuable complements to virtually all other career areas.</p>
<a href=http://www.uvm.edu/~cems/cs/?Page=welcome/default.php&SM=welcome/_welcomemenu.html>More...</a>
</div>

<!-- rotate spotlight -->
<? include("spotlight.php") ?>
</div>

<!-- close#content -->
<div id="sidebar">
<div class="homepage_feature">

<h4>CS Intern Spotlight</h4><br/>
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

echo("<p><hr><p><h4>Alumni Spotlight</h4><br/>\n");
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
</div>
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
    <div id="newslistfeature"> <h4>Headlines</h4>
      <?php

    require_once( "{$_SERVER['UVMMAGIC']}/plugins/news/aggregate_driver.php" );  // DO NOT CHANGE!!! 
    // see additional documentation at: http://www.uvm.edu/webguide/templateguide/?Page=additional/news.html&SM=additional/additionalmenu.html

    // update the category to a group abbreviation for your basic stories 
    // update numFull to specify the number of stories of this category to display on the page
    makeNews( array("category:cemscs","numBasic:4","startFrom:1") )

?>
</div><!-- close#sidebar -->
<div class="clear-fix"></div>
</div><!-- close#container -->

