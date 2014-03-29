<?php
/* this code gradbs the file names from the given folder putting them
 * into an array so that we can choose a random spotlight
 * 
 */
    $alumni = array();
    $url = "http://www.uvm.edu/~rerickso/cmes/profiles/";  
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
    
    include ($alumni[$randomPerson]);
?>
