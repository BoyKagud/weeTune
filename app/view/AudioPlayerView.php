<?php

class AudioPlayerView {

	public function __construct() {

	}

	public function __construct($audID) {
		// construct player for $audID
		$audioName = "audioElement".$audID;
		?>
		<script>
			var <?php echo $audioName; ?> = document.createElement('audio');
			<?php echo $audioName; ?>.setAttribute('src', <?php echo $audSrc; ?>);
			<?php echo $audioName; ?>.load()
			<?php echo $audioName; ?>.addEventListener("load", function() { 
			  <?php echo $audioName; ?>.play(); 
			  $(".duration span").html(<?php echo $audioName; ?>.duration);
			  $(".filename span").html(<?php echo $audioName; ?>.src);
			}, true);
		</script>
		<?php
	}

}

$view = new 