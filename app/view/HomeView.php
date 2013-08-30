<?php

class HomeView extends View {
	
	function __construct() {
		$this->get_header();
		$this->body();
		// $this->get_footer();
	}

	private function body() {
		?>
		<!-- <div id='sep_head_homeBody'></div> -->
		<div id='home_content_div'>
 			<div id='home_billboard_bg'>
 				<div id='bb_viewport'>
					<div id='billboard_div'>
						<!-- call function get_top_sellers() -->
						<div id='bb_item_1' class='billboard_item' style='background: url("app/uploads/images/finpot.png");'>
							<div class="item_op">
								<a href="#"><div class="item_op_play"></div></a>
							</div>
						</div>
						<div id='bb_item_2' class='billboard_item' style='background: url("app/uploads/images/qwerty01.png");'>
							<div class="item_op">
								<a href="#"><div class="item_op_play"></div></a>
							</div>
						</div>
						<div id='bb_item_3' class='billboard_item' style='background: url("app/uploads/images/hopia.png");'>
							<div class="item_op">
								<a href="#"><div class="item_op_play"></div></a>
							</div>
						</div>
						<div id='bb_item_4' class='billboard_item' style='background: url("app/uploads/images/poiuy02.png");'>
							<div class="item_op">
								<a href="#"><div class="item_op_play"></div></a>
							</div>
						</div>
						<div id='bb_item_5' class='billboard_item' style='background: url("app/uploads/images/asdfg03.png");'>
							<div class="item_op">
								<a href="#"><div class="item_op_play"></div></a>
							</div>
						</div>
					</div>
				</div>
				<div class='billboard_arrow' id='bb_arrow_left'></div>
				<div class='billboard_arrow' id='bb_arrow_right'></div>

				<script>
					$('#bb_arrow_left').click(function() {
						// alert('asdf');
						$('#billboard_div').stop().animate({
							marginLeft: '+=200px'
						}, 500);
					});
					$('#bb_arrow_right').click(function() {
						// alert('asdf');
						$('#billboard_div').stop().animate({
							marginLeft: '-=200px'
						}, "fast");
					});
					$('.item_op').mouseenter(function() {
						$(this).stop().animate({
							opacity: "1"
						}, 500);
					});
					$('.item_op').mouseleave(function() {
						$(this).stop().animate({
							opacity: "0"
						}, 500);
					});
				</script>

			</div>

			<div id='billboard_footer_bg'>
<!-- 
				<div id="jp_container_1" class="jp-audio">
					<div class="jp-type-single" id='mp3_player'>
						<div class="jp-gui jp-interface">
							<ul class="jp-controls">
								<li></li>
								<li><a href='javascript:;' tabindex='1' class='jp-controls jp-previous'></a></li>
								<li><a href='javascript:;' tabindex='1' class='jp-controls jp-play'></a></li>
								<li><a href='javascript:;' tabindex='1' class='jp-controls jp-next'></a></li>
							</ul>
							<div class="jp-progress">
								<div class="jp-seek-bar">
									<div class="jp-play-bar" ></div>
								</div>
							</div>
							<div class="jp-time-holder">
								<div class="jp-current-time"></div>
								<div class="jp-duration"></div>
							</div>
						</div>
						<div class='jp-title' id='audio_label'>
							<ul>
								<li></li>
							</ul>
						</div>
					</div>
					<div class='jp-player' id='jp-player'></div>
				</div> -->


				<div id="jp_container_N" class="jp-video jp-video-270p">
					<div class="jp-type-playlist">
						<div id="jquery_jplayer_N" class="jp-jplayer"></div>
						<div class="jp-gui">
							<div class="jp-interface" id='mp3_player'>
								<div class="jp-progress">
									<div class="jp-seek-bar">
										<div class="jp-play-bar"></div>
									</div>
								</div>
								<div id='time-holder'>
									<div class="jp-current-time"></div><span>/</span>
									<div class="jp-duration"></div>
								</div>
								<div class="jp-controls-holder" id='controls-wrap'>
									<ul class="jp-controls">
										<li><a href="javascript:;" class="jp-controls jp-previous" tabindex="1"></a></li>
										<li><a href="javascript:;" class="jp-controls jp-play" tabindex="1"></a></li>
										<li><a href="javascript:;" class="jp-controls jp-pause" tabindex="1"></a></li>
										<li><a href="javascript:;" class="jp-controls jp-next" tabindex="1"></a></li>
									</ul>
								</div>
								<div class="jp-title">
									<ul>
										<li></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="jp-playlist" style='display: none;'>
							<ul>
								<!-- The method Playlist.displayPlaylist() uses this unordered list -->
								<li></li>
							</ul>
						</div>
					</div>
				</div>

			</div> 


			<div class='content_wrap'>
				<div id='lastest_news_div'>
					<div class='widget_header latest_news_header'>Latest News</div>
				</div>				
				<div class='sidebar'>
					<div class='sidebar_widget_item'>
						<div class='widget_header'></div>
					</div>
				</div>
			</div>
		</div>

		<?php
	}

	private function get_top_sellers() {
		HomeCont::get_top_sellers();
	}

}