<?php 

$url = $_SERVER['REQUEST_URI'];
$parts = parse_url($url);
$output = [];
parse_str($parts['query'], $output);

if(is_admin()){
	$user_id = $output['user_id'];
}else{
	$user_id = get_current_user_id();
}



        $company_location 	= $_POST['user_company_location'];
        $website      		= $_POST['user_company_web'];
        $company_director 	= $_POST['user_company_director'];
        $company_tag  		= $_POST['user_company_tag'];
        $company_desc 		= $_POST['user_company_description'];
        $contact_person 	= $_POST['contact_person'];
        $contact_phone      = $_POST['contact_phone'];
        $legal_structure 	= $_POST['legal_structure'];
        $data_founded  		= $_POST['data_founded'];
        $owner_structure 	= $_POST['owner_structure'];
        $password 	        = $_POST['password'];
        $image_upload		= $_FILES['user_company_logo'];

        // echo $company_location;
        // die();
        // $user_id = get_current_user_id();
        $user = get_user_by( 'id', $user_id );
        if( !is_wp_error($user_id) ) {
			$upload = wp_upload_bits( $_FILES['user_company_logo']['name'], null, file_get_contents( $_FILES['user_company_logo']['tmp_name'] ) );
			
		    $wp_filetype = wp_check_filetype( basename( $upload['file'] ), null );
		    $wp_upload_dir = wp_upload_dir();
		    $attachment = array(
		        'guid' => $wp_upload_dir['baseurl'] . _wp_relative_upload_path( $upload['file'] ),
		        'post_mime_type' 	=> $wp_filetype['type'],
		        'post_title' 		=> preg_replace('/\.[^.]+$/', '', basename( $upload['file'] )),
		        'post_content'   	=> '',
		        'post_status'    	=> 'inherit'
		    );
		    $attach_id = wp_insert_attachment( $attachment, $upload['file']);
		    //echo $attach_id;
		    require_once(ABSPATH . 'wp-admin/includes/image.php');
		    $attach_data = wp_generate_attachment_metadata( $attach_id, $upload['file'] );
		    wp_update_attachment_metadata( $attach_id, $attach_data );
		    if(!empty($image_upload['name'])){
		    	update_user_meta($user_id, 'wp_user_avatar', $attach_id);
		    }		    
		    update_user_meta($user_id, 'description',  $company_desc);
		    update_user_meta($user_id, 'company_location',  $company_location);
		    update_user_meta($user_id, 'website',  $website);
		    update_user_meta($user_id, 'company_director',  $company_director);
		    update_user_meta($user_id, 'company_tag',  $company_tag);
		    update_user_meta($user_id, 'contact_person',  $contact_person);
		    update_user_meta($user_id, 'contact_phone',  $contact_phone);
		    update_user_meta($user_id, 'legal_structure',  $legal_structure);
		    update_user_meta($user_id, 'data_founded',  $data_founded);
		    update_user_meta($user_id, 'owner_structure',  $owner_structure);
		    if(!empty($password)){
		    	update_user_meta($user_id, 'user_password', $password);
		    	wp_set_password ( $password, $user_id );
		    }
		    
		    $_SESSION['success_msg'] = '<p class="succ-reg">Succeesfully registered</p>';
		    

        }
    



  


 ?>