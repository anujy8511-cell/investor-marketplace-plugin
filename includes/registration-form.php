<div class="user_reg-from">

			<form action="" method="post" class="inve_form_reg" enctype="multipart/form-data">
				<div class="registartion-form">
					<h2 class="login-title">Register</h2>
					<?php 
					if(isset($_SESSION['success_msg']) && !empty($_SESSION['success_msg'])){
						echo $_SESSION['success_msg'];
					} 
					$_SESSION['success_msg'] = '';
					?>
				 <div class="frm-row col2">
					<div class="frm-col">
						<label for="company_name">
							<input type="text" name="company_name" id="company_name" placeholder="Name" class="input-text" required>	
						</label>		
					</div>
					<div class="frm-col">
						<label for="company_logo">MFI/Investor Logo
							<input type="file" name="company_logo" id="company_logo" accept="image/x-png,image/gif,image/jpeg">
						</label>

					</div>
				</div>
				<div class="frm-row col2">
					<div class="frm-col">
						<label for="company_location">
						   <input type="text" name="company_location" class="input-text" id="company_location" placeholder="Location" required>
						</label>
					</div>
					<div class="frm-col">
						<label for="reg_website">
						   <input type="text" name="company_web" class="input-text" id="" placeholder="Website"required>
						</label>
					</div>
				</div>
				<div class="frm-row col2">
					<div class="frm-col">
						<label for="company_mail">
							<input type="email" name="company_mail" id="company_mail" class="input-text" placeholder="Email Address"required>
						</label>
					</div>
					<div class="frm-col">
						<label for="company_director">
						   <input type="text" name="company_director" class="input-text" id="company_director" placeholder="Company Director"required>
						</label>
					</div>
				</div>
				<div class="frm-row col2">
					<div class="frm-col">
						<label for="Comapny_tag">
						   <textarea name="comapny_tag" id="Comapny_tag" class="input-textarea" placeholder="Company Products and Services" required></textarea>
						</label>
					</div>
					<div class="frm-col">
						<label for="company_description">
						   <textarea name="company_description" id="company_description" class="input-textarea" placeholder="Vision/Mission of the organisation" required></textarea>
						</label>
					</div>
				</div>
				<div class="frm-row col2">
					<div class="frm-col">
						<label for="comapny_role">
						   <select name="comapny_role" id="comapny_role">
							   	<option value="">Select Company Type</option>
							   	<option value="investor">Investor</option>
							   	<option value="nfi">MFI</option>
						   </select>
						   <?php //$user_roles =  wp_dropdown_roles(); ?>
						</label>
					</div>
					<div class="frm-col">
						
					</div>
				</div>	
				<div class="form-group">
					<button type="submit" class="reg_sbt_btn" name="sbt_user">Register</button>
				</div>
			</div>
			</form>
		</div>