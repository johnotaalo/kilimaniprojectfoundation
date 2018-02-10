<div class="row">
	<div class="col-md-12">
		<div class="featured-box featured-box-primary text-left">
			<div class="box-content">
				<div class="row">
					<div class="col-md-12">
						<a href = '<?= @base_url('Admin/addmember'); ?>' class = 'btn btn-primary btn-xs mb-2 float-right'><i class = 'fa fa-plus'></i>&nbsp;Add Member</a>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered table-striped" id = "members-table" width="100%">
							<thead>
								<th>No.</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Date Joined</th>
								<!-- <th>Action</th> -->
								<th>Transaction Code</th>
							</thead>
							<tbody>
								<?php foreach($members as $member):?>
								<tr>
									<td><?= @$member->membership_no; ?></td>
									<td><?= @$member->firstname . " " . $member->lastname; ?></td>
									<td><?= @$member->email; ?></td>
									<td>+<?= @$member->phone; ?></td>
									<td><?= @date('d.M.Y', strtotime($member->created_at)); ?></td>
									<td><a href="#" class="transaction-code" data-name = "transaction" data-type="text" data-pk="<?= @$member->id; ?>" data-url="<?= @base_url('Admin/addTransactionCode'); ?>" data-title="Enter Transaction"><?= @$member->first_time_code; ?></a></td>
									<!-- <td>
										<div class="dropdown show">
											<a class="btn btn-default btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Dropdown link
											</a>

											<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</td> -->
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>