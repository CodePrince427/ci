﻿<body id="admin-page" class="theme-red">
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
                                    <h2>Listings</h2>
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
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <strong>SEARCH RESULTS</strong>
                                        </div>
                                    </div>
                                    <div id="products" class="row list-group">
                                        <?php for($i=0; $i<count($listing_search); $i++){ ?>
                                        <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                                            <div class="result">
												<?php if($listing_search[$i]['address'] == ''){ ?>
												<span>No results found.</span>
												<?php }else{ ?>
                                                <a href="<?php echo base_url(); ?>admin/edit_listing/<?php echo $listing_search[$i]['listing_id']; ?>" class="found-item">
                                                    <div class="row thumbnail">
                                                        <div class="col-lg-6 no-padding no-margin">
                                                            <img src="<?=ASSETS_ADMIN_DIR_GALLERY?><?php echo $listing_search[$i]['pic']; ?>" class="group list-group-image img-responsive" />
                                                        </div>
                                                        <div class="col-lg-6 no-padding no-margin">
                                                            <div class="caption">
                                                                <h4 class="group inner list-group-item-heading">
                                                                    <?php echo $listing_search[$i]['address']; ?>
                                                                </h4>
                                                                <p class="group inner list-group-item-text">
                                                                    $<?php echo $listing_search[$i]['price']; ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
												<?php } ?>
                                            </div>
                                        </div>
										<?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<style>
.tab-content .result .media-body {
    text-align: center;
}
.tab-content .result img {
    width: 100%;
    max-height: 225px;
    margin: 0 auto;
}
.result .thumbnail {
    padding: 10px;
    margin: 0;
}
.result .thumbnail img {
    margin: 0;
}
.result .thumbnail .caption {
    /*margin-top: 10px;*/
}
.no-padding {
    padding: 0 !important;
}
.no-margin {
    margin: 0 !important;
}
.found-item:hover, .found-item:focus {
    text-decoration: none;
}
.found-item:hover .thumbnail {
    background: #f9f9f9;
}
</style>
