$(document).ready(function(){
	$("input[type=text]").focus(function(){
		$("#search-form").css("box-shadow", "3px 1px 10px #888888");
	});
});


$(document).ready(function(){
	$("#search").click(function(){
		$(this).css("outline", "none");
	});
});


$(document).ready(function(){
	$("#loginButton").click(function(){
		$(".slide").css("opacity", "0.2");
	});
});


$(document).ready(function(){
	$("#registerButton").click(function(){
		$(".slide").css("opacity", "0.2");
	});
});


$(document).ready(function(){
	$(".m").click(function(){
		$(".slide").css("opacity", "1");
	});
});

$(document).ready(function(){
	$("#kliko").click(function(){
		$(this).hide(200, function(){
			$(".rekl").css("transform", "rotate(360deg)");
		});
	});
});

$(document).ready(function(){
	$.post("../framework/faqosja.php", {page : 1}, function(result) {
				$(".news").html(result);
			});
});

$(document).ready(function(){
	var numri = 1;

	$(".faqosja li:last").click(function(){

		$(document).ajaxStart(function(){
			$(".news").html('<i class="fa fa-spinner fa-spin" aria-hidden="true" style="font-size: 80px; margin-left: 40%;"></i>');
		});

		
		var fundi = parseInt($("#nrTot").html());

		if (numri < fundi) {
			$(".faqosja li").eq(numri).removeClass("active");
			numri++;
			$(".faqosja li").eq(numri).addClass("active");
			
			$.post("../framework/faqosja.php", {page: numri}, function(result) {
				$(".news").html(result);
			});
		}

	});

	$(".faqosja li:first").click(function(){

		$(document).ajaxStart(function(){
			$(".news").html('<i class="fa fa-spinner fa-spin" aria-hidden="true" style="font-size: 80px; margin-left: 40%; margin-top: 30%;"></i>');
		});

		if (numri > 1) {
			$(".faqosja li").eq(numri).removeClass("active");
			numri = numri - 1;
			$(".faqosja li").eq(numri).addClass("active");

			$.post("../framework/faqosja.php", {page: numri}, function(result) {
				$(".news").html(result);
			});
		}


	});

	$(".faqosja li.nr").click(function(event){

		$(document).ajaxStart(function(){
			$(".news").html('<i class="fa fa-spinner fa-spin" aria-hidden="true" style="font-size: 80px; margin-left: 40%;"></i>');
		});

		numri = parseInt(event.target.innerHTML);
		$(".faqosja li.active").removeClass("active");
		$(this).addClass("active");

		$.post("../framework/faqosja.php", {page: numri}, function(result) {
			$(".news").html(result);
		});

	});
	
});


$(document).ready(function(){
	$(".subscibe").click(function(){
		var s_email = prompt();
		alert(s_email);
		//kjo mbetet per tu pare!!!
	});
});
