<script language="JavaScript" src="http://www3.vpt.org/js/popups/vod640x360.js"></script>

<h3>Prospective Students &#150; Think Your Way into the Future</h3>

<h4 class="orange">What is Computer Science?</h4>

<a href="http://www.cems.uvm.edu/research/cems/snow/swe.php"><img src="../gfx/charley_swe.jpg" alt="Snow water equivalent (SWE) monitoring with wireless sensor networks" width="190" height="247" border="0" class="alignright" /></a>

<p>Computer science is not just about building computers, writing computer games or creating other programs.  Computer science is the <strong>science of problem solving</strong>. The computer is just one tool that computer scientists use.</p> 

<h4 class="orange">Why Computer Science?</h4>

<p> Why should you choose computer science? Are you a creative person, interested in the world around you? Do you want to find a great job after college? Read on... </p>

<ul class="spacey">
<li><span class="larger">It's Creative</span> &#151; Apply your imagination and originality to solving problems.</li>
<li><span class="larger">It's Everywhere</span> &#151; <a href=http://www.forbes.com/sites/ciocentral/2012/08/14/why-absolutely-everyone-needs-to-be-software-literate target=_blank>Why absolutely everyone needs to be software literate</a>.</li>

<li><span class="larger">It's Interdisciplinary</span> &#151; <a href=http://chronicle.com/blogs/letters/students-of-all-majors-should-study-computer-science/?cid=megamenu>Students of all majors should study computer science</a>.
Computer science has very strong connections to many other disciplines.  Within our department alone, you'll find yourself working alongside geologists, mathematicians, engineers, psychologists, biologists and ecologists.  We believe students should be well equipped with the theory behind computer science, and be able to apply this to a problem rooted in any field. </li>

<li><span class="larger">Get a Great Job</span> &#151; The Bureau of Labor and Statistics reports that the occupation of computer software engineering is projected to grow the fastest and add the most new jobs over the 2006-16 decade. To learn about hot careers in computer science, check out:

<ul class="prospectives">
<li>A Bay Area Council Economic Institute Report <a href="http://www.bayareaeconomy.org/media/files/pdf/TechReport.pdf" target="_blank">High-Tech Employment and Wages in the United States</a></li>
<li>CNN Money <a href="http://money.cnn.com/magazines/moneymag/best-jobs/2011/fast-growing-jobs/1.html" target="_blank">Fast Growing Jobs</a></li>
<li>ACM's <a href="http://computingcareers.acm.org/" target="_blank">Computing Careers and Degrees</a></li>
<li>CareerCast.com's <a href="http://www.careercast.com/jobs/content/JobsRated_10BestJobs" target="_blank">10 Best Jobs in America Today</a></li>

<!--
<li>CNN's <a href="http://www.cnn.com/2009/LIVING/worklife/04/13/cb.promising.jobs.2009/" target="_blank">Ten Promising Jobs for Class of 2009</a></li>
<li>Computerworld's <a href="http://www.computerworld.com/action/article.do?command=viewArticleBasic&amp;taxonomyName=Management&amp;articleId=330106&amp;taxonomyId=14&amp;pageNumber=1" target="_blank">9 Hottest Skills for '09</a></li>
-->

<li>Computerworld's <a href="http://www.computerworld.com/s/article/358381/9_Hot_Skills_for_2012?source=CTWNLE_nlt_wktop10_2011-09-30" target="_blank">9 Hottest Skills for 2012</a></li>
<li>MSN's <a href="http://msn.careerbuilder.com/Article/MSN-1771-Salaries-and-Promotions-20-Highest-Paying-Jobs/?cbsid=634bac23c58f4730a43dcdfc061121b2-287488417-w6-6&amp;sc_extcmp=JS_1771_msn &amp;categoryid=sp&amp;cbRecursionCnt=2&amp;SiteId=cbmsnch41771&amp;ArticleID=1771" target="_blank">20 Highest-Paying Careers</a></li>
<li>Network World's <a href="http://www.networkworld.com/news/2010/022210-computer-science.html" target="_blank">Want A Job? Get a Computer Science Degree</a></li>
<li>Vermont companies - <a href="http://www.tappingtech.org/" target="_blank">TappingTech.org</a></li>


<!--
<li><a href="http://career-advice.comcast.monster.com/salary-benefits/salary-information/bestpaying-degrees-in-2010-hot-jobs/article.aspx?WT.mc_n=comcast800"  target="_blank">Best paying jobs 2010</a></li></ul>
</li>
-->

<li><a href="http://career-advice.comcast.monster.com/salary-benefits/salary-information/best-and-worst-paying-masters-degrees/article.aspx?WT.mc_n=comcast800"  target="_blank">Best paying jobs 2012</a></li></ul>
</li>


<li><span class="larger">Impact the World</span> &#151; A degree in computer science will give you a foundation in fundamental concepts that can be applied to many problems in our world today.  Transportation, global warming, cancer research, new medical practices and human computer interaction are just a few examples of  research areas that computer scientists are actively involved in. </li>
</ul>
 

