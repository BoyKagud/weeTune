<?php
/*
** HEADER
**
*/
?>
<!DOCTYPE html>
<html>
<head>
	<link href="app/view/scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="app/view/css/style.css" rel="stylesheet" type="text/css">
	<!-- <link href="app/view/jQuery.jPlayer.2.4.0.demos/skin/blue.monday/jplayer.blue.monday.css" rel="stylesheet" type="text/css" /> -->
	<script src='app/view/scripts/jquery-1.8.3.min.js'></script>
	<script src='app/view/scripts/easing.js'></script>
	<script src='app/view/scripts/script.js'></script>
	<script src='app/view/scripts/bootstrap/js/bootstrap.min.js'></script>
	<script type="text/javascript" src="app/view/jQuery.jPlayer.2.4.0.demos/js/jquery.jplayer.min.js"></script>
	<script type="text/javascript" src="app/view/jQuery.jPlayer.2.4.0.demos/js/jplayer.playlist.min.js"></script>
 	<?php $this->get_player(); ?>
</head>

<?php $this->get_signup_view(); ?>
<div id='header_bg'>

	<div id='header_div'>
		<div id='header_group_top'>
			<a href='<?php echo $this->get_home_url(); ?>'><div id='header-logo'></div></a>
			<div id='cart_controls_div'>
				<div class='profile_dd_handle'>
					
					<div class="dropdown">
						<i class='icon-user icon-white'></i>
						<span class="dropdown-toggle" data-toggle="dropdown">profile</span>
						<i class='icon-shopping-cart icon-white'></i>
						<span id='cart_content'>0</span>
						<span>items</span>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
							<li>Dashboard</li>
							<li>Account Settings</li>
						</ul>
					</div>

					
				</div>
				<!-- <div id='social_buttons'></div> -->
				<!-- <div id='wishlist_div'>Wish<br/>List</div> -->
			</div>
		</div>
		<!-- <div class='clear' style='width:200px;'></div> -->
		<nav>
			<ul>
				<li><a href='<?php echo $this->get_home_url(); ?>/artists'>artists</a></li>
				<li><a href='<?php echo $this->get_home_url(); ?>/songs'>songs</a></li>
				<li><a href='<?php echo $this->get_home_url(); ?>/albums'>albums</a></li>
				<li><a href='#'>News</a></li>
				<li><a href='#'>Events</a></li>
				<li><a href="#myModal" data-toggle="modal">sign up</a></li>
			</ul>
		</nav>
		<!-- <div id='search_div'>
			<input id='searchbox' placeholder='Search' type='text' />
		</div> -->
	

	</div>
</div>