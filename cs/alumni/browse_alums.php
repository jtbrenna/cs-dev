<h1>UVM Computer Science Alumni and Alumnae</h1>
<p>
<a href=http://www.uvm.edu/~cems/cs/?Page=alumni.html>Alumni, please send us YOUR story!</a>.
<p>
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
	
	if ($var!="") {
		preg_match_all ("/a[\s]+[^>]*?href[\s]?=[\s\"\']+".
						"(.*?)[\"\']+.*?>"."([^<]+|.*?)?<\/a>/", 
						$var, &$matches);

		$matches = $matches[1];
		$list = array();

		foreach($matches as $var) {
			$ext = pathinfo($var, PATHINFO_EXTENSION);
			$firstLetter=substr($var,0,2);
			$lastLetter=substr($var, -1);
			$fileType=substr($var, -3);
			//exclude these file names and folders
			if (!($firstLetter == "?C" || $firstLetter == "/~" || $fileType == "php" || $lastLetter == "/" )) {
				$alumni[] = $var;
				$includefile = $url . "/" . $var;

				include($includefile);
				echo ("<hr>\n");
				}
			}
		}

?>

