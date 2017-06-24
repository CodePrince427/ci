<body id="agents-page" class="theme-red">
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
                <div class="slimScrollDiv">
                    <ul class="list">
                        <li>
                            <a href="javascript:void(0)" class="menu-toggle waves-effect waves-block">
                                <i class="material-icons">list</i>
                                <span>Listing Process</span>
                            </a>
                            <ul class="ml-menu">
                                <ul class="nav nav-tabs main-nav" role="tablist">
                                    <?php for($i=0; $i < $steps_counter; $i++){ ?>
                                    <li class="waves-effect">
                                        <a href="<?php echo base_url();?>admin/edit_step/<?php echo $listing_steps[$i]['id'];?>" aria-expanded="false">
                                        <?php echo $listing_steps[$i]['step_name']; ?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="menu-toggle waves-effect waves-block">
                                <i class="material-icons">subject</i>
                                <span>Closing Process</span>
                            </a>
                            <ul class="ml-menu">
                                <ul class="nav nav-tabs main-nav" role="tablist">
                                    <!-- <?php for($i=0; $i < $steps_counter; $i++){ ?>
                                    <li class="waves-effect">
                                        <a href="<?php echo base_url();?>admin/edit_step/<?php echo $listing_steps[$i]['id'];?>" aria-expanded="false">
                                        <?php echo $listing_steps[$i]['step_name']; ?></a>
                                    </li>
                                    <?php } ?> -->
                                </ul>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
		
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs right-nav" role="tablist">
                <li class="waves-effect"><a href="<?=ADMIN_PATH?>listings">LISTINGS</a></li>
				<li class="active waves-effect"><a href="<?=ADMIN_PATH?>listing_steps">LISTING STEPS</a></li>
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
                                    <h2>Listing Steps</h2>
                                </div>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="<?php echo base_url();?>admin/add_step">New Step</a></li>
                                            <li><a href="#DelModal" data-toggle="modal">Delete Step</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="body">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active in fade" id="tab1">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h2>Listing Step Information:</h2>
                                            <br />
                                            <form action="<?php echo base_url();?>admin/update_step/<?php echo $this->uri->segment(3); ?>" method="POST" enctype="multipart/form-data">
                                                
												<?php $success = $this->session->flashdata('success'); if(!empty($success)){ ?>
												<div class="alert alert-success"><?php echo $success; unset($success); ?></div><?php } ?>
												<?php $error = $this->session->flashdata('error'); if(!empty($error)){ ?>
												<div class="alert alert-danger"><?php echo $error; unset($error); ?></div><?php } ?>
												
												<div class="form-group form-float form-group-lg">
													<div class="form-line">
														<input type="number" name="no" class="form-control" value="<?php echo $listing_step[0]['step_no']; ?>" autofocus required />
														<label class="form-label">Step No:</label>
													</div>
													<br>
													<div class="form-line">
														<input type="text" name="name" class="form-control" value="<?php echo $listing_step[0]['step_name']; ?>" required />
														<label class="form-label">Step Name:</label>
													</div>
													<br>
														<label class="form-label" style="text-align:left;">Content:</label>
														<textarea class="ckeditor" name="content"><?php echo $listing_step[0]['content']; ?></textarea> 
													<br><br>
													<div class="form-line">
														<input type="text" name="video" class="form-control" value="<?php echo $listing_step[0]['video']; ?>" />
														<label class="form-label">Video URL (Optional):</label>
													</div>
													<br>
													
													<input type="submit" name="add" class="btn btn-primary btn-lg waves-effect" value="UPDATE STEP" />
												</div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<!-- Delete Modal -->
		<div id="DelModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Delete Step</h4>
					</div>
					<div class="modal-body">
						<p>Are You Sure You Want to Delete this Step?</p>
						<div class="form-group">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<a href="<?php echo base_url();?>admin/delete_step/<?php echo $this->uri->segment(3);?>" class="btn btn-danger">Delete</a>
					</div>
				</div>

			</div>
		</div>
	</section>
<style>
#agents-page .form-group .form-line .form-label {
    margin-left: 10px;
}

#agents-page .form-group .form-line.focused .form-label {
  top: -15px;
  margin-left: 0;
}

#agents-page .form-group .form-control {
    padding: 0 10px !important;
    cursor: text;
}

#agents-page .form-group .demo-checkbox label {
    cursor: pointer;
}

#agents-page .form-group input[type="submit"] {
    cursor: pointer;
}
</style>