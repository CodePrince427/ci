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
                                    <?php for($i=0; $i < $steps_counter1; $i++){ ?>
                                    <li class="waves-effect">
                                        <a href="<?php echo base_url();?>admin/edit_step/<?php echo $listing_steps[$i]['id'];?>/1" aria-expanded="false">
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
                                    <?php for($j=0; $j < $steps_counter2; $j++){ ?>
                                    <li class="waves-effect">
                                        <a href="<?php echo base_url();?>admin/edit_step/<?php echo $closing_steps[$j]['id'];?>/2" aria-expanded="false">
                                        <?php echo $closing_steps[$j]['step_name']; ?></a>
                                    </li>
                                    <?php } ?>
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
                                            <h2><center>Welcome to Listings Steps Section</center></h2>
                                            <br/>
                                        </div>
                                        <div class="col-lg-4"></div>
                                    </div>
									<p><center>Choose the Listing Steps from Sidebar to Manage their Content.</center></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
