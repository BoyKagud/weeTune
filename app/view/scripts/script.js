function submitReg() {
	// check for blank fields
	if(jQuery('#fname').val()=="" || jQuery('#lname').val()=="" || jQuery('#pname').val()=="" || jQuery('#email').val()=="" || jQuery('#pword').val()=="" || jQuery('#confPassword').val()=="") {
		document.getElementById('err_span').innerHTML="All fields are required";
	} else if(jQuery('#inputEmail').val()!=jQuery('#inputEmail2').val()) {
		alert(jQuery('#inputEmail').val());
		document.getElementById('err_span').innerHTML="Email addresses do not match";
	} else if(jQuery('#inputPassword').val()!=jQuery('#inputPassword2').val()) {
		document.getElementById('err_span').innerHTML="Passwords do not match";
	} else {
		document.getElementById("btn-sbmt").innerHTML="<img src='app/view/img/loader.gif' />";
		jQuery.post('system/UserAjax.php', jQuery('#reg-form').serialize(), function(data){
			document.getElementById("formToggler").innerHTML=data;
			document.getElementById("btn-sbmt").innerHTML="<a class='btn' onclick='submitReg();'>Submit</a>";
			if(data==1) {
				document.getElementById('reg-form').innerHTML="Thank You for Signing Up! A link has been sent to your Email to activate your account.";
			}
		});
	}
}