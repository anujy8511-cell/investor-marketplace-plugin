<?php
    global $wp;
    $site_url = get_site_url();
	$main_url = home_url( $wp->request );
    $current_user = get_current_user_id();
	//$_GET['company_name'];
    $user_name = $_GET['user_name'];
    //$user_name = 'anujmfi';

    $args = array(  
        'meta_query' => array(
                array(
                    'key'     => 'nickname',
                    'value'   => $user_name,
                    'compare' => '='
                )
        )
    );
    $blogusers = get_users( $args );
    

    if(!empty($blogusers)){
    	foreach ( $blogusers as $user ) {
            //echo "<pre>";
            $user_role = ($user->roles[0]);
    //print_r(json_decode(json_encode($user),true));
    //echo "<pre>";
    		$user_id            = esc_html($user->id);
            $get_user_meta      = get_userdata($user_id);
            $user_roles         = $user_meta->roles;
            $user_email         = esc_html($user->user_email);
    		$company_name       = get_user_meta($user_id, 'nickname', true);
            $company_location   = get_user_meta($user_id, 'company_location', true);
            $company_director   = get_user_meta($user_id, 'company_director', true);
            $company_website    = get_user_meta($user_id, 'website', true);
            $user_status        = get_user_meta($user_id, 'user_status', true);
            $user_tag           = get_user_meta($user_id, 'company_tag', true);
            $company_logo 		= get_user_meta($user_id, 'wp_user_avatar', true);
    	}
    }
    global $wpdb;
        $firsttable = $wpdb->prefix.'mfp_balance_sheet';
        $secondtable = $wpdb->prefix.'mfp_credit_products';
        $firstusers = $wpdb->get_results(
                "SELECT * " .
                "FROM $firsttable AS ft " .
                "LEFT JOIN $secondtable AS st ON ft.user_id = st.user_id " .
                "WHERE ft.user_id = $user_id"
            ); 
        foreach ($firstusers as $user) {
            $total_outstanding  = $user->no_loan_outs_cproduct;
            $total_bal_sheet    = $user->total_bal_sheet_bal;
            $total_portfolio    = $user->total_portfolio_bal; 
            $growth_portfolio   = $user->growth_portfolio_bal;  
            $par_reschedule     = $user->par30_resch_bal; 
            $write_off          = $user->write_off_bal; 
            $net_income         = $user->net_income_bal; 
            $opself_sufficiency = $user->op_self_suff_bal; 
            $debt_equity        = $user->debt_bal; 
            $number_borrowers   = $user->no_borrw_bal; 
            //echo $total_outstanding;
        }

    ?>
    <div class="user-profile-view">
    	<div class="header-user-profile">
    	  
    	</div>
    	<div class="user-basic-info">
    		<div class="user-avatar-col">
    			<div class="user-avatar">
                    <?php
                    $user_logo_url = get_post_meta($company_logo, '_wp_attached_file', true);
                        if(!empty($user_logo_url)){
                            echo '<img src="'.wp_get_attachment_url($company_logo).'" class="user-img">';
                        }else{
                            echo '<img src="'.$site_url .'/wp-content/uploads/2020/10/User-Account-Person-PNG-File.png" class="user-img">';
                        }
                    ?>
    				
    			</div>
    		</div>
    		<div class="user-info">                
                <p class="user_location"><?php echo $company_location; ?></p>
    			<h2 class="user_name"><?php echo $company_name; ?></h2>
                <p class="user_location"><a href="mailto:<?php echo $user_email; ?>"><?php echo $user_email; ?></a></p>
                <p><span>Products and Services:-</span> <?php echo $user_tag; ?></p>
    		</div>
            
    	</div>
    </div>
