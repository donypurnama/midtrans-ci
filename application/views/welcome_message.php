<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>The Web Developer Course</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- First include jquery js -->
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>

	<script type="text/javascript"
					src="https://app.sandbox.midtrans.com/snap/snap.js"
					data-client-key="VT-client-cJ_HBKGlJwNeSIZ4"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>The Web Developer Bootcamp</h1>

	<div id="body">
		<h3>The only course you need to learn web development - HTML, CSS, JS, Node, and More!</h3>
		<img src="<?php echo base_url("asset/img/web-developer.jpg"); ?>" alt="Smiley face" width="150" height="200">
		<h4>Description</h4>
		<p>
			Hi! Welcome to the Web Developer Bootcamp, the only course you need to learn web development.</p>
		<p>There are a lot of options for online developer training, but this course is without a doubt
			the most comprehensive and effective on the market. Here's why:
		</p>

		<h2>IDR 200.000,-</h2>

		<form id="payment-form" method="post" action="<?=site_url()?>demo/finish">

			<input type="hidden" name="result_type" id="result-type" value=""></div>
      <input type="hidden" name="result_data" id="result-data" value=""></div>

			<div class="form-group">
		    <label for="inputID">ID</label>
		    <input type="text" class="form-control" id="inputID" value="a1">
		  </div>
			<div class="form-group">
		    <label for="inputPrices">Harga</label>
		    <input type="text" class="form-control" id="inputPrice" value="270000">
		  </div>
			<div class="form-group">
		    <label for="inputQty">Kuantiti</label>
		    <input type="number" class="form-control" id="inputQty" value="3">
		  </div>
			<div class="form-group">
		    <label for="inputBookName">Description</label>
		    <input type="text" class="form-control" id="inputBookName" value="The Web Developer Bootcamp">
		  </div>
			<div class="form-group">
		    <label for="inputFirstName">Nama Depan</label>
		    <input type="text" class="form-control" id="inputFirstName" placeholder="Nama Depan" value="Dony">
		  </div>
			<div class="form-group">
		    <label for="inputLastName">Nama Belakang</label>
		    <input type="text" class="form-control" id="inputLastName" placeholder="Nama Belakang" value="Wilmar">
		  </div>
			<div class="form-group">
		    <label for="inputAddress">Alamat</label>
		    <input type="text" class="form-control" id="inputAddress" placeholder="Alamat" value="Wisma 46 - Kota BNI, Jalan Jend Sudirman No.1, RT.10/RW.11, Karet Tengsin, Tanah Abang, Kota Jakarta Pusat">
		  </div>
			<div class="form-group">
		    <label for="inputCity">Kota</label>
		    <input type="text" class="form-control" id="inputCity" placeholder="Kota" value="Jakarta Selatan">
		  </div>
			<div class="form-group">
		    <label for="inputPostalCode">Kode Pos</label>
		    <input type="number" class="form-control" id="inputPostalCode" placeholder="Kode Pos" value="10550">
		  </div>
		  <div class="form-group">
		    <label for="inputPhone">Telepon</label>
		    <input type="number" class="form-control" id="inputPhone" placeholder="Telepon" value="109940">
		  </div>
			<div class="form-group">
		    <label for="inputEmail">Email</label>
		    <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="dony.wilmar@gmail.com">
		  </div>
			<button id="pay-button" class="btn btn-default">Buy Now !!!</button>
	</form>
	<script type="text/javascript">

$('#pay-button').click(function (event) {
	event.preventDefault();
	$(this).attr("disabled", "disabled");
	var id_val 		= $("#inputID").val();
	var price_val = $("#inputPrice").val();
	var qty_val 	= $("#inputQty").val();
	var bookname_val = $("#inputBookName").val();
	var firstname_val = $("#inputFirstName").val();
	var lastname_val = $("#inputLastName").val();
	var address_val = $("#inputAddress").val();
	var city_val = $("#inputCity").val();
	var postalcode_val = $("#inputPostalCode").val();
	var phone_val = $("#inputPhone").val();
	var email_val = $("#inputEmail").val();

	$.ajax({
					url: 'welcome/token_',
					cache: false,
					data: {
						id_param: id_val,
						price_param: price_val,
						qty_param: qty_val,
						bookname_param: bookname_val,
						firstname_param: firstname_val,
						lastname_param: lastname_val,
						address_param: address_val,
						city_param: city_val,
						postalcode_param: postalcode_val,
						phone_param: phone_val,
						email_param: email_val
					},
	success: function(data) {
		//location = data;

		console.log('token = '+data);

		var resultType = document.getElementById('result-type');
		var resultData = document.getElementById('result-data');

		function changeResult(type,data){
			$("#result-type").val(type);
			$("#result-data").val(JSON.stringify(data));
			//resultType.innerHTML = type;
			//resultData.innerHTML = JSON.stringify(data);
		}

		snap.pay(data, {

			onSuccess: function(result){
				changeResult('success', result);
				console.log(result.status_message);
				console.log(result);
				$("#payment-form").submit();
			},
			onPending: function(result){
				changeResult('pending', result);
				console.log(result.status_message);
				$("#payment-form").submit();
			},
			onError: function(result){
				changeResult('error', result);
				console.log(result.status_message);
				$("#payment-form").submit();
			}
		});
	}
});
});
	</script>
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>
