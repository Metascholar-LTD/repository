<section class="page" style="padding-top:100px;background-color:#F0F4F9 !important;">
	<div class="container text-center">
	<div class=" row justify-content-center">
		<div class="col-sm-7 p-5 shadow-lg curve" style="background-color:#ffffff !important;">

				<div>
					<h3>Password Reset </h3>
					<small class="text-muted">
						Please enter the email address you registered with
					</small>
				</div>
				<hr />
				<div class="row justify-content-center"> <!-- Use 'justify-content-center' to center the row horizontally -->
					<div class="col-md-8">
						<?php 
							$this::display_page_errors(); 
						?>
						<form method="post" action="<?php print_link("passwordmanager/postresetlink?csrf_token=" . Csrf::$token); ?>">
							<div class="row">
								<div class="col-9">
									<input value="<?php echo get_form_field_value('email'); ?>" placeholder="Enter Your Email Address" required="required" class="form-control default" name="email" type="email" />
								</div>
								<div class="col-3">
									<button class="btn btn-success" type="submit"> Send </button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<br />
				<div class="text-info">
					You will recieve an email with a link to access the information required for your password.
				</div>
			</div>
		</div>
	</div>
</section>
<style>
	.curve{
        border-radius: 20px;
    }
</style>



