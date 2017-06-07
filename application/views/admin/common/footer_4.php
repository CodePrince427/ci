	<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h4>Lillian Montalto Signature Properties International, LLC</h4>
                    <p>34 Park Street, Suite One, Andover, MA 01810</p>
                    <br>
                    <p>Office Phone: <b>978-475-1400</b></p>
                    <p>Email: <a href="mailto:@andoverhomes.com">info@AndoverHomes.com</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Jquery Core Js -->
    <script src="<?=ASSETS_ADMIN_DIR?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=ASSETS_ADMIN_DIR?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=ASSETS_ADMIN_DIR?>plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?=ASSETS_ADMIN_DIR?>plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?=ASSETS_ADMIN_DIR?>js/admin.js"></script>
    <script src="<?=ASSETS_ADMIN_DIR?>js/pages/examples/sign-in.js"></script>
	
	<script>
		$('#code').keypress(function (e) {
			var regex = new RegExp("^[a-zA-Z0-9]+$");
			var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
			if (regex.test(str)) {
				return true;
			}

			e.preventDefault();
			return false;
		});
	</script>
</body>
</html>