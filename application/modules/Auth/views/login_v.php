<?php if($this->session->flashdata('error')){?>
<div class="alert alert-danger">
  <strong>Log in failed!</strong> <?= @$this->session->flashdata('error'); ?>
</div>
<?php } ?>
<div class="row">
    <div class="col-md-6">
    <div class="featured-box featured-box-primary text-left mt-5">
											<div class="box-content">
                      <form action="<?= @base_url('Auth/authenticate'); ?>" id="frmSignIn" method="post">
													<div class="form-row">
														<div class="form-group col">
															<label>E-mail Address</label>
															<input type="text" value="" class="form-control form-control-lg" name = "email">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col">
															<a class="float-right" href="#">(Lost Password?)</a>
															<label>Password</label>
															<input type="password" value="" class="form-control form-control-lg" name = "password">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col-lg-6">
															<div class="form-check form-check-inline">
																<label class="form-check-label">
																	<input class="form-check-input" type="checkbox" id="rememberme" name="rememberme"> Remember Me
																</label>
															</div>
														</div>
														<div class="form-group col-lg-6">
															<input type="submit" value="Login" class="btn btn-primary float-right mb-5" data-loading-text="Loading...">
														</div>
													</div>
												</form>
											</div>
										</div>
    </div>
</div>