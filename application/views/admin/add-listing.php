<body id="admin-page" class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
	
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
	
    <!-- Search Bar -->
	<form action="<?php echo base_url();?>admin/search_listing" method="POST">
		<div class="search-bar">
			<div class="search-icon">
				<i class="material-icons">search</i>
			</div>
			<?php
				echo "<input id='id' type='text' name='listings' placeholder='SEARCH LISTINGS' />";
			?>
			<ul>
				<div id="result"></div>
			</ul>
			<div class="close-search">
				<i class="material-icons">close</i>
			</div>
		</div>
	</form>
    <!-- #END# Search Bar -->
	
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?=ADMIN_PATH?>listings">MAIN ADMIN PORTAL PAGE</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
	
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <div class="menu">
                <ul class="nav nav-tabs main-nav" role="tablist">
					<?php for($i=0; $i < count($listing_list); $i++){ ?>
					<li class="waves-effect">
						<a href="<?php echo base_url();?>admin/edit_listing/<?php echo $listing_list[$i]['id'];?>" aria-expanded="false">
						<?php echo $listing_list[$i]['address']; ?></a>
					</li>
					<?php } ?>
                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
		
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs right-nav" role="tablist">
                <li class="active waves-effect"><a href="<?=ADMIN_PATH?>listings">LISTINGS</a></li>
				<li class="waves-effect"><a href="<?=ADMIN_PATH?>listing_steps">LISTING STEPS</a></li>
                <li class="waves-effect"><a href="<?=ADMIN_PATH?>agents">AGENTS</a></li>
                <li class="waves-effect"><a href="<?=HTTP_PATH?>admin/logout">LOG OUT</a></li>
            </ul>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>CODE: <strong><?php echo $listing_code; ?></strong></h2>
									
									<?php $success = $this->session->flashdata('success'); if(!empty($success)){ ?>
									<div class="alert alert-success"><?php echo $success; unset($success); ?></div><?php } ?>
									<?php $error = $this->session->flashdata('error'); if(!empty($error)){ ?>
									<div class="alert alert-danger"><?php echo $error; unset($error); ?></div><?php } ?>
									
                                </div>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="<?php echo base_url();?>admin/add_listing">New</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="body">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab1">
									<form action="<?php echo base_url();?>admin/insert_listing" class="" method="POST" enctype="multipart/form-data">
										<input type="hidden" name="code" value="<?php echo $listing_code; ?>" />
										<div class="row">
											<div class="col-lg-6">
												<strong>Property Information:</strong>
												<br><br>
												<div class="form-group form-float form-group-lg">
													<div class="form-line">
														<input type="text" class="form-control" name="address" autofocus required />
														<label class="form-label">Street Address:</label>
													</div>
													<br>
													<div class="form-line">
														<input type="text" class="form-control" name="city" required />
														<label class="form-label">City/Town:</label>
													</div>
													<br>
													<div class="form-line">
														<input type="text" class="form-control" name="state" required />
														<label class="form-label">State:</label>
													</div>
													<br>
													<div class="form-line">
														<input type="text" class="form-control" name="zipcode" required />
														<label class="form-label">Zip Code:</label>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<strong>Seller Information:</strong>
												<br><br>
												<div class="form-group form-float form-group-lg">
													<div class="form-line">
														<input type="text" class="form-control" name="name" required />
														<label class="form-label">Full Name(s):</label>
													</div>
													<br>
													<div class="form-line">
														<input type="email" class="form-control" name="email" required />
														<label class="form-label">Seller's Email:</label>
													</div>
													<br>
													<div class="form-line">
														<input type="text" class="form-control" name="cell" required />
														<label class="form-label">Cell Phone Number:</label>
													</div>
													<br>
													<div class="demo-checkbox">
														<input type="checkbox" id="md_checkbox_26" name="sms" class="filled-in chk-col-blue" checked />
														<label for="md_checkbox_26">Send status updates via SMS</label>
													</div>
												</div>
											</div>
										</div>
										<hr />
										<div class="row">
											<div class="col-lg-6">
												<strong>Listing Agent:</strong>
												<br /><br />
												<select class="form-control show-tick" name="agent" required >
													<option value="">-- Please choose from the drop down --</option>
													<?php for($j=0; $j < count($agent_list); $j++){ ?>
													<option value="<?php echo $agent_list[$j]['id']; ?>" ><?php echo $agent_list[$j]['name']; ?></option>
													<?php } ?>
												</select>
												<br />
											</div>
											<div class="col-lg-6">
												<strong>Listing Status Information:</strong>
												<br /><br />
												<select class="form-control show-tick" name="process" required >
													<option value="">-- Please choose from the drop down --</option>
													<option value="Listing Process">Listing Process</option>
												</select>
												<br /><br />
												<select class="form-control show-tick" name="step" required >
													<option value="">-- Please choose from the drop down --</option>
													<?php for($k=0; $k<$steps_counter; $k++){ ?>
													<option value="<?php echo $listing_steps[$k]['id']; ?>" >
														Step <?php echo $listing_steps[$k]['step_no']; ?>: <?php echo $listing_steps[$k]['step_name']; ?>
													</option>
													<?php } ?>
												</select>
											</div>
										</div>
										<hr />
										<div class="row">
											<div class="col-lg-6">
												<strong>Listing Photo:</strong>
												<br><br>
												<div class="form-group form-float form-group-lg">
													<div class="form-line">
														<input type="file" class="form-control" name="pic" required accept="image/*" />
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<strong>Listing Price:</strong>
												<br><br>
												<div class="form-group form-float form-group-lg">
													<div class="form-line">
														<input type="text" class="form-control" name="price" required />
														<label class="form-label">Listing Price: $</label>
													</div>
												</div>
											</div>
										</div>
										<hr />
										<div class="row">
											<div class="col-lg-12">
												<button type="submit" class="btn btn-primary btn-lg waves-effect">NEXT <span class="glyphicon glyphicon-chevron-right"></span></button>
											</div>
										</div>
									</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>