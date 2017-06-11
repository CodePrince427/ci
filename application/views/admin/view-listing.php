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
                                    <h2>CODE: <strong><?php echo $listing[0]['code']; ?></strong></h2>
                                </div>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="<?php echo base_url();?>admin/add_listing">New</a></li>
                                            <li><a href="#DelModal" data-toggle="modal">Delete</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="body">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab1">
									<form action="<?php echo base_url();?>admin/update_listing/<?php echo $this->uri->segment(3);?>" class="" method="POST" enctype="multipart/form-data">
										<input type="hidden" name="code" value="<?php echo $listing[0]['code']; ?>" />
										<div class="row">
											<div class="col-lg-6">
												<strong>Preview Photo and Price:</strong>
												<br><br>
												<div class="form-group form-float form-group-lg">
													<div class="form-line">
														<input type="text" class="form-control" name="price" value="<?php echo $listing[0]['price']; ?>" />
														<label class="form-label">Listing Price: $</label>
													</div>
												</div>
												<strong>Upload Photo:</strong>
												<br><br>
												<div class="form-group form-float form-group-lg">
													<div class="form-line">
														<input type="file" class="form-control" name="pic" accept="image/*" />
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="preview">
													<?php if($listing_pic[0]['pic'] == ''){ ?>
													<img src="<?=ASSETS_ADMIN_DIR_IMG?>no-photo.jpg" alt="" class="img-responsive thumbnail" />
													<?php }else{ ?>
													<img src="<?=ASSETS_ADMIN_DIR_GALLERY?><?php echo $listing_pic[0]['pic']; ?>" alt="" class="img-responsive thumbnail" />
													<?php } ?>
												</div>
											</div>
										</div>
										<hr />

										<div class="row">
											<div class="col-lg-6">
												<strong>Property Information:</strong>
												<br><br>
												<div class="form-group form-float form-group-lg">
													<div class="form-line">
														<input type="text" class="form-control" name="address" value="<?php echo $listing[0]['address']; ?>" />
														<label class="form-label">Street Address:</label>
													</div>
													<br>
													<div class="form-line">
														<input type="text" class="form-control" name="city" value="<?php echo $listing[0]['city']; ?>" />
														<label class="form-label">City/Town:</label>
													</div>
													<br>
													<div class="form-line">
														<input type="text" class="form-control" name="state" value="<?php echo $listing[0]['state']; ?>" />
														<label class="form-label">State:</label>
													</div>
													<br>
													<div class="form-line">
														<input type="text" class="form-control" name="zipcode" value="<?php echo $listing[0]['zipcode']; ?>" />
														<label class="form-label">Zip Code:</label>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<strong>Seller Information:</strong>
												<br><br>
												<div class="form-group form-float form-group-lg">
													<div class="form-line">
														<input type="text" class="form-control" name="name" value="<?php echo $seller[0]['name']; ?>" />
														<label class="form-label">Full Name(s):</label>
													</div>
													<br>
													<div class="form-line">
														<input type="text" class="form-control" name="email" value="<?php echo $seller[0]['email']; ?>" />
														<label class="form-label">Seller's Email:</label>
													</div>
													<br>
													<div class="form-line">
														<input type="text" class="form-control" name="cell" value="<?php echo $seller[0]['cell']; ?>" />
														<label class="form-label">Cell Phone Number:</label>
													</div>
													<br>
													<div class="demo-checkbox">
														<input type="checkbox" id="md_checkbox_26" class="filled-in chk-col-blue" name="sms"
														<?php if($seller[0]['sms'] == true){ echo "checked"; }else{ echo ""; } ?> />
														<label for="md_checkbox_26">Send status updates via SMS</label>
													</div>
												</div>
											</div>
										</div>
										<hr />
										<div class="row">
											<div class="col-lg-6">
												<strong>Listing Agent Information:</strong>
												<br /><br />
												<select class="form-control show-tick" name="agent">
													<option value="">-- Please choose from the drop down --</option>
													<?php for($j=0; $j < count($agent_list); $j++){ ?>
													<option value="<?php echo $agent_list[$j]['id']; ?>"
													<?php if($agent_list[$j]['id'] == $agent[0]['id']){ ?> selected <?php }else{ echo ""; } ?> >
													<?php echo $agent_list[$j]['name']; ?></option>
													<?php } ?>
												</select>
												<br />
												<br />
												<div class="crop-agent">
													<img src="<?=ASSETS_ADMIN_DIR_USER?><?php echo $agent[0]['pic']; ?>" alt="" class="img-responsive thumbnail" />
												</div>
												<br />
												<strong>Agent's Email:</strong>
												<p><a href="mailto:<?php echo $agent[0]['email']; ?>"><?php echo $agent[0]['email']; ?></a></p>
												<br />
												<strong>Phone Number:</strong>
												<p><?php echo $agent[0]['cell']; ?></p>
											</div>
											<div class="col-lg-6">
												<strong>Listing Status Information:</strong>
												<br /><br />
												<select class="form-control show-tick" name="process">
													<?php if($listing[0]['process'] == 'Listing Process'){ ?>
													<option value="<?php echo $listing[0]['process']; ?>">Listing Process</option>
													<?php }else{ ?>
													<option value="">-- Please choose from the drop down --</option>
													<option value="Listing Process">Listing Process</option>
													<?php } ?>
												</select>
												<br /><br />
												<select class="form-control show-tick" name="step">
													<?php for($k=0; $k<$steps_counter; $k++){ ?>
													<option value="<?php echo $listing_steps[$k]['id']; ?>"
													<?php if($listing_step[0]['step_no'] == $listing_steps[$k]['step_no']){ echo "selected"; }else{ echo ""; } ?>>
														Step <?php echo $listing_steps[$k]['step_no']; ?>: <?php echo $listing_steps[$k]['step_name']; ?>
													</option>
													<?php } ?>
												</select>
											</div>
										</div>
										<hr />
										<div class="row">
											<div class="col-lg-12">
												<button type="submit" class="btn btn-primary btn-lg waves-effect">UPDATE EVERYTHING</button>
											</div>
										</div>
									</form>
									<hr/>
									<div class="row">
										<div class="col-lg-12">
											<strong>GALLERY</strong>
											<br/><br/>
											<div id="aniimated-thumbnials" class="list-unstyled row clearfix gallery-card">
												<?php if($pic_counter == ''){ ?>
												<ul class="attachments">
													<span>No Photos uploaded yet....</span>
												</ul>
												<?php }else{ ?>
												<?php for($l=0; $l < $pic_counter; $l++){ ?>
												<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
													<ul class="list-inline">
														<li data-toggle="modal" data-target="#ModalGallery<?php echo $listing_gallery[$l]['id']; ?>">
															<a href="#Gallery<?php echo $listing_gallery[$l]['id']; ?>" data-slide-to="<?php echo $l; ?>">
																<img class="img-thumbnail" src="<?=ASSETS_ADMIN_DIR_GALLERY?><?php echo $listing_gallery[$l]['pic']; ?>" style="width:100%; height:100px;" />
															</a>
														</li>
													</ul>
													<a href="#DelGallery<?php echo $listing_gallery[$l]['id']; ?>" data-toggle="modal"><i class="fa fa-trash"></i> Delete Image</a>
												</div>

												<!-- Gallery Modal -->
												<div id="ModalGallery<?php echo $listing_gallery[$l]['id']; ?>" class="modal fade" role="dialog">
													<div class="modal-dialog">

														<!-- Modal content -->
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Gallery Image</h4>
															</div>
															<div class="modal-body">
																<!-- Carousel -->
																<div id="Gallery<?php echo $listing_gallery[$l]['id']; ?>" class="carousel slide" data-interval="false" data-ride="carousel">
																	<ol class="carousel-indicators">
																		<?php $m = 1; foreach($listing_gallery as $gallery):$ol_class = ($m == 1) ? 'active' : ''; ?>
																		<li data-target="#Gallery" data-slide-to="<?php echo $m; ?>" class="<?php echo $ol_class; ?>"></li>
																		<?php $m++; endforeach; ?>
																	</ol>

																	<div class="carousel-inner">
																		<?php $m = 1; foreach($listing_gallery as $gallery):$item_class = ($m == 1) ? 'item active' : 'item'; ?>
																			<div class="<?php echo $item_class; ?>">
																				<img src="<?=ASSETS_ADMIN_DIR_GALLERY?><?php echo $gallery['pic'];?>" />
																			</div>
																			<?php $m++; endforeach; ?>
																	</div>

																	<a class="left carousel-control" href="#Gallery<?php echo $listing_gallery[$l]['id']; ?>" role="button" data-slide="prev">
																		<span class="glyphicon glyphicon-chevron-left"></span>
																	</a>
																	<a class="right carousel-control" href="#Gallery<?php echo $listing_gallery[$l]['id']; ?>" role="button" data-slide="next">
																		<span class="glyphicon glyphicon-chevron-right"></span>
																	</a>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															</div>
														</div>

													</div>
												</div>

												<!-- Delete Gallery Modal -->
												<div id="DelGallery<?php echo $listing_gallery[$l]['id']; ?>" class="modal fade" role="dialog">
													<div class="modal-dialog">

														<!-- Modal content -->
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Delete Gallery Image</h4>
															</div>
															<div class="modal-body">
																<p>Are You Sure You Want to Delete this Image?</p>
																<div class="form-group">
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																<a href="<?php echo base_url();?>admin/delete_listing_gallery/<?php echo $listing_gallery[$l]['id']; ?>/<?php echo $this->uri->segment(3);?>" class="btn btn-danger">Delete</a>
															</div>
														</div>

													</div>
												</div>
												<?php } } ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<strong>Upload Gallery Photos:</strong>
											<br><br>
											<form action="<?php echo base_url();?>admin/insert_gallery/<?php echo $this->uri->segment(3);?>" id="GalleryUpload" class="dropzone dz-clickable" method="POST" enctype="multipart/form-data">
												<div class="dz-message">
													<div class="drag-icon-cph">
														<i class="material-icons">touch_app</i>
													</div>
													<h3>Drop files here or click to upload.</h3>
													<em>(Upload all the gallery photos of the property in this section)</em>
												</div>
											</form>
										</div>
										<div class="col-lg-6">
											<strong>Upload PDF Files:</strong>
											<br><br>
											<form action="<?php echo base_url();?>admin/insert_pdf/<?php echo $this->uri->segment(3);?>" id="PDFUpload" class="dropzone dz-clickable" method="POST" enctype="multipart/form-data">
												<div class="dz-message">
													<div class="drag-icon-cph">
														<i class="material-icons">touch_app</i>
													</div>
													<h3>Drop files here or click to upload.</h3>
													<em>(Upload all the PDF files related to the property in this section)</em>
												</div>
											</form>
										</div>
									</div>
									<strong>Uploaded PDFs:</strong>
									<br/><br/>
										<?php if($pdf_counter == ''){ ?>
										<span>No PDFs uploaded yet....</span>
										<?php }else{ ?>
                                        <div class="row uploaded-pdfs-row">
                                            <ul class="list-group uploaded-pdfs">
												<?php for($i=0; $i < $pdf_counter; $i++){ ?>
                                                    <li class="col-lg-4 list-group-item">
                                                        <i class="fa fa-file-pdf-o"></i>
    													<span style="font-style:;"><?php echo $listing_pdf[$i]['pdf']; ?></span><br/><br/>
    													<a href="<?=ASSETS_ADMIN_DIR_FILE?><?php echo $listing_pdf[$i]['pdf']; ?>" download>
    														<i class="fa fa-download" style="font-size:20px;color:green;"></i>
    													</a> |
    													<a href="#EditPDF<?php echo $listing_pdf[$i]['id']; ?>" data-toggle="modal">
    														<i class="fa fa-pencil" style="font-size:20px;color:blue;"></i>
    													</a> |
    													<a href="#DelPDF<?php echo $listing_pdf[$i]['id']; ?>" data-toggle="modal">
    														<i class="fa fa-trash" style="font-size:20px;color:red;"></i>
    													</a>

    													<!-- Edit PDF Modal -->
    													<div id="EditPDF<?php echo $listing_pdf[$i]['id']; ?>" class="modal fade" role="dialog">
    														<div class="modal-dialog">

    															<!-- Modal content-->
    															<div class="modal-content">
    																<div class="modal-header">
    																	<button type="button" class="close" data-dismiss="modal">&times;</button>
    																	<h4 class="modal-title">Rename PDF</h4>
    																</div>
    																<div class="modal-body">
    																	<form action="<?php echo base_url();?>admin/rename_listing_pdf/<?php echo $listing_pdf[$i]['id']; ?>/<?php echo $this->uri->segment(3);?>" method="POST">
    																		<p>Are You Sure You Want to Rename this PDF?</p>
    																		<div class="form-line">
    																			<input type="text" class="form-control" name="pdf" value="<?php echo $listing_pdf[$i]['pdf']; ?>" autofocus />
    																		</div><br/>
    																		<div class="modal-footer">
    																			<button type="submit" class="btn btn-danger">Rename</button>
    																			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    																		</div>
    																	</form>
    																</div>
    															</div>

    														</div>
    													</div>

    													<!-- Delete PDF Modal -->
    													<div id="DelPDF<?php echo $listing_pdf[$i]['id']; ?>" class="modal fade" role="dialog">
    														<div class="modal-dialog">

    															<!-- Modal content-->
    															<div class="modal-content">
    																<div class="modal-header">
    																	<button type="button" class="close" data-dismiss="modal">&times;</button>
    																	<h4 class="modal-title">Delete PDF</h4>
    																</div>
    																<div class="modal-body">
    																	<p>Are You Sure You Want to Delete this PDF?</p>
    																	<div class="form-group">
    																	</div>
    																</div>
    																<div class="modal-footer">
    																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    																	<a href="<?php echo base_url();?>admin/delete_listing_pdf/<?php echo $listing_pdf[$i]['id']; ?>/<?php echo $this->uri->segment(3);?>" class="btn btn-danger">Delete</a>
    																</div>
    															</div>

    														</div>
    													</div>
                                                        <hr>
                                                    </li>
												<?php } } ?>
                                            </ul>
                                        </div>
									</ul>
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
						<h4 class="modal-title">Delete Listing</h4>
					</div>
					<div class="modal-body">
						<p>Are You Sure You Want to Delete this Listing?</p>
						<div class="form-group">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<a href="<?php echo base_url();?>admin/delete_listing/<?php echo $this->uri->segment(3);?>" class="btn btn-danger">Delete</a>
					</div>
				</div>

			</div>
		</div>

    </section>

<style>
.content .card {
    margin: 0;
}
.crop-agent {
	max-width: 350px;
}
.gallery-card .img-thumbnail {
	height: auto !important;
}
.uploaded-pdfs-row {
    margin: 0;
}
.uploaded-pdfs i {
    font-size: 24px;
    color: #f00;
    margin-right: 5px;
}
.uploaded-pdfs li {
    border: none;
    margin: 0 !important;
}
</style>
