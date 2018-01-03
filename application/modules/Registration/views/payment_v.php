<?php if($this->session->flashdata('success')): ?>
	<div class="alert alert-success" role = "alert">
		<strong>Well done!</strong> <?= @$this->session->flashdata('success'); ?>
	</div>
<?php endif; ?>