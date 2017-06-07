<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Lillian Montalto Signature Properties - Admin Panel - Listings</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?=ASSETS_ADMIN_DIR?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?=ASSETS_ADMIN_DIR?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?=ASSETS_ADMIN_DIR?>plugins/animate-css/animate.css" rel="stylesheet" />

    <link href="<?=ASSETS_ADMIN_DIR?>plugins/dropzone/dropzone.css" rel="stylesheet">
    <link href="<?=ASSETS_ADMIN_DIR?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet">
    <link href="<?=ASSETS_ADMIN_DIR?>plugins/light-gallery/css/lightgallery.css" rel="stylesheet">
	
	<!-- Custom Css -->
    <link href="<?=ASSETS_ADMIN_DIR?>css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?=ASSETS_ADMIN_DIR?>css/themes/all-themes.css" rel="stylesheet" />
	
	<!-- JQuery UI Autocomplete Search -->
	<link href="<?=ASSETS_ADMIN_DIR?>css/jquery-ui.css" rel="stylesheet" type="text/css" />
	
	<style>  
		<!-- Autocomplete -->
		.ui-autocomplete { position: absolute; cursor: default; }   
		.ui-autocomplete-loading { background: white url('http://jquery-ui.googlecode.com/svn/tags/1.8.2/themes/flick/images/ui-anim_basic_16x16.gif') right center no-repeat; }

		<!-- workarounds -->
		html .ui-autocomplete { width:1px; } <!-- without this, the menu expands to 100% in IE6 -->

		<!-- Menu -->
		.ui-menu {
			list-style:none;
			padding: 2px;
			margin: 0;
			display:block;
		}
		.ui-menu .ui-menu {
			margin-top: -3px;
		}
		.ui-menu .ui-menu-item {
			margin:0;
			zoom: 1;
			float: left;
			clear: left;
			width: 100%;
			font-size:80%;

			height:50px;
			padding:5px 0 5px 20px;
			font-size:15px;
			font-weight:bold;
			font-style:italic;
			background-color:#D4D4D4;
		}
		.ui-menu .ui-menu-item a {
			text-decoration:none;
			display:block;
			padding:.2em .4em;
			line-height:1.5;
			zoom:1;
		}
		.ui-menu .ui-menu-item a.ui-state-hover,
		.ui-menu .ui-menu-item a.ui-state-active {
			font-weight: normal;
			margin: -1px;
		} 
	</style>
</head>