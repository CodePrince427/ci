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
						<a href="<?php echo base_url();?>admin/edit_agent/<?php echo $agent_list[$i]['id'];?>" aria-expanded="false">
						<?php echo $agent_list[$i]['name']; ?></a>
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
                                            <li><a href="<?php echo base_url();?>admin/add_agent">New</a></li>
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
                                    <div class="row search-results">
										<?php for($i=0; $i<count($agent_search); $i++){ ?>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="result">
												<?php if($agent_search[$i]['name'] == ''){ ?>
												<span>No results found.</span>
												<?php }else{ ?>
                                                <a href="<?php echo base_url(); ?>admin/edit_agent/<?php echo $agent_search[$i]['id']; ?>" class="found-item">
                                                    <div class="row thumbnail">
                                                        <div class="col-lg-6 no-padding no-margin">
                                                            <div class="crop-image">
                                                                <img src="<?=ASSETS_ADMIN_DIR_USER?><?php echo $agent_search[$i]['pic']; ?>" class="group list-group-image img-responsive" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 no-padding no-margin">
                                                            <div class="caption">
                                                                <h4 class="group inner list-group-item-heading">
                                                                    <?php echo $agent_search[$i]['email']; ?>
                                                                </h4>
                                                                <p class="group inner list-group-item-text">
                                                                    <?php echo $agent_search[$i]['cell']; ?>
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
.tab-content .result {
    text-align: left;
}
.tab-content .result .media-body {
    text-align: center;
}
.tab-content .result a img {
    width: 100%;
    margin: 0 auto;
}
.tab-content .result .image-crop {
    overflow: hidden;
    max-height: 200px;
    margin-bottom: 10px;
}
.tab-content .result .media-body .media-heading {
    font-size: 15px;
    margin: 0;
    word-break: break-all;
}
.tab-content .result .media-body .price {
    font-weight: bold;
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
.found-item .caption .list-group-item-heading {
    word-wrap: break-word;
    font-size: 15px;
}
.found-item .caption .list-group-item-text {
    letter-spacing: 1px;
}
.crop-image {
    width: 100%;
    height: 200px;
    overflow: hidden;
}
/* Large Devices, Wide Screens */
@media only screen and (max-width : 1200px)
{
    .crop-image {
        height: 400px;
    }
}
</style>
