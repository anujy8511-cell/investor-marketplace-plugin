<?php 
/**
 * Plugin Name: User Investor
 * Plugin URI: 
 * Description: This is a custom plugin for User Investor Dashboard.
 * Author: Vortex Global services
 */

define('CURRENCY_CST','₦');
$site_url = get_site_url();



// add user role
add_role( nfi, 'Mfi', get_role( 'subscriber' )->capabilities );
// add user role


add_action( 'admin_enqueue_scripts', 'plugin_enqueue_styles', 10 );
function plugin_enqueue_styles() {
		wp_enqueue_style( 'admin-custom-plug-css', plugin_dir_url( __FILE__ ).'/css/admin-invest.css' );
		wp_enqueue_script( 'admin-custom-plug-js', plugin_dir_url( __FILE__ ).'/js/admin-plugin-script.js' );

		$localize_arr = array( 
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'siteurl' => site_url(),
        );
    
    wp_localize_script( 'admin-custom-plug-js', 'themeobj',$localize_arr);
	
}
add_action( 'wp_enqueue_scripts', 'wp_enqueue_styles', 10 );
function wp_enqueue_styles() {
		wp_enqueue_style( 'custom-plug-css', plugin_dir_url( __FILE__ ).'/css/invest.css' );
		wp_enqueue_script( 'custom-plug-js', plugin_dir_url( __FILE__ ).'/js/plugin-script.js', array('jquery') );
		wp_enqueue_style( 'customv-plug-css', plugin_dir_url( __FILE__ ).'/css/nouislider.css' );
		wp_enqueue_script( 'customv-plug-js', plugin_dir_url( __FILE__ ).'/js/nouislider.js', array('jquery') );
		$localize_arr = array( 
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'siteurl' => site_url(),
        );
    
    wp_localize_script( 'custom-plug-js', 'themeobj',$localize_arr);
	
}

add_action('init', 'custom_startSession', 1);
add_action('wp_logout', 'custom_endSession');
add_action('wp_login', 'custom_endSession');

function custom_startSession() {
    if(!session_id()) {
        session_start();
    }
}

function custom_endSession() {
    session_destroy ();
}


// add menu pages
/**
 * Register a custom menu page.
 */
function wpdocs_register_my_custom_menu_page(){

	add_menu_page('Admin Dashboard', 'Admin Dashboard', 'manage_options', 'admin_dashboard','investor_user_page',
      plugins_url( 'User-Investor/images/update-profile-user.png' ),  6);
		// add_submenu_page( 'admin_dashboard', 'User List', 'User List',
  //   		'manage_options', 'admin_dashboard');
		add_submenu_page( 'admin_dashboard', 'Approved MFIs', 'Approved MFIs','manage_options', 'approved_mfi','approved_mfi_page');
    	add_submenu_page( 'admin_dashboard', 'Pending MFIs', 'Pending MFIs','manage_options', 'pending_mfi','pending_mfi_page');
    	add_submenu_page( 'admin_dashboard', 'Rejected MFIs', 'Rejected MFIs','manage_options', 'rejected_mfi','rejected_mfi_page');
    	add_submenu_page( 'admin_dashboard', 'Approved Investors', 'Approved Investors','manage_options', 'approved_investors','approved_investor_page');
    	add_submenu_page( 'admin_dashboard', 'Pending Investors', 'Pending Investors','manage_options', 'pending_investors','pending_investor_page');
    	add_submenu_page( 'admin_dashboard', 'Rejected Investors', 'Rejected Investors','manage_options', 'rejected_investors','rejected_investor_page');
    	add_submenu_page( 'admin_dashboard', 'Edit User', '','manage_options', 'edit_user','edit_user_page');
 }
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );


function coming_soon_page(){
    echo '<h2>Coming Soon</h2>';
}
/**
 * Display a custom menu page
 */
function investor_user_page(){
    //esc_html_e( 'Admin Page Test', 'textdomain' );  
    //echo "string";
    include('includes/admin/admin_dashboard.php');
}
function approved_mfi_page(){
    //esc_html_e( 'Admin Page Test', 'textdomain' );  
    //echo "string";
    include('includes/admin/mfi_user/approved_mfi.php');
}
function rejected_mfi_page(){
    include('includes/admin/mfi_user/rejected_mfi.php');
}
function pending_mfi_page(){
    include('includes/admin/mfi_user/pending_mfi.php');
}
function approved_investor_page(){
    include('includes/admin/investor_user/approved_investor.php');
}
function rejected_investor_page(){
    include('includes/admin/investor_user/rejected_investor.php');
}
function pending_investor_page(){
    include('includes/admin/investor_user/pending_investor.php');
}
function edit_user_page(){
	include('includes/admin/edit-user.php');
}




