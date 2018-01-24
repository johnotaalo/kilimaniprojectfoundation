<div class="row">
	<div class="col-md-5">
		<p><u>Instruction</u></p>
		<ul>
			<li>Your donation number is <b><?= @$donation_no; ?></b></li>
			<li>Enter the amount you would like donate</li>
			<li>Click on the 'Make Donation' button</li>
			<li>You will receive a message on your phone asking you to enter your MPESA pin</li>
		</ul>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label class="control-label">Donation Amount</label>
			<input class="form-control" type="number" name="donation_amount" value="10000" max="70000" />
		</div>


		<button class="btn btn-primary">Make Donation</button>
	</div>
</div>