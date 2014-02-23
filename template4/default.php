<!-- Be sure not to change the below php code -->
<?php require_once( "{$_SERVER['UVMMAGIC']}/plugins/news/aggregate_driver.php" ); ?>

<!-- see additional documentation at: http://www.uvm.edu/webguide/templateguide/?Page=additional/news.html&SM=additional/additionalmenu.html -->
<div id="container">
<div id="content">
<h3>Intro heading/paragraph</h3>
<div id="intro">
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
</div>
<p class="photobar"><img src="images/generic140-140.jpg" alt="" width="140" height="140" /> <img src="images/generic140-140.jpg" alt="" width="140" height="140" /> <img src="images/generic140-140.jpg" alt="" width="140" height="140" /></p>

<h4>Excepteur sint</h4>
<p>Occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem <a href="">sequi nesciunt</a>.</p>
<p><a href="">Read more </a></p>
</div>

<!-- close#content -->
<div id="sidebar">
<div class="homepage_feature">
<h3>Featured Video</h3>
<div id="video1" class="video-container">
<iframe src="http://www.youtube.com/embed/BQR5v3D7pgI" frameborder="0" allowfullscreen></iframe>
</div>
<p><a href="">Read the video's transcript</a>.</p>
</div>
                
<div id="news_section">
<h4>News &amp; Events</h4>

<!-- set news category (short group name) here -->
<?php makeNews( array("category:ucommall","numBasic:5","basicRSS:0") ); ?>

</div>
</div><!-- close#sidebar -->
<div class="clear-fix"></div>
</div><!-- close#container -->

