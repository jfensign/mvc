<?php App::load()->view('publicHeader.inc.php', NULL, TRUE);?>

<div id="site_content">
	<div id="sidebar_container">
	   <?php App::load()->view($sidebarLeft, NULL, TRUE);?>
	</div>
	
	<div id="ca-container" class="ca-container">
	  <div class="ca-wrapper">
				
		<div class="ca-item ca-item-1">
			<div class="ca-item-main">
			  <h3 class="ca-item-header">Hello</h3>
			  <p>My name is Joseph. I'm a self-taught web-based software engineer specializing in open-source solutions. My skills cover everything from hand-coding standards compliant HTML to planning, developing and launching custom backend solutions/architectures.</p>
			</div>
		</div>
					
		<div class="ca-item ca-item-2">
			<div class="ca-item-main">
			  <h3 class="ca-item-header">About The Site</h3>
			  <p>This site serves as my personal sandbox, portfolio and all around dashboard. Everything was written from scratch and built on top of my MVC framework.</p>
			</div>
		</div>
					
		<div class="ca-item ca-item-3">
			<div class="ca-item-main">
			  <h3 class="ca-item-header">Fork Me On Github</h3>
			  <p>I've recently transitioned away from SVN.</p>
			 </div>
		</div>
					
		<div class="ca-item ca-item-8">
			<div class="ca-item-main">
			  <h3 class="ca-item-header">something something somthing else</h3>
			</div>
		</div>
		
	  </div><!--End ca-wrapper-->
     </div><!--End ca-container-->
</div><!--End site-content-->
			
	
		<script type="text/javascript" src="<?php echo SCRIPTS_PATH . 'carousel/js/jquery.easing.1.3.js';?>"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="<?php echo SCRIPTS_PATH . 'carousel/js/jquery.mousewheel.js';?>"></script>
		<script type="text/javascript" src="<?php echo SCRIPTS_PATH . 'carousel/js/jquery.contentcarousel.js';?>"></script>
		<script type="text/javascript">
			$('#ca-container').contentcarousel();
		</script>
<?php App::load()->view('publicFooter.inc.php', NULL, TRUE);?>