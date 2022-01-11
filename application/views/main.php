<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <!--Declaring all the css libraries -->
	<link href="\cw2\assets\css\bootstrap.min.css" rel="stylesheet">
	<link href="\cw2\assets\css\bootstrap-grid.min.css" rel="stylesheet">
	<link href="\cw2\assets\css\bootstrap-reboot.min.css" rel="stylesheet">
	<!--Declaring all the js libraries -->
	<script src="\cw2\assets\js\backbone.min.js"></script>
	<script src="\cw2\assets\js\bootstrap.bundle.min.js"></script>
	<script src="\cw2\assets\js\bootstrap.min.js"></script>
	<script src="\cw2\assets\js\jquery-3.6.0.min.js"></script>
	<script src="\cw2\assets\js\underscore-esm-min.js"></script>
</head>
<body>

<div class="container">
	<?php $this->load->view($main_view); ?>
</div>

</body>
</html>