</div>
</div>
        <div class="cntct-info">
                <div class="dtl-row">
                    <div class="dtl-web">
                        <p>
                            <a href="#"><img src="<?php echo $site_url; ?>/wp-content/uploads/2020/12/globe.png">
                                <?php $website = get_user_meta($current_user, 'website', true); ?>
                            <span><?php echo $website; ?></span></a>
                        </p>
                    </div>
                    <div class="dtl-mail">
                        <p>
                            <a href="#"><img src="<?php echo $site_url; ?>/wp-content/uploads/2020/12/new-email-outline_1.png">
                            <span><?php echo $user_email; ?></span></a>
                        </p>
                    </div>
                    <div class="dtl-name">
                        <?php $director = get_user_meta($current_user, 'company_director', true); ?>
                        <p>
                            <a href="#" style="pointer-events: none;"><img src="<?php echo $site_url; ?>/wp-content/uploads/2020/12/avatar.png">
                            <span><?php echo $director; ?> (Director)</span></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="section_wrapper">
                <div class="the_content_wrapper">
            <?php if($user_role == 'nfi'){ ?>
            <div class="user-major-data">
                <div class="table1">
                    <table class="userdata-table">
                        <tr>
                            <td>Total Outstanding Loan Balance</td>
                            <td><?php echo $total_outstanding; ?></td>
                            <td>Total Balance Sheet</td>
                            <td><?php echo $total_bal_sheet; ?></td>
                            <td>Total Portfolio</td>
                            <td><?php echo $total_portfolio; ?></td>
                        </tr>
                        <tr>
                            <td>% Growth Portfolio</td>
                            <td><?php echo $growth_portfolio; ?></td>
                            <td>Write off</td>
                            <td><?php echo $write_off; ?></td>
                            <td>Net Income</td>
                            <td><?php echo $net_income; ?></td>
                        </tr>
                        <tr>
                            <td>Operational Staff Sufficiency</td>
                            <td><?php echo $opself_sufficiency; ?></td>
                            <td>Debt/ Equity</td>
                            <td><?php echo $debt_equity; ?></td>
                            <td>Number of Borrowers</td>
                            <td><?php echo $number_borrowers; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php } else{ }?>
    <?php
    if($user_role == 'nfi'){
        //echo "string";
       include('mfi-details/common-details.php');
    }
    ?>
    <div class="related-user-mfi">
        <?php 
        $user_ab = get_user_by('id',$user_id);
        $user_ab_role = $user_ab->roles[0];
        if( $user_ab_role == 'investor'){
             echo '<h2 class="">See more Investors</h2>';
        }else{
             echo '<h2 class="">See more MFIs</h2>';
        }
        ?>
       
        
        <div class="row_list_user">
        <?php 
            
            $args = array(
                // 'role__in'      =>  array('nfi'),user_roles
                'role__in'      =>  $user_ab_role,
                'orderby'       =>  'id',
                'exclude'       =>  $user_id,
                'order'         => 'DESC'               
            );
            $blogusers = get_users($args );
            //var_dump($blogusers); die();
            foreach ( $blogusers as $users => $item ) {
                $user_id            = $item->ID;
                $get_user_meta      = get_userdata($user_id);
                $company_logo       = get_user_meta($user_id, 'wp_user_avatar', true);
                $company_name       = get_user_meta($user_id, 'nickname', true);
                echo '<div class="user-dtls">';
                //echo '<div class="user-img" style="background-image: url('.wp_get_attachment_url($company_logo).')"><img src="'.wp_get_attachment_url($company_logo).'" class="user-img"></div>';
                echo '<div class="user-img" style="background-image: url('.wp_get_attachment_url($company_logo).')"></div>';
                echo '<p>'.$company_name.'</p>';
                echo '<a href="'.$site_url.'/user-profile/?user_name='.$company_name.'">See Profile</a>';
                echo '</div>';
                
            }
         ?>
         </div>
    </div>
    <script type="">
        $('.row_list_user').slick({
          dots: false,
          infinite: true,
          speed: 300,
          slidesToShow: 4,
          slidesToScroll: 4,
          prevArrow:"<img class='a-left control-c prev slick-prev' src='<?php echo $site_url; ?>/wp-content/uploads/2020/12/left_arrow.png'>",
            nextArrow:"<img class='a-right control-c next slick-next' src='<?php echo $site_url; ?>/wp-content/uploads/2020/12/right_arrow.png'>",
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
        });
    </script>
    <?php

    