// shortcode to add registration and Login form

add_shortcode('investor_registration_form', 'investor_registration_login_form');
function investor_registration_login_form(){
	if ( is_user_logged_in() ) {
    
} else {
   include('includes/registration-form.php');

}
}
add_shortcode('investor_login_form', 'investor_login_login_form');
function investor_login_login_form(){
	if ( is_user_logged_in() ) {
    
} else {?>
	<div class="login-form">
		<h2 class="login-title">Login</h2>
		<p class="login-subtxt">Login your account</p>
	<?php
   //include('includes/login-form.php');
	$args = array(
    'echo'            => true,
    'redirect'        => get_permalink( 8 ),
    'remember'        => true,
    'value_remember'  => true,
  );
	echo do_shortcode('[user_registration_my_account]');
 
  //return wp_login_form( $args );
?></div><?php
}
}


add_filter( 'user_registration_login_redirect', 'cstm_ur_redirect_after_login', 10, 2 );
function cstm_ur_redirect_after_login( $redirect, $user ) {
	return 'mfi-edit-profile' ;
}
add_filter( 'login_errors', 'cstm_ur_login_error_message',99 );
function cstm_ur_login_error_message( $error ){
	
	$user = get_user_by('login', $_POST['username']);

	if(empty($user)){
		$user = get_user_by('email', $_POST['username']);
	}

	$user_id = $user->ID;
	$user_status = get_user_meta($user_id, 'user_status', true);
	
	if(!empty($user_status) && $user_status != 'Accepted' && !is_admin()){
		$error = sprintf( '<strong>' . __( 'ERROR: ', 'user-registration' ) . '</strong>' . __( 'Username %1$1s is not approved yet, please contact admin. %2$2s', 'user-registration' ), $_POST['username'], "<a href=''></a>");
	}
	
	return $error;
}


add_shortcode('investor_logout_form', 'investor_logout_form');
function investor_logout_form(){
	
	if ( is_user_logged_in() ) {
		//echo "shubham";
		?>
		<div class="logout-col">
			<p class="">Thanks for your visit!</p>
			<a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a>
		</div>
		<?php
    } else 
    {
	}
}
add_shortcode('mfis_update_profile', 'mfis_update_profile_form');
function mfis_update_profile_form(){
	$user = wp_get_current_user();
	//print_r($user->roles);
	include('includes/mfi_update_profile.php');

}
add_shortcode('mfi_discover_template', 'investor_search_form_template');
function investor_search_form_template(){
	if ( is_user_logged_in() ) {
		$site_url = get_site_url();
		$user_id = get_current_user_id();
		$user = get_userdata( $user_id );
		$user_roles = $user->roles;
		if(in_array( 'investor', $user_roles, true )){
			include('includes/search_slider/mfi_discover_template.php');
		}else{
			$site_url = get_site_url();
			$dashboard_link = "$site_url/mfi-edit-profile/";
			header("Location:".$dashboard_link); 
		}
      
} else {	
   echo 'login First';
   $site_url = get_site_url();
   $login_link = "$site_url/log-in/";
   header("Location:".$login_link); 
   exit();

}
}

