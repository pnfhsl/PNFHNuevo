<?php
		
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;

	$objModel = new homeModel;
	$_css = new headElement;

	$_css->Heading();

	require_once("view/userView.php");
?>