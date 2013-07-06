function submitReg() {
	jQuery.post('system/UserAjax.php', jQuery('#reg-form').serialize(), function(data){
		document.getElementById("formToggler").innerHTML=data;
	});
}