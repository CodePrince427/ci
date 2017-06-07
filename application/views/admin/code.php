<body class="code-page">

    <div id="video-wrapper">
        <div class="logo">
            <img src="<?=ASSETS_ADMIN_DIR?>images/logo.png" alt="Lillian Montalto Signature Properties" class="img-responsive">
        </div>

        <div class="login-box">
            <div class="card">
                <div class="body">
					
					<?php $error = $this->session->flashdata('error'); if(!empty($error)){ ?>
					<div class="notification png_bg"><div style="color:#F00">
					<?php echo $error; unset($error); ?></div></div><?php }	?>
					
					<?php $success = $this->session->flashdata('success'); if(!empty($success)){ ?>
					<div class="notification png_bg"><div style="color:#090">
					<?php echo $success; unset($success); ?></div></div><?php }	?>
					
                    <form id="code_form" action="<?php echo base_url(); ?>verifycode" method="POST">
                        <div class="msg">Please enter your unique code below</div>
                        <div class="input-group">
                            <div class="form-line">
                                <input id="code" type="text" class="form-control" name="code" placeholder="X-B-J-T-F" autofocus required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
								<input id="code_btn" class="btn btn-block bg-blue btn-lg waves-effect" type="submit" value="ENTER" name="code_form" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="wrapper-video">
            <div class="video-overlay-shade"></div>
            <div>
                <video autoplay loop>
                    <source src="<?=ASSETS_ADMIN_DIR?>video/house3d.mp4" type="video/mp4">
                </video>
            </div>
        </div>
    </div>