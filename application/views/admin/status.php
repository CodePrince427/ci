<body id="status-page">
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
    <section class="content">
        <div class="container card">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="logo">
                        <img src="<?=ASSETS_ADMIN_DIR_IMG?>logo.png" alt="Lillian Montalto Signature Properties" class="img-responsive">
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="header">
                        <h2>
                            YOUR PROPERTY
                        </h2>
                    </div>
                    <div class="body">
                        <div class="house">
							<?php if($listing_pic[0]['pic'] == ''){ ?>
                            <img src="<?=ASSETS_ADMIN_DIR_IMG?>no-photo.jpg" class="img-responsive thumbnail">
							<?php }else{ ?>
                            <img src="<?=ASSETS_ADMIN_DIR_GALLERY?><?php echo $listing_pic[0]['pic']; ?>" class="img-responsive thumbnail">
							<?php } ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="header">
                        <h2>
                            DETAILS
                        </h2>
                    </div>
                    <div class="body">
                        <div class="details">
                            <h4>Property Address:</h4>
                            <p><?php echo $listing[0]['address'].",<br>".$listing[0]['city'].", ".$listing[0]['state']."<br><b>Zipcode:</b>".$listing[0]['zipcode']; ?></p>
                            <br />
                            <h4>Seller:</h4>
                            <p><?php echo $seller[0]['name']; ?>, <?php echo $seller[0]['cell']; ?></p>
							<a href="mailto:<?php echo $seller[0]['email']; ?>"><?php echo $seller[0]['email']; ?></a>
                            <br />
                            <br />
                            <h4>Agent:</h4>
                            <p><?php echo $agent[0]['name']; ?>, <?php echo $agent[0]['cell']; ?></p>
                            <a href="mailto:<?php echo $agent[0]['email']; ?>"><?php echo $agent[0]['email']; ?></a>
                            <br />
                            <br />
                            <strong class="price">Listing Price: <span>$<?php echo $listing[0]['price']; ?></span></strong>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="header">
                        <h2>
                            YOUR AGENT
                        </h2>
                    </div>
                    <div class="body">
						<?php if($agent[0]['pic'] == ''){ ?>
						<img src="<?=ASSETS_ADMIN_DIR_IMG?>no-photo.jpg" class="img-responsive thumbnail">
						<?php }else{ ?>
						<div class="crop-agent">
							<img src="<?=ASSETS_ADMIN_DIR_USER?><?php echo $agent[0]['pic']; ?>" class="img-responsive thumbnail" />
						</div>
						<?php } ?>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header">
                        <h2>
                            THE LISTING PROCESS
						</h2>
                    </div>
                    <div class="body wizard-steps">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<?php for($k=0; $k<$steps_counter; $k++){ ?>
							<?php if($listing_step[0]['step_no'] == $listing_steps[$k]['step_no']){ ?>
							<li role="presentation" class="active selected">
								<a href="#<?php echo $listing_steps[$k]['step_no'];?>" aria-controls="<?php echo $listing_steps[$k]['step_no'];?>" role="tab" data-toggle="tab">
									<?php echo $listing_steps[$k]['step_no'].". ".$listing_steps[$k]['step_name']?>
								</a>
							</li>
							<?php }elseif($listing_steps[$k]['step_no'] < $listing_step[0]['step_no']){ ?>
							<li role="presentation" class="">
								<a href="#<?php echo $listing_steps[$k]['step_no'];?>" aria-controls="<?php echo $listing_steps[$k]['step_no'];?>" role="tab" data-toggle="tab">
									<?php echo $listing_steps[$k]['step_no'].". ".$listing_steps[$k]['step_name']?>
								</a>
							</li>
							<?php }else{ ?>
							<li role="presentation" class="disabled">
								<a href="#<?php echo $listing_steps[$k]['step_no'];?>" aria-controls="<?php echo $listing_steps[$k]['step_no'];?>" role="tab">
									<?php echo $listing_steps[$k]['step_no'].". ".$listing_steps[$k]['step_name']?>
								</a>
							</li>
							<?php } } ?>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<?php for($l=0; $l<$steps_counter; $l++){ ?>
							<div id="<?php echo $listing_steps[$l]['step_no'];?>" role="tabpanel" class="tab-pane 
							<?php if($listing_step[0]['step_no'] == $listing_steps[$l]['step_no']){ echo "active"; }else{ echo ""; } ?>">
								<section>
									<h3><?php echo $listing_steps[$l]['step_no'];?>. <?php echo $listing_steps[$l]['step_name'];?></h3>
									<br/>
									<?php echo $listing_steps[$l]['content'];?>
									<br />
									<?php if($listing_steps[$l]['video']!= ''){ ?>
									<iframe width="560px" height="315px" src="<?php echo $listing_steps[$l]['video'];?>?autoplay=0&showinfo=0" class="tut-video" frameborder="0" allowfullscreen></iframe>
									<?php }else{ echo "<br/>"; ?>
									<?php } ?>
								</section>
							</div>
							<?php } ?>
						</div>
					
						<div class="header">
                            <h2>
                                DOWNLOAD FILES
                            </h2>
                        </div>
                        <div class="body">
                            <ul class="attachments">
								<?php if($pdf_counter == ''){ ?>
								<li>No PDFs uploaded yet....</li>
								<?php }else{ ?>
								<?php for($i=0; $i < $pdf_counter; $i++){ ?>
									<li>
										<i class="fa fa-file-pdf-o"></i>
										<a href="<?=ASSETS_ADMIN_DIR_FILE?><?php echo $listing_pdf[$i]['pdf']; ?>" download>Download this PDF file <?php echo $i+1;?></a>
									</li>
								<?php } } ?>
                            </ul>
                        </div>
                        <div class="header">
                            <h2>
                                GALLERY
                            </h2>
                        </div>
                        <div class="body">
                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix gallery-card">
								<?php if($pic_counter == ''){ ?>
								<ul class="attachments">
									<li>No Photos uploaded yet....</li>
								</ul>
								<?php }else{ ?>
								<?php for($j=0; $j < $pic_counter; $j++){ ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                	<div class="crop-image">
	                                    <a href="<?=ASSETS_ADMIN_DIR_GALLERY?><?php echo $listing_gallery[$j]['pic']; ?>" data-sub-html="Listing Photo">
	                                        <img class="img-responsive thumbnail" src="<?=ASSETS_ADMIN_DIR_GALLERY?><?php echo $listing_gallery[$j]['pic'] ?>">
	                                    </a>
                                	</div>
                                </div>
								<?php } } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Example | Vertical Layout -->
        </div>
    </section>

    <div id="popper-content" class="hide">Content goes here</div>
<style>
.wizard-steps .nav.nav-tabs a {
	font-weight: 700;
}
.wizard-steps .nav.nav-tabs .disabled {
	opacity: 0.5;
}
.wizard-steps .nav.nav-tabs .disabled a {
	font-weight: normal;
}
.wizard-steps .selected a {
	color: #fff !important;
}
.crop-image {
    max-width: 100%;
}
.crop-agent {
	max-width: 250px;
}
/* Large Devices, Wide Screens */
@media only screen and (max-width : 1200px)
{
	.tut-video {
		width: 100%;
	}
	.wizard-steps .nav.nav-tabs .active::after {
		display: none;
	}
	.wizard-steps .nav.nav-tabs {
		overflow: hidden;
	}
	.wizard-steps .nav-tabs > li {
		width: 100%;
	}
}
</style>