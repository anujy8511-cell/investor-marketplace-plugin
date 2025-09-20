<?php
$url = $_SERVER['REQUEST_URI'];
$parts = parse_url($url);
$output = [];
parse_str($parts['query'], $output);
$user_id = $output['user_id'];
if(is_admin()){
	$currentuser_id = $user_id;
}else{
	$currentuser_id = get_current_user_id();
}

	// $currentuser_id   	= get_current_user_id();
	$data_files 		= $_FILES['file_upload'];	
	$countUpload_files = count($data_files['name']);
	$looparray = $data_files['name'];

	
	if($countUpload_files <= 5 && $data_files['name'][0] != ''){
		//print_r($data_files);
		//var_dump($countUpload_files);
		// die();
		$file_attach = array();
		foreach ($looparray as $key => $dataFile) {		
			// $filesize = $dataFile ['size'][$key];
			// print_r($filesize );
			// die();
			$upload = wp_upload_bits( $dataFile, null, file_get_contents( $_FILES['file_upload']['tmp_name'][$key] ) );
				$fileSize = $_FILES['file_upload']['size'][$key];
				if($fileSize > 10000000){
					continue;
				}

			    $wp_filetype = wp_check_filetype( basename( $upload['file'] ), null );
			    $wp_upload_dir = wp_upload_dir();
			    $attachment = array(
			        'guid' => $wp_upload_dir['baseurl'] . _wp_relative_upload_path( $upload['file'] ),
			        'post_mime_type' => $wp_filetype['type'],
			        'post_title' => preg_replace('/\.[^.]+$/', '', basename( $upload['file'] )),
			        'post_content'   => '',
			        'post_status'    => 'inherit'
			    ) ;
			    $attach_id = wp_insert_attachment( $attachment, $upload['file']);
			    require_once(ABSPATH . 'wp-admin/includes/image.php');
			    $attach_data = wp_generate_attachment_metadata( $attach_id, $upload['file'] );
			    wp_update_attachment_metadata( $attach_id, $attach_data );
			    $file_attach[] = $attach_id;
		}
		$json_file_attach_id = json_encode($file_attach);
		/*print_r($json_file_attach_id);
		 die;*/
		
		$exist_files_id = get_user_meta($currentuser_id, 'deatil_files',true);
		// print_r($exist_files_id);
		// die;
		//$exist_files_id_array = json_decode($exist_files_id);
		
		if(empty($exist_files_id) || $exist_files_id === NULL){
			$exist_files_id_arr = array();
		}else{
			$exist_files_id_arr = json_decode($exist_files_id);
		}
		//var_dump($exist_files_id_arr);
		//die;

		
		$exist_files_id_arr = array_merge($exist_files_id_arr, $file_attach);
		
		//echo count($exist_files_id_arr);
		if(count($exist_files_id_arr) <= 5){
			$exist_files_id_json = json_encode($exist_files_id_arr);
			//print_r($exist_files_id_json);die;
			update_user_meta($currentuser_id, 'deatil_files', $exist_files_id_json);
			$_SESSION['file_data'] = 'upload_done';
			$_SESSION['file_upload_msg'] = '<p class="success-msg">File Uploaded Succesfully</p><script type="text/javascript">
				jQuery(document).ready(function(){
					$(\'li#detail_file_li\').trigger(\'click\');
					$(\'html, body\').animate({
		        scrollTop: $(\'#mfp\').offset().top
		    }, 2000);
				})
			</script>';
		}else{
			$_SESSION['file_upload_msg'] = '<p class="error-msg">Invalid number of files, You can only upload 5 files</p><script type="text/javascript">
				jQuery(document).ready(function(){
					$(\'li#detail_file_li\').trigger(\'click\');
					$(\'html, body\').animate({
		        scrollTop: $(\'#mfp\').offset().top
		    }, 2000);
				})
			</script>';
		}
		?>
		
		<?php
		//die();
	}