<h4>Check Out What CS Alumni Are Doing</h4><p>
<?php
/* this code grabs the file names from the given folder putting them
 * into an array so that we can choose a random spotlight
 * 
 */
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
	echo("<a href=http://www.uvm.edu/~cems/cs/?Page=alumni/browse_alums.php>View other Alums</a>\n");
?>

<h4 class="orange">What We're Doing at the University of Vermont</h4>

<br />
<!--
<h5>Computer Science Student Association</h5>
<p>Are you majoring in Computer Science, or thinking about it?  Join the <a href="http://www.cems.uvm.edu/~cssa/home/">Computer Science Student Association</a>.</p>
-->

<h5>Computer Science Crew</h5>
<p>Are you majoring in Computer Science, or thinking about it?  Join the <a href="http://www.uvm.edu/~cscrew">CS crew</a>.</p>

<h5>Our Faculty in the News</h5>
<p>Our faculty are working on research projects ranging from robots that heal themselves to wirelessly monitoring the amount of water in a snow pack.</p>

<ul>

<li><a href="http://www.uvm.edu/~cems/?Page=news&storyID=12436&category=cems">
Bongard to Receive Presidential Early Career Award
</a></li>
<li><a href="http://www.uvm.edu/~cems/?Page=news&storyID=12287&category=cems">
DARPA MSEE Grant Awarded to CEMS Researchers
</a></li>

<li><a href="http://www.uvm.edu/~cems/?Page=News&storyID=14214">AERO hybrid race car to compete in 2009 international competition</a></li>
<!-- <a href="http://www3.vpt.org/flvs/emergingscience/season2/previews/006-Good-Robot/" onClick="return vod640x360(this, 'vod640x360')" target="_blank"><img class="alignright" src="http://www.uvm.edu/~cems/cs/gfx/bongard-emergingsci.jpg" alt="Vidcast: Josh Bongard talks robotics"  border="0" width="155" height="90" /></a>

<li><a href="http://www3.vpt.org/flvs/emergingscience/season2/previews/006-Good-Robot/" onClick="return vod640x360(this, 'vod640x360')" target="_blank">Vidcast: Josh Bongard talks robotics</a> (a clip from episode 3 of Vermont Public Television's "Emerging Science")</li>
-->

<li><a href="http://www.uvm.edu/~cems/cs/?Page=News&amp;storyID=13087">Christian Skalka receives Air Force Young Investigator Research Award</a></li>
<li><a href="http://www.uvm.edu/~cems/?Page=News&amp;storyID=11950">Josh Bongard and Sean Wang receive national young investigator awards</a></li>
<li><a href="http://www.uvm.edu/~cems/cs/?Page=News&amp;storyID=10739">Xindong Wu accepted as Yangtze River Scholar</a></li>
</ul>
 
<br />

<h5>Our Courses in Action</h5>

<p>
<img class="alignleft" src="../gfx/cs32-maze.jpg" alt="Field trip to the Great Vermont Corn Maze" width="208" height="214" />

<strong>CS32 - Puzzles, Games & Algorithms</strong> &#151; What's the difference between a maze and a labyrinth? How many ways can a Rubik's cube be arranged? What's the real value of a Powerball ticket? Why are puzzles and games fun? You'll discover all this, learn how computers solve puzzles and play games, and more in this introductory computer science course, including a field trip to the Great Vermont Corn Maze.</p>

<p><strong>CS195 - Hands-on Robotics</strong> &#151; In this dynamic class, you'll build a robot using the Lego Mindstorms system. Many technical aspects of robotics, both hardware and software, are explored. But the interpersonal skills required to help complete your team's robot often prove to be equally challenging.</p>

<br />


<p>At our annual Computer Science Research Day a keynote address is given by a world-renowned expert on an emerging topic in computing, followed by a day full of faculty and graduate student presentations that showcase our research activities.  <a href="http://www.uvm.edu/~cems/cs/?Page=research/default.php&amp;SM=research/_researchmenu.html">Check out our previous Research Days</a>.</p>

<!--
<h5>Computer Science and CEMS</h5>
<p>Read the CEMS e-Newsletter, <a href="http://www.relationsmith.com/uvm-cems/jan09/jan09.html">Spire (Winter 2009)</a>, to find out more about the Department of Computer Science and the College as a whole.  Or <a href="http://www.uvm.edu/~cems/?Page=newsevents/newsletter.php&amp;SM=newsevents/_newsmenu.html">see previous issues</a>.</p>
-->

<h4 class="orange">For More Information</h4>
<p>To find out more about our programs or the University of Vermont, contact us at:</p>
<div class="blockquote">
Department of Computer Science<br />
<a href="mailto:Computer.Science@uvm.edu">Computer.Science@uvm.edu</a><br />
(802) 656-3330
</div>
