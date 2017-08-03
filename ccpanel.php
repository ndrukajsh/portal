<!DOCTYPE html>
<html>
<head>
	<title>Project theme | css test</title>
	<style type="text/css">

		body{
			margin: 0px !important;

		}

		.hpanel{
			color: #fff;
			background-color: grey;
			margin: -16px 0px 0px 0px;
			width: 100%;
			height: 50px;
			padding: 20px 0px;
			
		}

		#name{
			float: right;
			padding: 10px 20px;
			margin-right: 100px;
		}

		.hpanel>p:first-child{
			padding: 0px 20px;
			float: left;
			margin-left: 80px;
			font-weight: bold;
			font-size: 20px;
		}

		.menu{
			width: 100%;
			padding-bottom: 40%;
		}


		.admin-panel{
			background-color: #000;
			list-style-type: none;
			color: #fff;
			margin-left: -40px;
			margin-top: 0px;
			width: 17%;
			float: left;
			padding-bottom: 5.5%;
		}

		.admin-panel li{
			text-align: center;
			padding: 5% 0%;
			border-bottom: 2px solid #fff;
			cursor: pointer;
		}

		.menu-btn{
			float: right;
			margin-right: 70px;
			margin-top: -50px;
			width: 20%;
		}

		button{
			text-decoration: none;
			border-radius: 0px;
			padding: 4% 7%;
			border: 2px solid #000;
			background-color: #fff;
			font-weight: bolder;
			outline: none;
			cursor: pointer;
		}

		button:hover{
			box-shadow: 2px 7px 10px #000;
		}

		p.settingShow{
			width: 17%;
			color: #fff;
			background-color: #000;
			display: none;
			text-align: center;
			padding: 0.87% 0%;
			margin-top: -0.5px;
			border-bottom: 2px solid #fff;
			cursor: pointer;
			float: left;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">

	<script src="js/jquery-3.1.1.min.js"></script>

	<script src="js/panel.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$(".settings").click(function(){
				$(".admin-panel").slideUp(500, function(){
					$(".settingShow").css("display", "block");
				});
			});

			$(".settingShow").click(function(){
				$(".settingShow").css("display", "none");
				$(".admin-panel").slideDown(500);
			});
		});
	</script>

</head>
<body>
	<div class="hpanel">
		<p>Paneli i Administrimit</p>
		<p id="name">User here</p>
	</div>

	<div class="menu">	
		<ul class="admin-panel">
			<li class="settings"><i class="fa fa-cog fa-spin" aria-hidden="true"></i> Settings</li>
			<li class="homeAdm"><i class="fa fa-home" aria-hidden="true"></i> Kryefaqja</li>
			<li class="shto"><i class="fa fa-plus-square" aria-hidden="true"></i> Shto Lajm</li>
			<li class="update"><i class="fa fa-spinner fa-spin"></i> Update Lajm</li>
			<li class="fshi"><i class="fa fa-times" aria-hidden="true"></i> Fshi Lajm</li>
			<li class="feedback"><i class="fa fa-eye" aria-hidden="true"></i> Shiko Feedback</li>
			<li class="raportime"><i class="fa fa-eye" aria-hidden="true"></i> Shiko Lajmet e Raportuara</li>
			<li class="my-news"><i class="fa fa-folder-open" aria-hidden="true"></i> Shfaq Lajmet e mia</li>
			<li class="user-list"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Shfaq gjithe perdoruesit</li>
			<li class="add-cc"><i class="fa fa-plus-square" aria-hidden="true"></i> Shto CC</li>
			<li class="adm-list"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Shfaq te gjithe CC/Admin</li>
		</ul>
		<p class="settingShow"><i class="fa fa-caret-down" aria-hidden="true"></i> Settings</p>
		<div class="menaxhim" style="float: right; color: #000; display: inline; border: 1px solid red;">
			
		</div>

	</div>

	<div class="menu-btn">
		<a href="index.php"><button>Shko te faqja e lajmeve</button></a>
		<a href="#"><button>Dilni</button></a>		
	</div>


</body>
</html>