add_action('init', 'add_new_user');
function add_new_user() {
	if(isset($_POST['sbt_user'])){
		    
            $username     = $_POST['company_name'];
            $email        = $_POST['company_mail'];
            $password     = wp_generate_password( $length = 12, $include_standard_special_chars = false );
            $company_location = $_POST['company_location'];
            $website      = $_POST['company_web'];
            $company_director = $_POST['company_director'];
            $company_tag  = $_POST['comapny_tag'];
            $company_desc = $_POST['company_description'];
            $company_role = $_POST['comapny_role'];

            //echo $username;


	    $user_id = username_exists( $username );
	    if ( !$user_id && email_exists($email) == false ) {
	    		//echo $email;
	    		//die();
	        $user_id = wp_create_user( $username, $password, $email );
	        if( !is_wp_error($user_id) ) {
	            $user = get_user_by( 'id', $user_id );
				$upload = wp_upload_bits( $_FILES['company_logo']['name'], null, file_get_contents( $_FILES['company_logo']['tmp_name'] ) );
			    $wp_filetype = wp_check_filetype( basename( $upload['file'] ), null );
			    $wp_upload_dir = wp_upload_dir();
			    $attachment = array(
			        'guid' => $wp_upload_dir['baseurl'] . _wp_relative_upload_path( $upload['file'] ),
			        'post_mime_type' => $wp_filetype['type'],
			        'post_title' => preg_replace('/\.[^.]+$/', '', basename( $upload['file'] )),
			        'post_content'   => '',
			        'post_status'    => 'inherit'
			    );
			    $attach_id = wp_insert_attachment( $attachment, $upload['file']);
			    //echo $attach_id;
			    require_once(ABSPATH . 'wp-admin/includes/image.php');
			    $attach_data = wp_generate_attachment_metadata( $attach_id, $upload['file'] );
			    wp_update_attachment_metadata( $attach_id, $attach_data );
			    if(!empty($attach_id)){
			    	update_user_meta($user_id, 'wp_user_avatar', $attach_id);
				}
			    update_user_meta($user_id, 'description',  $company_desc);
			    update_user_meta($user_id, 'company_location',  $company_location);
			    update_user_meta($user_id, 'website',  $website);
			    update_user_meta($user_id, 'company_director',  $company_director);
			    update_user_meta($user_id, 'company_tag',  $company_tag);
			    update_user_meta($user_id, 'user_status',  'Pending');
			    $user->set_role( $company_role );			    

	        }
	    }else{
	    	$_SESSION['success_msg'] = '<p class="user-exist">Username already exist</p>';
	    }
	}
	if(isset($_POST['user_update_info'])){
		include('includes/includes/profile_details_update.php');
	}
	
}

//add to compare mfi
add_action('wp_ajax_add_ajax_compare','add_compare_list');
add_action('wp_ajax_nopriv_add_ajax_compare','add_compare_list');
function add_compare_list(){

	$comp_user_id 	= 	(int)$_POST['comp_user_id'];
	$action 		= 	$_POST['curaction'];
	$change_action 	=	'';
	$count_total 	=	isset($_SESSION['add_compare_mfi']) ? count($_SESSION['add_compare_mfi']) : 0; 
	$add_status 	= 	'success';

	if(isset($comp_user_id) && isset($action) && $count_total <= 2){
		if($action == 'addmfi'){

			$_SESSION['add_compare_mfi'][] = (int)$_POST['comp_user_id'];
			$change_action = 'removemfi';

		}else if($action == 'removemfi'){

			$removeloop = $_SESSION['add_compare_mfi'];
			if (($key = array_search($comp_user_id, $removeloop)) !== false) {
			    unset($removeloop[$key]);
			}

			$_SESSION['add_compare_mfi'] = $removeloop;
			$change_action = 'addmfi';
		}
	}else{
		$add_status 	= 	'error';
	}
	echo json_encode(array('value' => $_SESSION['add_compare_mfi'],'action' => $change_action,'status' => $add_status));exit;
}

add_action('wp_ajax_change_user_status','change_user_status');
add_action('wp_ajax_nopriv_change_user_status','change_user_status');
 function change_user_status(){
 	$updated_status = $_POST['user_status'];
 	$investor_id 	= $_POST['user_id'];
 	$user_info 		= get_userdata($investor_id);
 	$user_email 	= $user_info->user_email;
 	$user_role 		= $user_info->roles;
 	update_user_meta((int)$investor_id, 'user_status', $updated_status);
 	echo json_encode(['status' =>$updated_status ]);
 		$to = $user_email;
		$subject = 'Nix Marketplace Status Change';
		if ( in_array( 'nfi', $user_role, true ) && $updated_status == 'Accepted'){
			$body = '<p>Your application has been accepted successfully by the admin, please login and submit your company data.</p>';
		}elseif(in_array( 'investor', $user_role, true ) && $updated_status == 'Accepted'){
			$body = '<p>Your application has been accepted successfully by the admin, please login and search for the desired MFI</p>';
		}
		else{
			$body = '<p>Your registration application has been rejected. Please contact to admin.</p>';
		}
		$headers = array('Content-Type: text/html; charset=UTF-8');
		 
		wp_mail( $to, $subject, $body, $headers );
 	exit();
 }
