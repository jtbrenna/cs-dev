<head>
<style>
	#uvmsupplinks {display:none;}
</style>
</head>
<?php
	require_once( "{$_SERVER['UVMMAGIC']}/plugins/news/aggregate_driver.php" );  // DO NOT CHANGE!!! 
	// see additional documentation at: http://www.uvm.edu/webguide/templateguide/?Page=additional/news.html&SM=additional/additionalmenu.html
?>
<div id="newsaggregate">
<!-- MAIN PAGE HEADER & NEWS -->
<div id="newsmain2">
<h3>News & Events</h3>
<div id="newsmainfeature">
<?php
	// update the category to a group abbreviation for feature stories 
	makeNews( array("category:ucommfeature","numFull:1","numBasic:0") );	
?>
</div>
</div>
<div id="newslinks2">
<div id="newssubfeature">
<?php
	// update the category to a group abbreviation for feature stories 
	// update numFull to specify the number of stories of this category to display on the page
	// update mediaWidth to specific the pixel width of images and video on the page
	makeNews( array("category:ucommall","numFull:3","mediaWidth:210","numBasic:0","startFrom:1") );
?>
</div>
<div id="newslistfeature">
<h4>More Recent Headlines</h4>
<?php
	// update the category to a group abbreviation for feature stories 
	// update numFull to specify the number of stories of this category to display on the page
	makeNews( array("category:ucommall","numBasic:5","startFrom:4") );
?>
</div>
</div>
</div>