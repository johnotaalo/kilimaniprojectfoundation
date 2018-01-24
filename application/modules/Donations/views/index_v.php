<div class="row">
	<div class="col-md-12">
		<form method="POST" action="<?= @base_url('donations/donate'); ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label class="col-form-label">Are you a member of Kilimani Project Foundation?</label>&nbsp;
						<input type="radio" id="member_yes" name="member" value="yes">
						<label for="member_yes">Yes</label>
						&nbsp;&nbsp;
						<input type="radio" id="member_no" name="member" value="no">
						<label for="member_no">No</label>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="firstname" class="col-form-label">First Name</label>
						<input class="form-control" type="text" name="firstname" id="firstname"></input>			
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="lastname" class="col-form-label">Last Name</label>
						<input class="form-control" type="text" name="lastname" id="lastname"></input>				
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="email" class="col-form-label">Email Address</label>
						<input class="form-control" type="email" name="email" id="email"></input>				
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="phone" class="col-form-label">Phone Number</label>
						<input class="form-control" type="text" name="phone" id="phone"></input>				
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="activities" class="col-form-label"> Is there a specific program / initiative that you would like your donation to go towards?</label>
				<textarea name="activities" id="activities" class="form-control"></textarea>			
			</div>

			<button class="btn btn-primary btn-block">Complete Donation Request</button>
		</form>
	</div>
</div>