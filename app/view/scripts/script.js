function submitReg() {
	document.getElementById("btn-sbmt").innerHTML="<img src='app/view/img/loader.gif' />";
	jQuery.post('system/UserAjax.php', jQuery('#reg-form').serialize(), function(data){
		document.getElementById("formToggler").innerHTML=data;
		document.getElementById("btn-sbmt").innerHTML="<a class='btn' onclick='submitReg();'>Submit</a>";
		if(data==1) {
			$('reg-form').stop().animate(function() {

			})
		}
	});
}