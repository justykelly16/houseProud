$(function() {
  $("#submit_login").click(function() {
	var username = $("input#username").val();
	if (username == "") {
	   $('.errormess').html('Please Insert Your Username');	
       return false;
    }
	var password = $("input#password").val();
	if (password == "") {
	   $('.errormess').html('Please Insert Your Password');	
       return false;
    }
	var dataString = 'username='+ username + '&password=' + password;
	$.ajax({
      type: "POST",
      url: 'login.php',
      data: dataString,
	  dataType: "html",
      success: function(data) {
	  if (data == 0) {
	  $('.errormess').html('Wrong Login Data');
		} else {
			$('.errormess').html('<b style="color:green;">you are logged. wait for redirection</b>');	
			document.location.href = 'private.php';	
		}
      }
     });
    return false;
	});
});