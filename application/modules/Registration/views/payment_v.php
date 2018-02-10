<?php if($this->session->flashdata('success')): ?>
	<div class="alert alert-success" role = "alert">
		<strong>Well done!</strong> <?= @$this->session->flashdata('success'); ?>
	</div>
<?php endif; ?>

<center><h2>PAYMENT INSTRUCTIONS</h2></center>

<div class="row">
	<div class="col-md-6">
		<h3>To pay via MPesa Online Checkout</h3>
		<ol>
			<li>Have your phone close to you</li>
			<li>Click on the pay now button below. If successful, a screen will pop up asking you to enter you will the following message:
				<blockquote>
					<p>Do you want to pay KSHS. 1200 to API Management-Safaricom test 12 Account no. <?= @$member->membership_no; ?></p>
				</blockquote>
			</li>
			<li>Enter your MPESA PIN and then hit OK.</li>
			<li>You will then receive a message from MPESA indicating that the transaction has been completed or cancelled depending on your account balance.</li>
			<li>That's it!</li>
		</ol>
		<!-- <button id="make-payment" href="#" class="btn btn-sm mt-4 btn-primary"><i class="fa fa-spin"></i>&nbsp;Make Payment!</button><span class="arrow hlb" style="top: -15px; left: -24px;"></span> -->

		<!-- <button id="confirm-transaction" class="btn btn-sm mt-4 btn-success"><i class="fa fa-spin"></i>&nbsp;Confirm Transaction</button> -->
	</div>
	<div class="col-md-6">
		<h3>If you would like to pay using another Safaricom number</h3>

		<p>Please enter your transaction code to complete the payment</p>
		<div class="form-group">
			<input name = "code" type="text" class="form-control" placeholder = "Transaction Code">
			<a class = 'btn btn-primary btn-sm mt-2' href = '#' id = 'add-code'><i class="fa fa-spin"></i>&nbsp;Add code</a>
		</div>
	</div>
</div>