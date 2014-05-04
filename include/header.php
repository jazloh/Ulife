<?php
	//ini_set("display_error",1);
	//error_reporting(1);
	//$SITE_URL = "http://localhost/chlevent";
	$SITE_URL = "http://192.168.254.18/chlevent";
	include("include/connectiondb.php");
	session_start();
	if($_COOKIE['lang'] == '')
	{
		$lang = "en";
		setcookie("lang", "$lang", time()+3600*24*30, "/", "$SITE_URL");
	}
	else
	{
		$lang = $_COOKIE['lang'];
	}
	include("include/lang/lang_$lang.php");
?>
<html>
<head>
<title>CHL Event - <?=$title?></title>
<link href="<?=$SITE_URL?>/css/style.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<?php
	$getBG = mysql_query("SELECT image_name FROM general WHERE type = 'background' LIMIT 1;",$globaldb);
	list($bg_name) = mysql_fetch_row($getBG);
	$selected_style = '<ul class="header_selected_ul">
							<li class="header_selected_li"></li>
							<li class="header_selected_li"></li>
							<li class="header_selected_li"></li>
							<li class="header_selected_li"></li>
							<li class="header_selected_li"></li>
						</ul>';
	
	switch ($selected) {
		case 'main':
			$main = $selected_style;
			$main_float = "style='float:left;'";
			break;

		case 'news':
			$news = $selected_style;
			$news_float = "style='float:left;'";
			break;

		case 'service':
			$service = $selected_style;
			$service_float = "style='float:left;'";
			break;

		case 'about':
			$about = $selected_style;
			$about_float = "style='float:left;'";
			break;

		case 'contact':
			$contact = $selected_style;
			$contact_float = "style='float:left;'";
			break;

		case 'member':
			$member = $selected_style;
			$member_float = "style='float:left;'";
			break;
		
		default:
			$main = $selected_style;
			$main_float = "style='float:left;'";
			break;
	}
?>
<body style="background:url('<?=$SITE_URL?>/image/<?=$bg_name?>') no-repeat center center fixed;background-size:cover;filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='.<?=$SITE_URL?>/image/<?=$bg_name?>', sizingMethod='scale');
-ms-filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=$SITE_URL?>/image/<?=$bg_name?>', sizingMethod='scale');">
	<div id="header">
		<div id="header_container">
			<div class="header_item">
				<?=$main?>
				<a <?=$main_float?> href="<?=$SITE_URL?>"><?=LANG_HOME?></a>
				<?=$main?>
				<div class="clear"></div>
			</div>
			<div class="header_item">
				<?=$news?>
				<a <?=$news_float?> href="<?=$SITE_URL?>/newsfeed.php"><?=LANG_NEWSFEED?></a>
				<?=$news?>
				<div class="clear"></div>
			</div>
			<div class="header_item">
				<?=$service?>
				<a <?=$service_float?> href="<?=$SITE_URL?>/service.php"><?=LANG_SERVICES?></a>
				<?=$service?>
				<div class="clear"></div>
			</div>
			<div class="header_item">
				<?=$about?>
				<a <?=$about_float?> href="<?=$SITE_URL?>/about.php"><?=LANG_ABOUT?></a>
				<?=$about?>
				<div class="clear"></div>
			</div>
			<div class="header_item">
				<?=$contact?>
				<a <?=$contact_float?> href="<?=$SITE_URL?>/contact.php"><?=LANG_CONTACT?></a>
				<?=$contact?>
				<div class="clear"></div>
			</div>
			<div class="header_item">
				<?=$member?>
				<a <?=$member_float?> href="<?=$SITE_URL?>/membership.php"><?=LANG_MEMBERSHIP?></a>
				<?=$member?>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
