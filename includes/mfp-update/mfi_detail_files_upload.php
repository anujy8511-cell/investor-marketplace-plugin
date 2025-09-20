<?php
$url = $_SERVER['REQUEST_URI'];
$parts = parse_url($url);
$output = [];
parse_str($parts['query'], $output);
$user_id = $output['user_id'];
if(is_admin()){
	$userid = $user_id;
}else{
	$userid = get_current_user_id();
}
global $wpdb;
?>
<div id="del_msg"><p>File Deleted</p></div>
<?php
$getData_files = get_user_meta($userid, 'deatil_files', true);
//print_r($getData_files);
$filesIds = json_decode($getData_files);
if(!empty($filesIds)){
?>
<p style="color:#fff">Available Files:-</p>
<ul  style="color:#fff">
<?php
foreach ($filesIds as $fleValue) {
	//echo $fleValue;
	$attachment_title = get_the_title($fleValue)
	?>
	<li class="list-file" data-file-id="<?php echo $fleValue;  ?>"><?php echo $attachment_title; ?><span data-id-file ="<?php echo $fleValue;  ?>"data-user-id ="<?php echo $userid;  ?>">x</span></li>
	<?php
}
?>
</ul>
<?php
}
?>
<div class="row-col">
	<div class="col">
		<div class="form-main-grp">
			<!-- <p class="form-title">Number of Active Borrowers clients</p> -->
			<div class="file-upload-title">
				<h3>Upload data Files</h3>
				<p>Max 5 upload files</p>				
			</div>
			<div class="file-input-sec">
				<div>
					<label for="file_upload" class="file-upload-label">
						<input type="file" id="file_upload" name="file_upload[]" multiple class="file-upload" onchange="javascript:updateList()"accept=".xls,.xlsx, application/nd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel, .pdf, .odt, .doc, .docx" >
					Browse Files
					</label>
				</div>
				<div class="files" id="files_name">
					<!-- <h3>Files Selected</h3> -->
					<ol></ol>
				</div>
				<!-- <button type="button" id="sbt_files">Upload</button> -->
			</div>

		</div>
	</div>
</div>
<script type="text/javascript">
	updateList = function() {
		var input = document.getElementById('file_upload');
		var output = document.getElementById('files_name');
		var children = '';
		const fsize = input.files.item(i).size; 
		if(input.files.length < 5){
			for (var i = 0; i < input.files.length; ++i) {
				let fsize = input.files.item(i).size;
				//alert(fsize);
				let tag = ''; 
				if(fsize > 10000000)
					tag = '<span style="color:red;">(skipped due to large file size)</span>';

		        children += '<li>' + input.files.item(i).name + tag +'</li>';
		    }
		    output.innerHTML = '<ol>'+children+'</ol>';
		}else{
			alert('Number of file not more than 5.');
		}
	}

</script>
