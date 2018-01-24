<div class="row">
	<div class="col-md-9">

		<div class="tabs tabs-bottom tabs-center tabs-simple">
			<ul class="nav nav-tabs nav-justified">
				<li class="nav-item active">
					<a class="nav-link" href="#tabsNavigationSimpleIcons1" data-toggle="tab">
						<span class="featured-boxes featured-boxes-style-6 p-0 m-0">
							<span class="featured-box featured-box-primary featured-box-effect-6 p-0 m-0">
								<span class="box-content p-0 m-0">
									<i class="icon-featured fa fa-user"></i>
								</span>
							</span>
						</span>									
						<p class="mb-0 pb-0">Individual Registration</p>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#tabsNavigationSimpleIcons2" data-toggle="tab">
						<span class="featured-boxes featured-boxes-style-6 p-0 m-0">
							<span class="featured-box featured-box-primary featured-box-effect-6 p-0 m-0">
								<span class="box-content p-0 m-0">
									<i class="icon-featured fa fa-building-o"></i>
								</span>
							</span>
						</span>									
						<p class="mb-0 pb-0">Corporate Registration</p>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="#tabsNavigationSimpleIcons3" data-toggle="tab">
						<span class="featured-boxes featured-boxes-style-6 p-0 m-0">
							<span class="featured-box featured-box-primary featured-box-effect-6 p-0 m-0">
								<span class="box-content p-0 m-0">
									<i class="icon-featured fa fa-gift"></i>
								</span>
							</span>
						</span>									
						<p class="mb-0 pb-0">Donate to Us</p>
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tabsNavigationSimpleIcons1">
					<form id="individual-form" method="POST" action="<?= @base_url('Registration/individual'); ?>" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">First Name</label>
									<input class="form-control" type="text" name="first_name" required/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Last Name</label>
									<input class="form-control" type="text" name="last_name" required/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Email Address</label>
									<input class="form-control" type = "email" name="email_address" required/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Phone</label>
									<input class="form-control" type="phone" name="phone_number" required/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Profession</label>
									<input class="form-control" type="text" name="profession" required/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Date of Birth</label>
									<input class="form-control" type="date" name="dob" required/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Company</label>
							<input class="form-control" type="text" name="company" required/>
						</div>
						<div class="form-group">
							<label class="control-label">Would you be interested in volunteering with Kilimani Project Foundation?</label>
							<div class="radio-custom radio-success">
								<input type="radio" id="volunteering_yes" name="volunteering" value="yes" data-target = ".activities">
								<label for="volunteering_yes">Yes</label>
							</div>

							<div class="radio-custom radio-warning">
								<input type="radio" id="volunteering_no" name="volunteering" value="no" data-target = ".activities">
								<label for="volunteering_no">No</label>
							</div>
						</div>	
						<div class="form-group activities">
							<label class="control-label">If so, what skills could you bring and/or activities would you like to participate in?</label>
							<textarea class="form-control" name="activities" rows = "8"></textarea>
						</div>
						<div class="form-group">
							<label class="control-label">Please upload a passport photo of yourself</label>
							<input type="file" name="passport_photo" class="form-control" required />
						</div>

						<div class="form-group">
							<input type="checkbox" name="certify" id = "certify" />
							<label class="control-label" for="certify">I hereby certify that the information I have provided is accurate and true.</label>
						</div>	

						<button class="btn btn-primary btn-block">Register Me!</button>							
					</form>
				</div>
				<div class="tab-pane" id="tabsNavigationSimpleIcons2">
					<form method="POST" enctype="multipart/form-data" action="<?= @base_url('Registration/corporate'); ?>">
						<div class="form-group">
							<label class="control-label">Name of Company</label>
							<input type="text" name="company_name" class="form-control" />
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label class="control-label">Type of Company</label>
									<select class="form-control" name="type_of_company">
										<option>Select company type</option>
										<option name = "Limited">Limited Company</option>
										<option name = "Society">Society</option>
										<option name = "NGO">NGO</option>
									</select>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<label class="control-label">Size of Company (No. of Employees)</label>
									<select class="form-control" name="size_of_company">
										<option>Select size of company</option>
										<option value="1 - 5">1 - 5</option>
										<option value="5 - 20">5 - 20</option>
										<option value="20 - 50">20 - 50</option>
										<option value="50+">50+</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Physical Address of Business</label>
							<input type="text" name="physical" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Names of individuals</label>
							<a class="btn btn-xs btn-default pull-right"><i class="fa fa-plus"></i>&nbsp;Add</a>
							<table class="table">
								<tbody id="names_of_individuals">
									<tr>
										<td>
											<input type="text" placeholder="First Name" name="first_name" class="form-control">
										</td>
										<td>
											<input type="text" placeholder="Last Name" name="last_name" class="form-control">
										</td>
										<td>
											<input type="text" placeholder="Email Address" name="email_address" class="form-control">
										</td>
										<td>
											<input type="text" placeholder="Phone Number" name="phone_number" class="form-control">
										</td>
										<td>
											<input type="date" placeholder="Date of Birth" name="dob" class="form-control">
										</td>
										<td>
											<input type="file" name="" class="form-control">
										</td>
										<td>
											<a><i class="fa fa-times"></i></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<div class="form-group">
							<label class="control-label">Would your company be interested in participating in CSR initiatives with Kilimani Project Foundation</label>
							<div class="radio-custom radio-success">
								<input type="radio" id="corporate_volunteering_yes" name="volunteering" value="yes" data-target = ".activities">
								<label for="corporate_volunteering_yes">Yes</label>
							</div>

							<div class="radio-custom radio-warning">
								<input type="radio" id="corporate_volunteering_no" name="volunteering" value="no" data-target = ".activities">
								<label for="corporate_volunteering_no">No</label>
							</div>
						</div>

						<div class="form-group activities">
							<label class="control-label">If so, what type of programs / activities / services would your company be willing to participate in?</label>
							<textarea class="form-control" name="corporate_activities" rows="8"></textarea>
						</div>

						<div class="form-group">
							<label class="control-label">Company Logo</label>
							<input class="form-control" type="file" name="company_logo">
						</div>

						<div class="form-group">
							<input type="checkbox" name="certify" id = "certify" required/>
							<label class="control-label" for="certify">I hereby certify that the information I have provided is accurate and true.</label>
						</div>	

						<button class="btn btn-primary btn-block">Register Us!</button>
					</form>
				</div>
				<div class="tab-pane" id="tabsNavigationSimpleIcons3">
					<?= @$this->load->view('Donations/index_v'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3" style="margin-top: 142px; border: 1px solid #DDDDDD;">
		<p>Kindly note that your membership ID and/or corporate certificate will be sent to the email address provided.</p>
		<p>In addition, the phone number provided will be used to add you to our members only WhatsApp group.</p>
		<p>Kindly allow up to 5 business days to be added to the WhatsApp group.</p>
	</div>
</div>