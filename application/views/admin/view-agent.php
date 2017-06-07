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
	<form action="<?php echo base_url();?>admin/search_agent" method="POST">
		<div class="search-bar">
			<div class="search-icon">
				<i class="material-icons">search</i>
			</div>
			<?php
				echo "<input id='id' type='text' name='agents' placeholder='SEARCH AGENTS' />";
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
                <a class="navbar-brand" href="<?=ADMIN_PATH?>agents">AGENTS PAGE</a>
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
                    <?php for($i=0; $i < count($agent_list); $i++){ ?>
                    <li class="waves-effect">
						<a href="<?php echo base_url();?>admin/edit_agent/<?php echo $agent_list[$i]['id'];?>" aria-expanded="false"><?php echo $agent_list[$i]['name']; ?></a>
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
                <li class="waves-effect"><a href="<?=ADMIN_PATH?>listings">LISTINGS</a></li>
				<li class="waves-effect"><a href="<?=ADMIN_PATH?>listing_steps">LISTING STEPS</a></li>
                <li class="active waves-effect"><a href="<?=ADMIN_PATH?>agents">AGENTS</a></li>
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
                                    <h2>Agents</h2>
                                </div>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="<?php echo base_url();?>admin/add_agent">New Agent</a></li>
                                            <li><a href="#DelModal" data-toggle="modal">Delete Agent</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="body">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active in fade" id="tab1">
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4">
                                            <h2>Listing Agent Information:</h2>
											<div class="crop-agent">
												<img src="<?=ASSETS_ADMIN_DIR_USER?><?php echo $agent[0]['pic']; ?>" alt="" class="img-responsive img-thumbnail"/>
											</div>
                                            <br />
                                            <form action="<?php echo base_url();?>admin/update_agent/<?php echo $this->uri->segment(3);?>" id="frmFileUpload" class="dropzone dz-clickable" method="POST" enctype="multipart/form-data">
                                                <div class="form-group form-float form-group-lg">
													<div class="form-line">
														<input type="text" name="name" class="form-control" value="<?php echo $agent[0]['name']; ?>" />
														<label class="form-label">Agent's Full Name:</label>
													</div>
													<br>
													<div class="form-line">
														<input type="email" name="email" class="form-control" value="<?php echo $agent[0]['email']; ?>" />
														<label class="form-label">Agent's Email:</label>
													</div>
													<br>
													<div class="form-line">
														<input type="text" name="cell" class="form-control" value="<?php echo $agent[0]['cell']; ?>" />
														<label class="form-label">Cell Phone Number:</label>
													</div>
													<br>
													<div class="demo-checkbox">
														<input type="checkbox" id="md_checkbox_26" name="sms" class="filled-in chk-col-blue" 
														<?php if($agent[0]['sms'] == true){ echo "checked"; }else{ echo ""; } ?> />
														<label for="md_checkbox_26">Send status updates via SMS</label>
													</div>
													<br>
													
													<div class="dz-message">
														<div class="drag-icon-cph">
															<i class="material-icons">touch_app</i>
														</div>
														<h3>Drop the Photo here or Click to Upload.</h3>
														<em>(Upload the Profile Photo of the Agent)</em>
													</div>
													<input type="submit" name="update" class="btn btn-primary btn-lg waves-effect" value="UPDATE EVERYTHING" />
												</div>
                                            </form>
                                        </div>
                                        <div class="col-lg-4"></div>
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
						<h4 class="modal-title">Delete Agent</h4>
					</div>
					<div class="modal-body">
						<p>Are You Sure You Want to Delete this Agent?</p>
						<div class="form-group">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<a href="<?php echo base_url();?>admin/delete_agent/<?php echo $this->uri->segment(3);?>" class="btn btn-danger">Delete</a>
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
.crop-agent {
	max-width: 400px;
	margin: 0 auto;
}
</style>