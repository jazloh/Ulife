<?php
	$title = "Main Page";
	$selected = "main";
	include("include/header.php");
?>
<div class="main_wrapper">
	<div class="main_itembox">
		<div class="itembox_header">
			<ul class="itembox_header_selected_ul">
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
			</ul>
			<a class="noborder left" href="<?=$SITE_URL?>/newsfeed.php">
				<div class="itembox_header_title">
					<?=LANG_NEWSFEED?>&nbsp;&nbsp; >
				</div>
			</a>
			<div class="clear"></div>
		</div>
		<div class="itembox_container">
			<div class="itembox_container_title">
				<?=LANG_UPCOMINGEVENT?>
			</div>
			<div class="itembox_container_details">
				<?php
					$currentDate = date('Y-m-d');
					$getLatestNewsFeed = mysql_query("SELECT id,event_title, event_date FROM newsfeed WHERE event_date > '$currentDate' ORDER BY event_date ASC LIMIT 4;",$globaldb);
					while(list($event_id,$event_title,$event_date) = mysql_fetch_row($getLatestNewsFeed))
					{
						$month = date("m", strtotime($event_date));
						$date_no = date("d", strtotime($event_date));
						$stringMonth = date("M", mktime(0, 0, 0, $month));
						if(strlen($event_title) > 18)
						{
							$event_title = substr($event_title, 0, 18).'...';
						}
							
				?>
					<a class="noborder" href="<?=$SITE_URL?>/event.php?id=<?=$event_id?>">
						<div class="upcoming_item">
							<span>&#8226;</span> <?=$stringMonth?>&nbsp;<?=$date_no?>&nbsp;&nbsp;<?=$event_title?>
						</div>
					</a>
				<?php
					}
				?>
			</div>
		</div>
	</div>

	<div class="main_itembox">
		<div class="itembox_header">
			<ul class="itembox_header_selected_ul">
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
			</ul>
			<a class="noborder left" href="<?=$SITE_URL?>/service.php">
				<div class="itembox_header_title">
					<?=LANG_SERVICES?>&nbsp;&nbsp; >
				</div>
			</a>
			<div class="clear"></div>
		</div>
		<div class="itembox_container">
			<?php
				$getLatestServices = mysql_query("SELECT id,service_title,image_name FROM services ORDER BY id DESC LIMIT 3;",$globaldb);
				while(list($service_id,$service_title,$service_img) = mysql_fetch_row($getLatestServices))
				{
			?>
			<a class="noborder" href="<?=$SITE_URL?>/service.php">
				<div class="services_itembox" style="background:url('<?=$SITE_URL?>/image/service/<?=$service_img?>') no-repeat;">
					<div class="service_infobox"><?=$service_title?></div>
				</div>
			</a>
			<?php
				}
			?>
		</div>
	</div>

	<div class="main_itembox">
		<div class="itembox_header">
			<ul class="itembox_header_selected_ul">
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
			</ul>
			<a class="noborder left" href="<?=$SITE_URL?>/about.php">
				<div class="itembox_header_title">
					<?=LANG_ABOUT?>&nbsp;&nbsp; >
				</div>
			</a>
			<div class="clear"></div>
		</div>
		<div class="itembox_container">
			<?php
				$getAboutus = mysql_query("SELECT image_name,description,title FROM general WHERE type = 'aboutus' LIMIT 1;",$globaldb);
				list($aboutus_img,$aboutus_desc,$aboutus_title) = mysql_fetch_row($getAboutus);
				if(strlen($aboutus_desc) > 50)
				{
					$aboutus_desc = substr($aboutus_desc, 0, 50).'...';
				}
			?>
			<a class="noborder left" href="<?=$SITE_URL?>/about.php">
				<div class="aboutus_pic" style="background:url('<?=$SITE_URL?>/image/<?=$aboutus_img?>') no-repeat;">
				</div>
				<div class="aboutus_text">
					<p><span style="font-weight:700;"><?=$aboutus_title?></span> <?=$aboutus_desc?></p>
				</div>
			</a>
		</div>
	</div>

	<div class="clear"></div>

	<div class="main_itembox">
		<div class="itembox_header">
			<ul class="itembox_header_selected_ul">
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
			</ul>
			<a class="noborder left" href="<?=$SITE_URL?>/gallery.php">
				<div class="itembox_header_title">
					<?=LANG_GALLERY?>&nbsp;&nbsp; >
				</div>
			</a>
			<div class="clear"></div>
		</div>
		<div class="itembox_container">
			<?php
				$getUpcomingEvent = mysql_query("SELECT id FROM newsfeed WHERE event_date > '$currentDate' ORDER BY event_date ASC LIMIT 1; ",$globaldb);
				list($upcomingID) = mysql_fetch_row($getUpcomingEvent);
				if($upcomingID)
				{
					$getGalleryPic = mysql_query("SELECT id,image_name,gallery_title FROM gallery WHERE newsfeed_id = '$upcomingID' ORDER BY id DESC LIMIT 1;",$globaldb);
					list($galleryid,$gallery_img,$gallery_title) = mysql_fetch_row($getGalleryPic);
			?>
			<a class="noborder" href="<?=$SITE_URL?>/event.php?id=<?=$upcomingID?>&imgid=<?=$galleryid?>">
				<div class="gallery_display" style="background:url('<?=$SITE_URL?>/image/gallery/<?=$gallery_img?>') no-repeat;">
				</div>
			</a>
			<?php
				}
			?>
		</div>
	</div>

	<div class="main_itembox">
		<div class="itembox_header">
			<ul class="itembox_header_selected_ul">
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
			</ul>
			<a class="noborder left" href="<?=$SITE_URL?>/contact.php">
				<div class="itembox_header_title">
					<?=LANG_CONTACT?>&nbsp;&nbsp; >
				</div>
			</a>
			<div class="clear"></div>
		</div>
		<div class="itembox_container">
			<div class="itembox_inner_contain">
				<div style="font-size:12px;text-align:center;margin-bottom: 10px;"><?=LANG_CONTACT_TEXT?></div>
				<a class="noborder left" href="<?=$SITE_URL?>/contact.php">
					<div class="inputbox_btn">
						<ul class="inputbox_selected_ul">
							<li class="inputbox_selected_li"></li>
							<li class="inputbox_selected_li"></li>
							<li class="inputbox_selected_li"></li>
							<li class="inputbox_selected_li"></li>
							<li class="inputbox_selected_li"></li>
						</ul>
						<div class="left"><?=LANG_ENQUIRYFORM?></div>
						<ul class="inputbox_selected_ul right">
							<li class="inputbox_selected_li"></li>
							<li class="inputbox_selected_li"></li>
							<li class="inputbox_selected_li"></li>
							<li class="inputbox_selected_li"></li>
							<li class="inputbox_selected_li"></li>
						</ul>
						<div class="clear"></div>
					</div>
				</a>
			</div>
		</div>
	</div>

	<div class="main_itembox">
		<div class="itembox_header">
			<ul class="itembox_header_selected_ul">
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
				<li class="itembox_header_selected_li"></li>
			</ul>
			<a class="noborder left" href="<?=$SITE_URL?>/membership.php">
				<div class="itembox_header_title">
					<?=LANG_MEMBERSHIP?>&nbsp;&nbsp; >
				</div>
			</a>
			<div class="clear"></div>
		</div>
		<div class="itembox_container">
			<form action="<?=$SITE_URL?>/login.php" method="POST">
				<input style="margin:20px 0;font-size: 15px;" type="text" class="inputbox_btn" name="uid" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;<?=LANG_USERNAME?>"/>
				<input style="margin: 5px 0 25px;font-size: 15px;" type="password" class="inputbox_btn" name="password" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;<?=LANG_PASSWORD?>"/>
				<div class="inputbox_btn" style="width: 220px;float: right;cursor:pointer;">
					<ul class="inputbox_selected_ul">
						<li class="inputbox_selected_li"></li>
						<li class="inputbox_selected_li"></li>
						<li class="inputbox_selected_li"></li>
						<li class="inputbox_selected_li"></li>
						<li class="inputbox_selected_li"></li>
					</ul>
					<div class="left"><?=LANG_LOGIN?></div>
					<ul class="inputbox_selected_ul right">
						<li class="inputbox_selected_li"></li>
						<li class="inputbox_selected_li"></li>
						<li class="inputbox_selected_li"></li>
						<li class="inputbox_selected_li"></li>
						<li class="inputbox_selected_li"></li>
					</ul>
					<div class="clear"></div>
				</div>
			</form>
		</div>
	</div>

	<div class="clear"></div>
</div>
<?php
	include("include/footer.php");
?>