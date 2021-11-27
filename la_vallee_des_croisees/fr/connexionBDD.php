<?php
	$conn = new PDO( "sqlsrv:Server=LAPTOP-PHP8J8PN\SQLEXPRESS;Database=BDCamping", NULL, NULL);  #connection avec sql server
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>