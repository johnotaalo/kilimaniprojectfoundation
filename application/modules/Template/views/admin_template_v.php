<!DOCTYPE html>
<html>
<head>
	<!-- Basic -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	

	<title>Kilimani Project Foundation Membership Portal</title>	

	<meta name="keywords" content="Kilimani Project Foundation, Membership, Kilimani, KPF" />
	<meta name="description" content="Kilimani Project Foundation Nairobi Kenya">
	<meta name="author" content="kilimani.co.ke">

	<!-- Favicon -->
	<!-- <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png"> -->

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="<?= @$this->config->item('assets_url'); ?>vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= @$this->config->item('assets_url'); ?>vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= @$this->config->item('assets_url'); ?>vendor/animate/animate.min.css">
	<link rel="stylesheet" href="<?= @$this->config->item('assets_url'); ?>vendor/simple-line-icons/css/simple-line-icons.min.css">
	<link rel="stylesheet" href="<?= @$this->config->item('assets_url'); ?>vendor/owl.carousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= @$this->config->item('assets_url'); ?>vendor/owl.carousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?= @$this->config->item('assets_url'); ?>vendor/magnific-popup/magnific-popup.min.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?= @$this->config->item('assets_url'); ?>css/theme.css">
	<link rel="stylesheet" href="<?= @$this->config->item('assets_url'); ?>css/theme-elements.css">
	<link rel="stylesheet" href="<?= @$this->config->item('assets_url'); ?>css/theme-blog.css">
	<link rel="stylesheet" href="<?= @$this->config->item('assets_url'); ?>css/theme-shop.css">

	<!-- Current Page CSS -->
	<link rel="stylesheet" href="<?= @$this->config->item('assets_url'); ?>vendor/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="<?= @$this->config->item('assets_url'); ?>vendor/rs-plugin/css/layers.css">
	<link rel="stylesheet" href="<?= @$this->config->item('assets_url'); ?>vendor/rs-plugin/css/navigation.css">
	<link rel="stylesheet" href="<?= @$this->config->item('assets_url'); ?>vendor/circle-flip-slideshow/css/component.css">

	<?= @$page_css; ?>
	
	<!-- Demo CSS -->


	<!-- Skin CSS -->
	<link rel="stylesheet" href="<?= @$this->config->item('assets_url'); ?>css/skins/default.css">
	<script src="<?= @$this->config->item('assets_url'); ?>master/style-switcher/style.switcher.localstorage.js"></script> 

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="<?= @$this->config->item('assets_url'); ?>css/custom.css">

	<!-- Head Libs -->
	<script src="<?= @$this->config->item('assets_url'); ?>vendor/modernizr/modernizr.min.js"></script>

	<style type="text/css">
		
	</style>
</head>
<body>
	<div class="body">
		<header id="header" class="header-no-min-height" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 0, 'stickySetTop': '0'}">
				<div class="header-body">
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo">
										<a href="<?= @base_url(); ?>">
											<img alt="Porto" width="55" src="<?= @$this->config->item('assets_url'); ?>img/Logo.png">
										</a>
									</div>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row">
									<div class="header-nav header-nav-stripe">
										<div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
											<nav class="collapse">
												<ul class = "nav nav-pills" id="mainNav">
													<?php if($this->session->userdata('logged_in')){?>
                                                        <li class="">
                                                            <a class="nav-link" href="<?= @base_url('Admin'); ?>">
                                                                Dashboard
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a class="nav-link" href="<?= @base_url('Admin/members'); ?>">
                                                                Members
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a class="nav-link" href="<?= @base_url('Auth/signout'); ?>">
                                                                Log Out
                                                            </a>
                                                        </li>
                                                    <?php }else{ ?>
                                                        <li class="">
                                                            <a class="nav-link" href="<?= @base_url('Auth/login'); ?>">
                                                                Log In
                                                            </a>
                                                        </li>
                                                    <?php }?>
                                                    
												</ul>
											</nav>
										</div>
										<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
											<i class="fa fa-bars"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
		<div role="main" class="main">
														
			<section class="page-header page-header-color page-header-primary page-header-more-padding">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<h1><?= @$partialData['header']; ?></h1>
						</div>
						<div class="col-lg-6">
							<!-- <ul class="breadcrumb">
								<li><a href="#">Features</a></li>
								<li class="active">Header Color</li>
							</ul> -->
						</div>
					</div>
				</div>
			</section>
			<div class="container">
				<!-- Add tabs here -->
				<?php if ($partial): ?>
					<?php $this->load->view($partial, $partialData); ?>
				<?php else: ?>
					<?php show_404(); ?>
				<?php endif ?>
				<!-- Each tab is gonna contain the form -->
			</div>
		</div>
	</div>

	<!-- Need a Footer here -->
	<!-- Vendor -->
	<script src="<?= @$this->config->item('assets_url'); ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= @$this->config->item('assets_url'); ?>vendor/jquery.appear/jquery.appear.min.js"></script>
	<script src="<?= @$this->config->item('assets_url'); ?>vendor/jquery.easing/jquery.easing.min.js"></script>
	<script src="<?= @$this->config->item('assets_url'); ?>vendor/jquery-cookie/jquery-cookie.min.js"></script>
	<!-- <script src="master/style-switcher/style.switcher.js" id="styleSwitcherScript" data-base-path="" data-skin-src=""></script> -->
	<script src="<?= @$this->config->item('assets_url'); ?>vendor/popper/umd/popper.min.js"></script>
	<script src="<?= @$this->config->item('assets_url'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= @$this->config->item('assets_url'); ?>vendor/common/common.min.js"></script>
	<script src="<?= @$this->config->item('assets_url'); ?>vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
	<script src="<?= @$this->config->item('assets_url'); ?>vendor/isotope/jquery.isotope.min.js"></script>
	<script src="<?= @$this->config->item('assets_url'); ?>vendor/owl.carousel/owl.carousel.min.js"></script>
	<script src="<?= @$this->config->item('assets_url'); ?>vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="<?= @$this->config->item('assets_url'); ?>vendor/vide/vide.min.js"></script>

	<?= @$page_js; ?>
	
	<!-- Theme Base, Components and Settings -->
	<script src="<?= @$this->config->item('assets_url'); ?>js/theme.js"></script>
	
	<!-- Current Page Vendor and Views -->
	<script src="<?= @$this->config->item('assets_url'); ?>vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>		<script src="<?= @$this->config->item('assets_url'); ?>vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>		<script src="<?= @$this->config->item('assets_url'); ?>vendor/circle-flip-slideshow/js/jquery.flipshow.min.js"></script>		<script src="<?= @$this->config->item('assets_url'); ?>js/views/view.home.js"></script>
	
	<!-- Theme Custom -->
	<script src="<?= @$this->config->item('assets_url'); ?>js/custom.js"></script>
	
	<!-- Theme Initialization Files -->
	<script src="<?= @$this->config->item('assets_url'); ?>js/theme.init.js"></script>

	<?php if(isset($javascript_file)) { ?>
		<?php $this->load->view($javascript_file, $javascript_data); ?>
	<?php } ?>
</body>
</html>