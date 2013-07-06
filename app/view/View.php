<?php

class View {

	public function get_header() {
		require('header.php');
	}

	public function get_player() {
		?>
		<script>
			$(document).ready(function(){
				// $("#jp-player").jPlayer({
				//     ready: function (event) {
				//       $(this).jPlayer(
				//       	"setMedia", {
				// 			mp3: "app/uploads/mp.mp3"
				// 		});
				//     },
				//     //swfPath: "http://cloudfactory-transcription.s3.amazonaws.com/javascripts/",
				//     swfPath: "http://www.jplayer.org/latest/js/Jplayer.swf",
				//     supplied: "mp3",
				//     volume: 1,
				//     wmode:"window",
				//     solution: "html,flash",
				// 	smoothPlayBar: true,
				// 	keyEnabled: true
				// });

			var myPlaylist = new jPlayerPlaylist({
				jPlayer: "#jquery_jplayer_N",
				cssSelectorAncestor: "#jp_container_N"
			}, [
				{
					title:"Cro Magnon Man",
					artist:"The Stark Palace",
					mp3:"http://www.jplayer.org/audio/mp3/TSP-01-Cro_magnon_man.mp3",
					oga:"http://www.jplayer.org/audio/ogg/TSP-01-Cro_magnon_man.ogg"
				}
			], {
				playlistOptions: {
					enableRemoveControls: true
				},

				    swfPath: "http://www.jplayer.org/latest/js/Jplayer.swf",
				    supplied: "oga",
				    volume: 1,
				    wmode:"window",
				    solution: "html,flash",
					smoothPlayBar: true,
					keyEnabled: true,
				// swfPath: "http://www.jplayer.org/latest/js/Jplayer.swf",
				// supplied: "mp3",
				// smoothPlayBar: true,
				// solution: "html,flash",
				// keyEnabled: true,
				audioFullScreen: true
				// wmode: "window"
			});


			myPlaylist.setPlaylist([
				{
					title:"Runaway Baby",
					artist:"Bruno Mars",
					oga: "app/uploads/audio/out.ogg"
				},
				{
					title:"Your Face",
					artist:"The Stark Palace",
					oga:"http://www.jplayer.org/audio/ogg/TSP-05-Your_face.ogg"
				},
				{
					title:"Hidden",
					artist:"Miaow",
					free: true,
					oga:"http://www.jplayer.org/audio/ogg/Miaow-02-Hidden.ogg"
				},
				{
					title:"Cyber Sonnet",
					artist:"The Stark Palace",
					oga:"http://www.jplayer.org/audio/ogg/TSP-07-Cybersonnet.ogg",
					poster: "http://www.jplayer.org/audio/poster/The_Stark_Palace_640x360.png"
				},
				{
					title:"Tempered Song",
					artist:"Miaow",
					oga:"http://www.jplayer.org/audio/ogg/Miaow-01-Tempered-song.ogg"
				},
				{
					title:"Lentement",
					artist:"Miaow",
					oga:"http://www.jplayer.org/audio/ogg/Miaow-03-Lentement.ogg"
				}
			]);
		
		$("#bb_item_1").click(function() {
			myPlaylist.play(0);
		}); 

		$("#bb_item_2").click(function() {
			myPlaylist.play(1);
		}); 

		$("#bb_item_3").click(function() {
			myPlaylist.play(2);
		}); 

		$("#bb_item_4").click(function() {
			myPlaylist.play(3);
		}); 

		$("#bb_item_5").click(function() {
			myPlaylist.play(4);
		}); 

		});
		
		var activeForm = 1;
		function toggleRegForms() {
			var fout;
			var fin;
			var aToggler;
			switch(activeForm) {
				case 1: fout = '#login-form'; fin = '#reg-form'; 
						aToggler = "Already have an account?"; 
						activeForm = 2;
						break;
				case 2: fout = '#reg-form'; fin = '#login-form'; 
						aToggler = "Not a member yet?";
						activeForm = 1;
						break;
			}
			$(fout).fadeToggle("fast","linear", function() {
				$(fin).fadeToggle("fast","linear");
				document.getElementById('formToggler').innerHTML=aToggler;
			});
		}

		</script>
		<?php
	}

	public function get_home_url() {
		return Controller::get_home_url();
	}

	public function get_signup_view() {
		?>
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Sign Up</h3>
			</div>
			<div class="modal-body">
				<?php $this->get_signup_form(); ?>
			</div>
			<div class="modal-footer">
		    	<a href='javascript:;' onclick='toggleRegForms();' id='formToggler'>Not a member yet?</a>
			</div>
		</div>
		<?php 
	}

	public function get_signup_form() {
		?> 
		<form class="form-horizontal" id='login-form' style='display:block;'>
		    <div class="control-group">
			    <label class="control-label" for="inputEmail">Email</label>
			    <div class="controls">
			    	<input type="text" id="inputEmail" placeholder="Email">
			    </div>
		    </div>
		    <div class="control-group">
			    <label class="control-label" for="inputPassword">Password</label>
			    <div class="controls">
			    	<input type="password" id="inputPassword" placeholder="Password">
			    </div>
		    </div>
		    <div class="control-group">
			    <div class="controls">
				    <label class="checkbox">
				    <input type="checkbox"> Remember me
				    </label>
				    <button type="submit" class="btn">Sign in</button>
			    </div>
		    </div>
	    </form>

	    <form class="form-horizontal" id='reg-form' style='display:none;' method='post'>
		    <div class="control-group">
			    <label class="control-label" for="fname">First Name</label>
			    <div class="controls">
			    	<input type="text" id="fname" name="fname" placeholder="first name">
			    </div>
		    </div>
		    <div class="control-group">
			    <label class="control-label" for="lname">Last Name</label>
			    <div class="controls">
			    	<input type="text" id="lname" name="lname" placeholder="last name">
			    </div>
		    </div>
		    <div class="control-group">
			    <label class="control-label" for="lname">Profile Name</label>
			    <div class="controls">
			    	<input type="text" id="pname" name='pname' placeholder="profile name">
			    </div>
		    </div>
		    <div class="control-group">
			    <label class="control-label" for="inputEmail">Email</label>
			    <div class="controls">
			    	<input type="text" id="inputEmail" name='email' placeholder="Email">
			    </div>
		    </div>
		    <div class="control-group">
			    <label class="control-label" for="inputPassword">Password</label>
			    <div class="controls">
			    	<input type="password" id="inputPassword" name='pword' placeholder="Password">
			    </div>
		    </div>
		    <div class="control-group">
			    <label class="control-label" for="confPassword">Re-enter Password</label>
			    <div class="controls">
			    	<input type="password" id="confPassword" placeholder="Password">
			    </div>
		    </div>
		    <div class="control-group">
				    <div class="controls">
					    <a class="btn" onclick='submitReg();'>Submit</a>
				    </div>
			</div>	
		    <input type='hidden' name='action' value='regUser' />
	    </form>	

		<?php 
	}

}