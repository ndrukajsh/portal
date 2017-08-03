$(document).ready(function(){
	$("#login-btn").click(function(){
		var emri = $(".username").val();
		var pass = $(".password").val();
		
		if (emri.length == 0 || pass.length == 0){
			$("#log_mesazh").html("<strong style='color: red; text-align: center;'>Plotesoni te gjitha fushat!!</strong>");
		}else{
			$.post("../framework/login.php", {username : emri , password : pass}, function(result) {
				if (result == true) {
					window.location = "../framework/user.php";
				}else{
					$("#log_mesazh").html("<strong style='color: red; text-align: center;'>"+result+"</b>");
				}
				
			});
		}

	});
});


$(document).ready(function(){
	$(".register_btn").click(function(){
		var user_n = $(".r_username").val();
		var user_email = $(".r_email").val();
		var user_pass = $(".r_password").val();
		var user_conf_pass = $(".r_conf_pass").val();
		
		if (user_n.length == 0 || user_email.length == 0 || user_pass.length == 0 || user_conf_pass.length == 0){
			$("#reg_mesazh").html("<strong style='color: red; text-align: center;'>Plotesoni te gjitha fushat!!</strong>");
		}else if(user_pass != user_conf_pass){
			$("#reg_mesazh").html("<strong style='color: red; text-align: center;'>Fjalekalimet nuk perputhen!!</strong>");
		}else if (user_pass.length < 6) {
			$("#reg_mesazh").html("<strong style='color: red; text-align: center;'>Fjalekalimi duhet te permbaje me teper se 6 karaktere!!</strong>");
		}else{
			$.post("../framework/register.php", {new_user : user_n , n_email : user_email, n_pass: user_pass}, function(result) {
				if (result == false) {
					$("#reg_mesazh").html("<strong style='color: red; text-align: center;'>Emri qe keni futur tashme ekziston!!!</b>");
				}else{
					$("#reg_mesazh").html("<strong style='color: green; text-align: center;'>Regjistrimi u be me sukses!!!</b>");
					$(".r_username").prop("readonly", true);
					$(".r_username").css("background-color", "#e6e6e6");
					$(".r_email").prop("readonly", true);
					$(".r_email").css("background-color", "#e6e6e6");
					$(".r_password").prop("readonly", true);
					$(".r_password").css("background-color", "#e6e6e6");
					$(".r_conf_pass").prop("readonly", true);
					$(".r_conf_pass").css("background-color", "#e6e6e6");
				}
				
			});
		}

	});
});


$(document).ready(function(){
	$(".search").on('input', function(){
		var input = $(".search").val();
		var len = input.length;

		if (len == 0) {
			$(".s_result").html('');
		}
		if (len != 0) {
			$.post("../framework/search.php", {s_val : input, l : len}, function(result) {
				if (result == false) {
					$(".s_result").html("<p class='stili' >Nuk ka rezultate!</p>");
				}else{
					$(".s_result").html("<p class='stili' >"+result+"</p>");
				}
				
			})
		}
	})
});