<body class="login-page">
    <div class="login-box">
        <div class="card">
            <div class="body">
                <div class="logo">
                    <img src="<?=ASSETS_ADMIN_DIR?>images/logo.png" alt="Lillian Montalto Signature Properties" class="img-responsive">
                </div>
				
				<?php $error = $this->session->flashdata('error'); if(!empty($error)){ ?>
				<div class="notification-error" style="text-align:center; margin-bottom:5px;"><div style="color:#F00">
				<?php echo $error; unset($error); ?></div></div><?php }	?>
				
				<?php $success = $this->session->flashdata('success'); if(!empty($success)){ ?>
				<div class="notification-success" style="text-align:center; margin-bottom:5px;"><div style="color:#090">
				<?php echo $success; unset($success); ?></div></div><?php }	?>
				
                <form id="login_form" action="verifylogin" method="POST">
                    <div class="msg">AGENT ACCESS</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Username" required autofocus />
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="pass" placeholder="Password" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-blue">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-blue waves-effect" type="submit" name="login_form">SIGN IN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>