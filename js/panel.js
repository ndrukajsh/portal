$(document).ready(function(){
	$(".menaxhim").load("adm_panel/admin_home.php");

	$(document).ajaxStart(function(){
		$(".menaxhim").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
	});

	$(".homeAdm").click(function(){
		$(".menaxhim").load("adm_panel/admin_home.php");
	});

});

$(document).ready(function(){

	$(document).ajaxStart(function(){
			$(".menaxhim").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
		});

	$(".shto").click(function(){
		$(".menaxhim").load("adm_panel/shto_lajm.php");
	});
});

$(document).ready(function(){

	$(document).ajaxStart(function(){
			$(".menaxhim").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
		});

	$(".update").click(function(){
		$(".menaxhim").load("adm_panel/update_lajm.php");
	});
});

$(document).ready(function(){

	$(document).ajaxStart(function(){
			$(".menaxhim").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
		});


	$(".fshi").click(function(){
		$(".menaxhim").load("adm_panel/fshi_lajm.php");
	});
});

$(document).ready(function(){

	$(document).ajaxStart(function(){
			$(".menaxhim").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
		});

	$(".feedback").click(function(){
		$(".menaxhim").load("adm_panel/feedback.php");
	});
});

$(document).ready(function(){

	$(document).ajaxStart(function(){
		$(".menaxhim").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
	});

	$(".raportime").click(function(){
		$(".menaxhim").load("adm_panel/raportime.php");
	});
});

$(document).ready(function(){

	$(document).ajaxStart(function(){
		$(".menaxhim").html('<i class="fa fa-spinner fa-spin" aria-hidden="true" style="width: 200px; height: 200px; margin-right: 300px;"></i>');
	});

	$(".my-news").click(function(){
		$(".menaxhim").load("adm_panel/my-news.php");
	});

});

$(document).ready(function(){

	$(document).ajaxStart(function(){
			$(".menaxhim").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
		});

	$(".user-list").click(function(){
		$(".menaxhim").load("adm_panel/user-list.php");
	});
});

$(document).ready(function(){

	$(document).ajaxStart(function(){
			$(".menaxhim").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
		});

	$(".add-cc").click(function(){
		$(".menaxhim").load("adm_panel/add_cc.php");
	});
});

$(document).ready(function(){

	$(document).ajaxStart(function(){
			$(".menaxhim").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
		});

	$(".adm-list").click(function(){
		$(".menaxhim").load("adm_panel/adm-list.php");
	});
});