add_action('wp_ajax_send_mail_to_user','send_mail_to_user_detail');
add_action('wp_ajax_nopriv_send_mail_to_user','send_mail_to_user_detail');
 function send_mail_to_user_detail(){
 	$user_id 	= $_POST['user_id'];
 	$user_info 		= get_userdata($user_id);
 	$user_email 	= $user_info->user_email;
 	$user_role 		= $user_info->roles;
 	$user_password  = get_user_meta($user_id, 'user_password', true);
 	
 	
 		$to = $user_email;
		$subject = 'Nix Marketplace User details';
		if ( in_array( 'nfi', $user_role, true )){
			$body = '<p>Hello MFI,</p><p>Your application has been Added successfully by the admin, please login and submit your company data.</p><p>Username: '.$user_email.'<br>Password: '.$user_password.'</p>';
		}elseif(in_array( 'investor', $user_role, true )){
			$body = '<p>Hello Investor,</p><p>Your application has been Added successfully by the admin, please login and submit your company data.</p><p>Username: '.$user_email.'<br>Password: '.$user_password.'</p>';
		}
		else{
			$body = '';
		}
		$headers = array('Content-Type: text/html; charset=UTF-8');
		 
		wp_mail( $to, $subject, $body, $headers );
 	exit();
 }
add_action('wp_ajax_delete_file','delete_exist_file');
add_action('wp_ajax_nopriv_delete_file','delete_exist_file');
function delete_exist_file(){
	
	$del_id = $_POST['delete_file_id'];
	$file_user_id = $_POST['file_user_id'];
	//echo $userid;
	$exist_files = get_user_meta($file_user_id, 'deatil_files', true);
	//print_r($exist_files);
	if(empty($exist_files) || $exist_files === NULL ){
			$exist_files_id_arr = array();
		}else{
			$exist_files_id_arr = json_decode($exist_files);
		}
		print_r($exist_files_id_arr);
		// die;
	// $exist_files_arr = json_decode($exist_files);
	$pos = array_search($del_id, $exist_files_id_arr);
	
	//echo $pos;
	unset($exist_files_id_arr[$pos]);
	shuffle($exist_files_id_arr);
	print_r($exist_files_id_arr);
	$exist_files_json = json_encode($exist_files_id_arr);
	print_r($exist_files_json);
	update_user_meta($file_user_id, 'deatil_files', $exist_files_json);
	exit();
}

