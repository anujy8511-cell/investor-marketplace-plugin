
<?php

$getData_files = get_user_meta($user_id, 'deatil_files', true);
$filesIds = json_decode($getData_files);
if(!empty($filesIds)){
?>
<p style="color:#fff">Available Files:-</p>
<ul  style="color:#fff">
<?php
foreach ($filesIds as $fleValue) {
	//echo $fleValue;
	$attachment_title = get_the_title($fleValue);
	$attachment_url = wp_get_attachment_url($fleValue);
	?>
	<li><?php echo $attachment_title; ?><a href="<?php echo $attachment_url; ?>" target=
		"_blank"> Click to download</a></li>
	<?php
}
?>
</ul>
<?php
}else{
	echo '<p style="color:#fff">Files are not available</p>';
}