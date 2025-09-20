
    <h2 class="user_list">Investor User List</h2>
    <div class="inv-table">
        <table class="inv-tbl">
            <thead>
                <tr>
                    <th>S. No.</th>
                    <th>MFI Name</th>
                    <th>Location</th>
                    <th>Director</th>
                    <th>Website</th>
                    <th>Current Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $args = array(
                        'role__in'      =>  array('investor'),
                        'orderby'       =>  'id',
                        'order'         => 'DESC',
                        'meta_query' => array(
                                array(
                                    'key'     => 'user_status',
                                    'value'   => 'Accepted',
                                    'compare' => '='
                                )
                        )
                    );
                    $blogusers = get_users( $args );
                    $i = 1;
                    // Array of WP_User objects.
                    if(!empty($blogusers)){
                    foreach ( $blogusers as $user ) {
                        //echo '<span>' . esc_html( $user->id ) . '</span>';
                        $user_id = esc_html($user->id);
                        $company_name = get_user_meta($user_id, 'nickname', true);
                        $company_location = get_user_meta($user_id, 'company_location', true);
                        $company_director = get_user_meta($user_id, 'company_director', true);
                        $company_website = get_user_meta($user_id, 'website', true);
                        $user_status = get_user_meta($user_id, 'user_status', true);
                        $site_url = get_site_url();
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><a href="<?=$site_url;?>/user-profile/?user_name=<?=$company_name; ?>"><?php echo $company_name; ?></a></td>
                            <td><?php echo $company_location; ?></td>
                            <td><?php echo $company_director; ?></td>
                            <td><?php echo $company_website; ?></td>
                            <td><span class="user-status" data-status="<?=$user_id; ?>"><?php echo $user_status; ?></span></td>
                            <td>
                                <?php 
                                    $acceptimg_url = esc_url( plugins_url( 'User-Investor/images/accept.png', dirname(FILE) ) );
                                    $rejectimg_url = esc_url( plugins_url( 'User-Investor/images/reject.png', dirname(FILE) ) );
                                    $edit_url = esc_url( plugins_url( 'User-Investor/images/edit_w.png', dirname(FILE) ) );
                                    $sendmail = esc_url( plugins_url( 'User-Investor/images/mail.png', dirname(FILE) ) );
                                    $accept_btn = '<div class="accept_btn">
                                        <p id="accept-p" data-value="Accepted" data-id ="'.$user_id.'">
                                                <img src="'.$acceptimg_url.'" id="accept" alt="Accepted">
                                                <span>Accept</span>
                                            </p>
                                        </div>';
                                    $reject_btn = '<div class="reject_btn">
                                        <p id="reject-p" data-value="Rejected" data-id ="'.$user_id.'">
                                                <img src="'.$rejectimg_url.'" id="reject" alt="Rejected">
                                                <span>Reject</span>
                                            </p>
                                            
                                        </div>';    
                                 ?>
                                 <div class="action_btns">
                                     
                                     <?php if($user_status == 'Rejected'){ 
                                                echo $accept_btn;
                                            }elseif ($user_status == 'Accepted') {
                                                echo $reject_btn;
                                            }else{
                                                echo $accept_btn;
                                                echo $reject_btn;
                                             } ?>
                                        <div class="edit_btn">
                                             <a href="<?php echo $site_url; ?>/wp-admin/admin.php?page=edit_user&user_id=<?php echo $user_id; ?>">
                                                 <img src="<?php echo $edit_url; ?>" alt="edit_btn">
                                                 <span>Edit</span>
                                             </a>
                                     </div>
                                     <div class="send-mail-btn">
                                         <span id="send_mail" data-id ="<?php echo $user_id; ?>">
                                             <img src="<?php echo $sendmail; ?>" id="sendmail" alt="Send mail">
                                             <span>Send email</span>
                                         </span>
                                     </div>  
                                 </div>             
                            </td>
                        </tr>
                    
                
            <?php $i++;}
        }else{
            echo "<tr><td>No data Found</td></tr>";
        }
        ?>
                </tbody>
            </tbody>
        </table>
    </div>
    