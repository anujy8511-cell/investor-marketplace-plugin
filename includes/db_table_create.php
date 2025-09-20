<?php 
		
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
		$mfp_portfolio_summary			=	 $wpdb->prefix.'mfp_portfolio_summary';
		
		
		/*
		 * We'll set the default character set and collation for this table.
		* If we don't do this, some characters could end up being converted
		* to just ?'s when saved in our table.
		*/
		$charset_collate = '';
		
		if ( ! empty( $wpdb->charset ) ) {
			$charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";
		}
			
		if ( ! empty( $wpdb->collate ) ) {
			$charset_collate .= " COLLATE {$wpdb->collate}";
		}
		
		$tbl1 = "CREATE TABLE IF NOT EXISTS `$mfp_infrastructure` ( 
			`id` int(11) NOT NULL auto_increment,
		    `user_id` int(11) default NULL,
			`infra_no_personnel` int(11) NOT NULL, 
			`infra_active_female` int(11) NOT NULL,
			`infra_staff_stable` int(11) NOT NULL, 
			`infra_no_managers` int(11) NOT NULL,  
			`infra_manager_female` int(11) NOT NULL, 
			`infra_loan_officers` int(11) NOT NULL, 
			`infra_officer_female` int(11) NOT NULL,
			`infra_board_member` int(11) NOT NULL, 
			`infra_board_female` int(11) NOT NULL, 
			`infra_staff_leave` int(11) NOT NULL,
			`infra_branches` int(11) NOT NULL, 
			`infra_no_agents` int(11) NOT NULL,
			`infra_agents_active30` int(11) NOT NULL, 
			`infra_no_atms` int(11) NOT NULL,
			`infra_atm_active30` int(11) NOT NULL,
			`infra_no_merchant` int(11) NOT NULL,
			`infra_merchants_active30` int(11) NOT NULL,
			`infra_no_sub_branch` int(11) NOT NULL,
			`infra_branch_active30` int(11) NOT NULL,
			`infra_no_rov_staff` int(11) NOT NULL,
			`infra_roving_active30` int(11) NOT NULL,
			PRIMARY KEY (`id`)  
			);";
		
		$tbl2 = "
		CREATE TABLE IF NOT EXISTS `$mfp_clients` (
			`id` int(11) NOT NULL auto_increment,
		    `user_id` int(11) default NULL,
			`no_act_brw_client` bigint(20) NOT NULL, 
			`abi_male_clients` int(11) NOT NULL,
			`abi_female_clients` int(4) NOT NULL, 
			`abi_legal_ent_clients` int(11) NOT NULL, 
			`abi_location_clients` varchar(255) NULL, 
			`abi_new_brws_clients` int(11) NOT NULL, 
			`gross_loan_port_clients` bigint(20) NOT NULL, 
			`glp_male_clients` int(11) NOT NULL,
			`glp_female_clients` int(4) NOT NULL, 
			`glp_legal_ent_clients` int(11) NOT NULL, 
			`glp_location_clients` varchar(255) NULL, 
			`no_loan_outs_clients` bigint(20) NOT NULL, 
			`nlo_male_clients` int(11) NOT NULL,
			`nlo_female_clients` int(4) NOT NULL, 
			`nlo_legal_ent_clients` int(11) NOT NULL, 
			`nlo_location_clients` varchar(255) NULL,
			`nlo_no_brws_clients` int(11) NOT NULL,
			PRIMARY KEY (`id`) 
		);";
		$tbl3 = "
			CREATE TABLE IF NOT EXISTS `$mfp_products` (
			`id` int(11) NOT NULL  auto_increment,
			`user_id` int(11) NOT NULL,
			`no_trans_product` int(11)  NOT NULL,
			`nt_agents_products` int(11)  NOT NULL,
			`nt_atms_products` int(11)  NOT NULL,
			`nt_internet_products` int(11)  NOT NULL,
			`nt_mob_bank_products` int(11)  NOT NULL,
			`nt_mer_pos_products` int(11)  NOT NULL,
			`nt_rov_staff_products` int(11)  NOT NULL,		
			`nt_sub_branch_products` int(11)  NOT NULL,
			`value_trans_product` int(11)  NOT NULL,
			`vt_agents_products` int(11)  NOT NULL,
			`vt_atms_products` int(11)  NOT NULL,
			`vt_internet_products` int(11)  NOT NULL,
			`vt_mob_bank_products` int(11)  NOT NULL,
			`vt_mer_pos_products` int(11)  NOT NULL,
			`vt_rov_staff_products` int(11)  NOT NULL,		
			`vt_sub_branch_products` int(11)  NOT NULL,
		PRIMARY KEY (`id`)
		);";
		$tbl4 = "
		CREATE TABLE IF NOT EXISTS `$mfp_credit_products` (
			`id` int(10) NOT NULL  auto_increment,
			`user_id` int(11) NOT NULL,
			`no_loan_outs_cproduct` int(11) NOT NULL,
			`nlo_microenterprise_cpro` int(11) NOT NULL,
			`nlo_s&m_enterp_cpro` int(11) NOT NULL,
			`nlo_lcorpo_cpro` int(11) NOT NULL,
			`nlo_consumption_cpro` int(11) NOT NULL,
			`nlo_mortgage_cpro` int(11) NOT NULL,
			`nlo_other_house_cpro` int(11) NOT NULL,
			`nlo_indvis_cpro` int(11) NOT NULL,
			`nlo_solid_cpro` int(11) NOT NULL,
			`nlo_vallage_shg_cpro` int(11) NOT NULL,
			`nlo_loan_pdisb_cpro` int(11) NOT NULL,
			`nlo_no_loan_disb_cpro` int(11) NOT NULL,
			`gloan_portfolio_cproduct` int(11) NOT NULL,
			`glp_microenterprise_cpro` int(11) NOT NULL,
			`glp_s&m_enterp_cpro` int(11) NOT NULL,
			`glp_lcorpo_cpro` int(11) NOT NULL,
			`glp_consumption_cpro` int(11) NOT NULL,
			`glp_mortgage_cpro` int(11) NOT NULL,
			`glp_other_house_cpro` int(11) NOT NULL,
			`glp_indvis_cpro` int(11) NOT NULL,
			`glp_solid_cpro` int(11) NOT NULL,
			`glp_vallage_shg_cpro` int(11) NOT NULL,
		PRIMARY KEY (`id`)
		) ;";
		$tbl5 = "
		CREATE TABLE IF NOT EXISTS `$mfp_deposit_products` (
			`id` int(10) NOT NULL  auto_increment,
			`user_id` int(11) NOT NULL,
			`no_depoditors_dproduct` int(11) NOT NULL,
			`nd_dfc_dpro` int(11) NOT NULL,
			`nd_dffi_dpro` int(11) NOT NULL,
			`nd_dfg_dpro` int(11) NOT NULL,
			`nd_dd_dpro` int(11) NOT NULL,
			`nd_td_dpro` int(11) NOT NULL,
			`nd_cd_dpro` int(11) NOT NULL,
			`deposits_value_dproduct` int(11) NOT NULL,
			`dv_dfc_dpro` int(11) NOT NULL,
			`dv_dffi_dpro` int(11) NOT NULL,
			`dv_dfg_dpro` int(11) NOT NULL,
			`dv_dd_dpro` int(11) NOT NULL,
			`dv_td_dpro` int(11) NOT NULL,
			`dv_cd_dpro` int(11) NOT NULL,
		PRIMARY KEY (`id`)
		);";
		
		$tbl6 =
		"CREATE TABLE IF NOT EXISTS `$mfp_delinquency` (
			`id` int(10) NOT NULL  auto_increment,
			`user_id` int(11) NOT NULL,
			`gloan_port_deli` int(11) NOT NULL,
			`glp_current_deli` int(11) NOT NULL,
			`glp_rene_loans_deli` int(11) NOT NULL,
			`glp_par_1to30_deli` int(11) NOT NULL,
			`glp_par_30_deli` int(11) NOT NULL,
	        `glp_par_31to90_deli` int(11),
	        `glp_par_90_deli` int(11),
	        `glp_par_91to180_deli` int(11),
	        `glp_par_180_deli` int(11),
	        `glp_woffs_deli` int(11),
			PRIMARY KEY (`id`)
		);";
		
		$tbl7 =
		"CREATE TABLE IF NOT EXISTS `$mfp_non_financial_service` (
			`id` int(10) NOT NULL  auto_increment,
			`user_id` int(11) NOT NULL,
			`ent_so_non_fs` int(11) NOT NULL,
			`edu_so_non_fs` int(11) NOT NULL,
			`women_eso_non_fs` int(11) NOT NULL,
			PRIMARY KEY (`id`)
		);";
		
		$tbl8 =
		"CREATE TABLE IF NOT EXISTS `$mfp_enterprises_financed` (
			`id` int(10) NOT NULL  auto_increment,
			`user_id` int(11) NOT NULL,
			`no_ep_ent_financed` int(11) NOT NULL,
			`no_stup_ent_financed` int(11) NOT NULL,
			`no_clsmaple_ent_financed` int(11) NOT NULL,
			PRIMARY KEY (`id`)
		);";
		$tbl9 = "CREATE TABLE IF NOT EXISTS `$mfp_job_creation` (
			`id` int(10) NOT NULL  auto_increment,
			`user_id` int(11) NOT NULL,
			`no_worker_jobcres` int(11) NOT NULL,
			`no_ent_sample_jobcres` int(11) NOT NULL,
			PRIMARY KEY (`id`)
		);";
		$tbl10 =
		"CREATE TABLE IF NOT EXISTS `$mfp_poverty_outreach` (
			`id` int(10) NOT NULL  auto_increment,
			`user_id` int(11) NOT NULL,
			`no_worker_poverty` int(11) NOT NULL,
			PRIMARY KEY (`id`)
		);";
		$tbl11	=
		"CREATE TABLE IF NOT EXISTS `$mfp_balance_sheet` (
			`id` int(10) NOT NULL  auto_increment,
			`user_id` int(11) NOT NULL,
			`cce_asset_bal` int(10) NOT NULL,
			`nlp_asset_bal` int(10)  NOT NULL,
			`glp_asset_bal` int(10)  NOT NULL,
			`ila_asset_bal` int(10)  NOT NULL,
			`other_asset_bal` int(10)  NOT NULL,
			`nfa_asset_bal` int(10)  NOT NULL,
			`total_asset_bal` int(10)  NOT NULL,
			`deposit_liab_bal` int(10)  NOT NULL,
			`borrow_liab_bal` int(10)  NOT NULL,
			`subd_liab_bal` int(10)  NOT NULL,
			`ostfl_liab_bal` int(10)  NOT NULL,
			`other_liab_bal` int(10)  NOT NULL,
			`total_liab_bal` int(10)  NOT NULL,
			`paid_equity_bal` int(10)  NOT NULL,
			`donate_equity_bal` int(10)  NOT NULL,
			`retain_equity_bal` int(10)  NOT NULL,
			`other_equity_bal` int(10)  NOT NULL,
			`total_equity_bal` int(10)  NOT NULL,
			`total_bal_sheet_bal` int(10)  NOT NULL,
			`total_portfolio_bal` int(10)  NOT NULL,
			`growth_portfolio_bal` int(10)  NOT NULL,
			`par30_resch_bal` int(10)  NOT NULL,
			`write_off_bal` int(10)  NOT NULL,
			`net_income_bal` int(10)  NOT NULL,			
			`op_self_suff_bal` int(10)  NOT NULL,
			`debt_bal` int(10)  NOT NULL,
			`no_borrw_bal` int(10)  NOT NULL,

			PRIMARY KEY (`id`)
		);";
		$tbl12 =
		"CREATE TABLE IF NOT EXISTS `$mfp_income_statement` (
			`id` int(10) NOT NULL  auto_increment,
			`user_id` int(11) NOT NULL,
			`interest_income` int(11) NOT NULL,
			`fee_other_income` int(11) NOT NULL,
			`total_income` int(11) NOT NULL,
			`operating_expense` int(11) NOT NULL,
			`operating_admin_expense` int(11) NOT NULL,
			`total_expenses` int(11) NOT NULL,
			`net_income_profit` int(11) NOT NULL,			
			PRIMARY KEY (`id`)
		);";
		$tbl13 =
		"CREATE TABLE IF NOT EXISTS `$msp_social_goals` (
			`id` int(10) NOT NULL  auto_increment,
			`user_id` int(11) NOT NULL,
			`sg_target_market` varchar(255) NOT NULL,
			`sg_inst_pursue` varchar(255) NOT NULL,
			`sg_pov_level` varchar(255) NOT NULL,
			`sg_does_meas_plevel` varchar(255) NOT NULL,
			`sg_tool_meas_plevel` varchar(255) NOT NULL,
			PRIMARY KEY (`id`)
		);";
		$tbl14 =
		"CREATE TABLE IF NOT EXISTS `$msp_governance_hr` (
			`id` int(10) NOT NULL  auto_increment,
			`user_id` int(11) NOT NULL,
			`g_hr_social_goals` varchar(255) NOT NULL,
			`g_hr_setup_board` varchar(255) NOT NULL,
			`g_hr_member_eligibility` varchar(255) NOT NULL,
			`g_hr_staff_inc` varchar(255) NOT NULL,
			`g_hr_how_inc` varchar(255) NOT NULL,
			`g_hr_human_policy` varchar(255) NOT NULL,
			PRIMARY KEY (`id`)
		);";
		$tbl15 =
		"CREATE TABLE IF NOT EXISTS `$msp_products_services` (
			`id` int(10) NOT NULL  auto_increment,
			`user_id` int(11) NOT NULL,
			`offer_creproducts` varchar(255) NOT NULL,
			`offer_income_gloan` varchar(255) NOT NULL,
			`offer_nonincome_gloan` varchar(255) NOT NULL,
			`types_saving_products` varchar(255) NOT NULL,
			`voluntary_sav_products` varchar(255) NOT NULL,
			`compulsary_insurance` varchar(255) NOT NULL,
			`type_compulsary_insurance` varchar(255) NOT NULL,
			`voluntary_insurance` varchar(255) NOT NULL,
			`type_voluntary_insurance` varchar(255) NOT NULL,
			`financial_services` varchar(255) NOT NULL,
			`type_financial_services` varchar(255) NOT NULL,
			`nonfinancial_services` varchar(255) NOT NULL,
			`type_nonfinancial_services` varchar(255) NOT NULL,
			`nonfinancial_women_empower` varchar(255) NOT NULL,
			`women_emower_services` varchar(255) NOT NULL,
			`nonfinancial_education` varchar(255) NOT NULL,
			`nonfinancial_education_services` varchar(255) NOT NULL,
			`nonfinacial_health` varchar(255) NOT NULL,
			`nonfinancial_health_services` varchar(255) NOT NULL,
			PRIMARY KEY (`id`)
		);";
		$tbl16 =
		"CREATE TABLE IF NOT EXISTS `$msp_client_protection` (
			`id` int(10) NOT NULL  auto_increment,
			`user_id` int(11) NOT NULL,
			`clientp_capacity` varchar(255) NOT NULL,
			`clientp_indebt` varchar(255) NOT NULL,
			`clientp_discloses` varchar(255) NOT NULL,
			`clientp_discloses_annual` varchar(255) NOT NULL,
			`clientp_spell_coc` varchar(255) NOT NULL,
			`clientp_viol_coc` varchar(255) NOT NULL,
			`clientp_repo_system` varchar(255) NOT NULL,
			`clientp_data_privacy` varchar(255) NOT NULL,
			`clientp_interest_rate` varchar(255) NOT NULL,			
			PRIMARY KEY (`id`)
		);";
		$tbl17 =
		"CREATE TABLE IF NOT EXISTS `$msp_environment` (
			`id` int(10) NOT NULL  auto_increment,
			`user_id` int(11) NOT NULL,
			`env_policies` varchar(255) NOT NULL,
			`env_products` varchar(255) NOT NULL,		
			PRIMARY KEY (`id`)
		);";
		$tbl18 =
		"CREATE TABLE IF NOT EXISTS `$mfp_portfolio_summary` (
			`id` int(10) NOT NULL  auto_increment,
			`user_id` int(11) NOT NULL,
			`ave_no_staff` varchar(255) NOT NULL,
			`no_active_borrowers` varchar(255) NOT NULL,		
			`no_active_savers` varchar(255) NOT NULL,		
			`no_total_savings` varchar(255) NOT NULL,		
			`no_total_income` varchar(255) NOT NULL,		
			`loan_loss_rate` varchar(255) NOT NULL,		
			`total_assets_naira` varchar(255) NOT NULL,		
			`total_equity_naira` varchar(255) NOT NULL,		
			`total_liabilities_naira` varchar(255) NOT NULL,		
			`total_portfolio_summary` varchar(255) NOT NULL,		
			`portfolio_at_risk` varchar(255) NOT NULL,		
			`per_grth_portfolio` varchar(255) NOT NULL,		
			`loan_loss_rate_per` varchar(255) NOT NULL,		
			`debt_equity_ratio` varchar(255) NOT NULL,		
			`opn_self_sufficiency` varchar(255) NOT NULL,		
			PRIMARY KEY (`id`)
		);";
		
		//ENGINE=InnoDB $charset_collate;
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		
		dbDelta( $tbl1 );
		dbDelta( $tbl2 );
		dbDelta( $tbl3 );
		dbDelta( $tbl4 );
		dbDelta( $tbl5 );
		dbDelta( $tbl6 );
		dbDelta( $tbl7 );
		dbDelta( $tbl8 );
		dbDelta( $tbl9 );
		dbDelta( $tbl10);
		dbDelta( $tbl11);
		dbDelta( $tbl12);
		dbDelta( $tbl13);
		dbDelta( $tbl14);
		dbDelta( $tbl15);
		dbDelta( $tbl16);
		dbDelta( $tbl17);
		dbDelta( $tbl18);
		
		update_option('attr_table_updated','attr_table_done_updated');
		
