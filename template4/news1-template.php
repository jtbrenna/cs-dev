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
<?php
	// update the category to a group abbreviation for feature stories
	makeNews( array("category:ucommall","numFull:1","numBasic:0") );	
?>
</div>
<div id="newssubfeature">
<?php
	// update the category to a group abbreviation for feature stories 
	// update numFull to specify the number of stories of this category to display on the page
	// update mediaWidth to specific the pixel width of images and video on the page
	makeNews( array("category:ucommall","numFull:3","mediaWidth:210","numBasic:0","startFrom:1","videoMethod:2") );	
?>
</div>
</div>
<div id="newslinks">


<div id="newsspecialfeature">

<h4>Nunc justo libero</h4>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque blandit tortor eu lorem tristique vel faucibus lorem tincidunt. Nunc justo libero, mollis nec gravida quis, commodo condimentum leo. Suspendisse urna tortor, bibendum ut semper id, tincidunt a est. Fusce non nulla at diam tristique mattis et a orci.</p>

<h5>Related Links</h5>

<ul>
	<li>Item one</li>
	<li>Item two</li>
	<li>Item three</li>
	<li>Item four</li>
	<li>Item five</li>
</ul>



</div>

</div>
</div>