add_action('wp_ajax_filter_amount_search','search_company_mfi');
add_action('wp_ajax_nopriv_filter_amount_search','search_company_mfi');
 function search_company_mfi(){
 	$data = $_POST['filter_amount_data'];
 	//print_r($data);
 	 $total_outstanding = explode('_', $data['sliderPrice1']);
 	 $total_balance		= explode('_', $data['sliderPrice2']);
 	 $total_portfolio   = explode('_', $data['sliderPrice3']);
 	 $growth_portfolio  = explode('_', $data['sliderPrice4']);
 	 $par_rescheduled   = explode('_', $data['sliderPrice5']);
 	 $write_off         = explode('_', $data['sliderPrice6']);
 	 $net_income        = explode('_', $data['sliderPrice7']);
 	 $self_sufficiency  = explode('_', $data['sliderPrice8']);
 	 $debt_equity       = explode('_', $data['sliderPrice9']);
 	 $no_borrowers      = explode('_', $data['sliderPrice10']);

 	 //print_r($total_outstanding);
 	 $total_outstanding_min = $total_outstanding[0];
 	 $total_outstanding_max = $total_outstanding[1];
 	 $total_balance_min 	= $total_balance[0];
 	 $total_balance_max 	= $total_balance[1];
 	 $total_portfolio_min 	= $total_portfolio[0];
 	 $total_portfolio_max 	= $total_portfolio[1];
 	 $growth_portfolio_min 	= $growth_portfolio[0];
 	 $growth_portfolio_max 	= $growth_portfolio[1];
 	 $par_rescheduled_min 	= $par_rescheduled[0];
 	 $par_rescheduled_max 	= $par_rescheduled[1];
 	 $write_off_min 		= $write_off[0];
 	 $write_off_max 		= $write_off[1];
 	 $net_income_min 		= $net_income[0];
 	 $net_income_max 		= $net_income[1];
 	 $self_sufficiency_min 	= $self_sufficiency[0];
 	 $self_sufficiency_max 	= $self_sufficiency[1];
 	 $debt_equity_min 		= $debt_equity[0];
 	 $debt_equity_max 		= $debt_equity[1];
 	 $no_borrowers_min 		= $no_borrowers[0];
 	 $no_borrowers_max 		= $no_borrowers[1];

 	global $wpdb;
 	$tablename = $wpdb->prefix.'mfp_balance_sheet';
    $results = $wpdb->get_results( "
    	SELECT 
    	user_id

    	FROM $tablename 
    	WHERE 
    	(total_bal_sheet_bal >= $total_balance_min AND total_bal_sheet_bal <= $total_balance_max) OR
    	(total_portfolio_bal >= $total_portfolio_min AND total_portfolio_bal <= $total_portfolio_max) OR
    	(growth_portfolio_bal >= $growth_portfolio_min AND growth_portfolio_bal <= $growth_portfolio_max) OR
    	(par30_resch_bal >= $par_rescheduled_min AND par30_resch_bal <= $par_rescheduled_max) OR
    	(write_off_bal >= $write_off_min AND write_off_bal <= $write_off_max) OR
    	(net_income_bal >= $net_income_min AND net_income_bal <= $net_income_max) OR
    	(op_self_suff_bal >= $self_sufficiency_min AND op_self_suff_bal <= $self_sufficiency_max) OR
    	(debt_bal >= $debt_equity_min AND debt_bal <= $debt_equity_max) OR 
    	(no_borrw_bal >= $no_borrowers_min AND no_borrw_bal <= $no_borrowers_max)", OBJECT );
    
        if(!empty($results)){
			foreach ($results as $key => $userids) {
				 $filteruser_id = $userids->user_id;
				//echo "</br>";
				$user = get_userdata( $filteruser_id );
				$user_roles = $user->roles;
				$site_url = get_site_url();
				if ( in_array( 'nfi', $user_roles, true ) ) {
				   
				    $company_name 		= esc_html( $user->display_name );
				    $company_logo 		= get_user_meta($filteruser_id, 'wp_user_avatar', true);
				    $company_location 	= get_user_meta($filteruser_id, 'company_location', true);
				    $company_description 	= get_user_meta($filteruser_id, 'description', true);
				    $count_total 		=	isset($_SESSION['add_compare_mfi']) ? count($_SESSION['add_compare_mfi']) : 0; 

				    $actionmfi 	= 'addmfi';
				    $text 		= 'Add to Compare';	 
				    if( $count_total > 0 && in_array($filteruser_id,$_SESSION['add_compare_mfi'])){
				    	$actionmfi 	= 'removemfi';
				    	$text 		= 'Added to Compare';	
				    }
				    echo '<div class="loop_discover">
				    <div class="company-dtl">
							<div class="company-logo" style="background-image: url('.wp_get_attachment_url($company_logo).'">
								
							</div>
							<div class="company-dtl-txt">
								<p class="com-location">'.$company_location.'</p>
								<p class="com-title"><a href="'.$site_url.'/user-profile/?user_name='.$company_name.'">'.$company_name.'</a></p>
								<p class="com-desc">'.$company_description.'</p>
								<p class="add_cmp"><span class="name_add_compare" data-userid="'.$filteruser_id.'" data-action="'.$actionmfi.'">'.$text.'</span></p>
							</div>
						</div></div>';

				}
			}
        	
        	//include('includes/search_slider/mfi_discover_template.php');
        }


 	 exit;
 	
 }

 // Create table and columns for MFI data =============================================//////////////
// =====================================================================================
add_action('init', 'createTables');
function createTables(){	
		include('includes/db_table_create.php');
		
}

// Create table and columns for MFI data Endd===================================
// ==============================================================================

// function to insert data in database table
 function insert_user_info_db($tablename, $column_name = []){
    $userid = get_current_user_id();
    global $wpdb;

    $results = $wpdb->get_results( "SELECT * FROM $tablename WHERE user_id = $userid", OBJECT ); 
    if(!empty($results)){

        $wpdb->update($tablename, $column_name, array( 'user_id' => $userid ) ); 

        }else{

            $wpdb->insert($tablename, $column_name);
        }
    }
// function to insert data in database table end

// submit user info to the datbase
add_action('init','submit_mfi_form_details');
	function submit_mfi_form_details(){
		if ( is_user_logged_in() ) {
		include('includes/detail_submit_db.php');
	} else {
	   //include('includes/registration-form.php');

	}
}
// submit user info to the datbase end

// user profile view

add_shortcode('user_profile_view', 'user_profile_view_template');
function user_profile_view_template(){
	include('includes/view-profile/user_profile_view.php');
}
// user profile view end
// compare MFI
add_shortcode('mfi_compare_template', 'template_for_mfi_compare');
function template_for_mfi_compare(){
	if ( is_user_logged_in() ) {
		//include('includes/compare-mfi/compare-mfis.php');
		$site_url = get_site_url();
		$user_id = get_current_user_id();
		$user = get_userdata( $user_id );
		$user_roles = $user->roles;
		if(in_array( 'investor', $user_roles, true )){
			include('includes/compare-mfi/compare-mfis.php');
		}else{
			$site_url = get_site_url();
			$dashboard_link = "$site_url/mfi-edit-profile/";
			header("Location:".$dashboard_link); 
		}	
	}
	else{
		$site_url = get_site_url();
		echo 'login First';
		$login_link = "$site_url/log-in/";

   		header("Location:".$login_link); 
	   exit();
	}
}
add_action('wp_ajax_selected_mfi','compare_company_mfi');
add_action('wp_ajax_nopriv_selected_mfi','compare_company_mfi');
function compare_company_mfi(){
	$selected_mfi_from = $_POST['mfi_from'];
	$selected_mfi_to = $_POST['mfi_to'];

}
// compare MFI end


 // Drop table and columns =============================================//////////////
// =====================================================================================

//add_action('init', 'drop_tables');
function drop_tables(){
	global $wpdb;
        $mfp_infrastructure 			=	 $wpdb->prefix.'mfp_infrastructure';
		$mfp_clients 			        =	 $wpdb->prefix.'mfp_clients';
		$mfp_products 			        = 	 $wpdb->prefix.'mfp_products';
		$mfp_credit_products 			=	 $wpdb->prefix.'mfp_credit_products';
		$mfp_deposit_products 			= 	 $wpdb->prefix.'mfp_deposit_products';
		$mfp_delinquency 				= 	 $wpdb->prefix.'mfp_delinquency';
		$mfp_non_financial_service 		= 	 $wpdb->prefix.'mfp_non_financial_service';
		$mfp_enterprises_financed 		= 	 $wpdb->prefix.'mfp_enterprises_financed';
		$mfp_job_creation 				= 	 $wpdb->prefix.'mfp_job_creation';
		$mfp_poverty_outreach 			= 	 $wpdb->prefix.'mfp_poverty_outreach';
		$mfp_balance_sheet				=	 $wpdb->prefix.'mfp_balance_sheet';
		$mfp_income_statement			=	 $wpdb->prefix.'mfp_income_statement';
		$msp_social_goals				=	 $wpdb->prefix.'msp_social_goals';
		$msp_governance_hr				=	 $wpdb->prefix.'msp_governance_hr';
		$msp_products_services			=	 $wpdb->prefix.'msp_products_services';
		$msp_client_protection			=	 $wpdb->prefix.'msp_client_protection';
		$msp_environment				=	 $wpdb->prefix.'msp_environment';
        
        $sql1         = "DROP TABLE ". $mfp_infrastructure;
        $sql2         = "DROP TABLE ". $mfp_clients;
        $sql3         = "DROP TABLE ". $mfp_products;
        $sql4         = "DROP TABLE ". $mfp_credit_products;
        $sql5         = "DROP TABLE ". $mfp_deposit_products;
        $sql6         = "DROP TABLE ". $mfp_delinquency;
        $sql7         = "DROP TABLE ". $mfp_non_financial_service;
        $sql8         = "DROP TABLE ". $mfp_enterprises_financed;
        $sql9         = "DROP TABLE ". $mfp_job_creation;
        $sql10        = "DROP TABLE ". $mfp_poverty_outreach;
        $sql11        = "DROP TABLE ". $mfp_balance_sheet;
        $sql12        = "DROP TABLE ". $mfp_income_statement;
        $sql13        = "DROP TABLE ". $msp_social_goals;
        $sql14        = "DROP TABLE ". $msp_governance_hr;
        $sql15        = "DROP TABLE ". $msp_products_services;
        $sql16        = "DROP TABLE ". $msp_client_protection;
        $sql17        = "DROP TABLE ". $msp_environment;
        //$sql11 = "TRUNCATE TABLE" .$woo_attr_table;
        $wpdb->query($sql1);
        $wpdb->query($sql2);
        $wpdb->query($sql3);
        $wpdb->query($sql4);
        $wpdb->query($sql5);
        $wpdb->query($sql6);
        $wpdb->query($sql7);
        $wpdb->query($sql8);
        $wpdb->query($sql9);
        $wpdb->query($sql10);
        $wpdb->query($sql11);
        $wpdb->query($sql12);
        $wpdb->query($sql13);
        $wpdb->query($sql14);
        $wpdb->query($sql15);
        $wpdb->query($sql16);
        $wpdb->query($sql17);
}
 // Drop table and columns end =============================================//////////////
// =====================================================================================
