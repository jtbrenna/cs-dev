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
<div id="newsmain">
<!-- MAIN PAGE HEADER & NEWS -->
<h3>Recent Headlines</h3>
<div id="newsmainfeature">
 <?php require_once( "{$_SERVER['UVMMAGIC']}/plugins/news/aggregate_driver.php" ); ?>

<?php
	// update the category to a group abbreviation for feature stories
	makeNews( array("category:cemscs","numFull:1","numBasic:0") );	
?>
</div>
<div id="newssubfeature">
<?php
	// update the category to a group abbreviation for feature stories 
	// update numFull to specify the number of stories of this category to display on the page
	// update mediaWidth to specific the pixel width of images and video on the page
	makeNews( array("category:cemscs","numFull:3","mediaWidth:210","numBasic:0","startFrom:1","videoMethod:2") );	
?>
</div>
</div>
<div id="newslinks">

<div id="newslistfeature">
<h3>More Recent Headlines</h3>
<?php
	// update the category to a group abbreviation for your basic stories 
	// update numFull to specify the number of stories of this category to display on the page
	makeNews( array("category:cemscs","numBasic:10","startFrom:4") )

?>
</div>
</div>
</div>
