<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
  {
        parent::__construct();
        $params = array('server_key' => 'VT-server-EqgxcYO7lCKZwPQzb5hO4CJ4', 'production' => false);
				$this->load->library('midtrans');
				$this->midtrans->config($params);
				$this->load->helper('url');
  }

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function token()
	{
			$id      		= $this->input->get('id', TRUE);
			$price    	= $this->input->get('price', TRUE);
			$qty      	= $this->input->get('qty', TRUE);
			$bookname   = $this->input->get('bookname', TRUE);
			$firstname      	= $this->input->get('firstname', TRUE);
			$lastname      	= $this->input->get('lastname', TRUE);
			$address    = $this->input->get('address', TRUE);
			$city    		= $this->input->get('city', TRUE);
			$postalcode    = $this->input->get('postalcode', TRUE);
			$phone      = $this->input->get('phone', TRUE);
			$email      = $this->input->get('email', TRUE);

			// Required
			$transaction_details = array(
			  	'order_id' => rand(),
			  	'gross_amount' => 810000, // no decimal allowed for creditcard
			);

			// Optional
			$item1_details = array(
			  'id' => $id,
			  'price' => $price,
			  'quantity' => $qty,
			  'name' => $bookname
			);

			// Optional
			$item_details = array ($item1_details);

			// Optional
			$billing_address = array(
			  'first_name'    => $firstname,
			  'last_name'     => $lastname,
			  'address'       => $address,
			  'city'          => $city,
			  'postal_code'   => $postalcode,
			  'phone'         => $phone,
			  'country_code'  => 'IDN'
			);

			// Optional
			$shipping_address = array(
			  'first_name'    => $firstname,
			  'last_name'     => $lastname,
			  'address'       => $address,
			  'city'          => $city,
			  'postal_code'   => $postalcode,
			  'phone'         => $phone,
			  'country_code'  => 'IDN'
			);

			// Optional
			$customer_details = array(
			  'first_name'    => $firstname,
			  'last_name'     => $lastname,
			  'email'         => $email,
			  'phone'         => $phone,
			  'billing_address'  => $billing_address,
			  'shipping_address' => $shipping_address
			);

			// Data yang akan dikirim untuk request redirect_url.
	    $credit_card['secure'] = true;

			//ser save_card true to enable oneclick or 2click
			//$credit_card['save_card'] = true;

			$time = time();
			$custom_expiry = array(
					'start_time' => date("Y-m-d H:i:s O",$time),
					'unit' => 'minute',
					'duration'  => 2
			);

			$transaction_data = array(
					'transaction_details'=> $transaction_details,
					'item_details'       => $item_details,
					'customer_details'   => $customer_details,
					'credit_card'        => $credit_card,
					'expiry'             => $custom_expiry
			);

			error_log(json_encode($transaction_data));

			$snapToken = $this->midtrans->getSnapToken($transaction_data);

			error_log($snapToken);
			echo $snapToken;
	}

	public function token_()
	{
		$id      		= $this->input->get('id_param', TRUE);
		$price    	= $this->input->get('price_param', TRUE);
		$qty      	= $this->input->get('qty_param', TRUE);
		$bookname   = $this->input->get('bookname_param', TRUE);
		$firstname      	= $this->input->get('firstname_param', TRUE);
		$lastname      	= $this->input->get('lastname_param', TRUE);
		$address    = $this->input->get('address_param', TRUE);
		$city    		= $this->input->get('city_param', TRUE);
		$postalcode    = $this->input->get('postalcode_param', TRUE);
		$phone      = $this->input->get('phone_param', TRUE);
		$email      = $this->input->get('email_param', TRUE);


		//Calculate the price with quantity
		$sum_gross_amount = $price * $qty;

		// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $sum_gross_amount, // no decimal allowed for creditcard :: gross amount should equal with price * quantity
		);

	// Optional
	$item1_details = array(
		'id' 				=> $id,
		'price' 		=> $price,
		'quantity' 	=> $qty,
		'name' 			=> $bookname
	);

	// Optional
	$item_details = array ($item1_details);

	// Optional
	$billing_address = array(
		'first_name'    => $firstname,
		'last_name'     => $lastname,
		'address'       => $address,
		'city'          => $city,
		'postal_code'   => $postalcode,
		'phone'         => $phone,
		'country_code'  => 'IDN'
	);

	// Optional
	$shipping_address = array(
		'first_name'    => $firstname,
		'last_name'     => $lastname,
		'address'       => $address,
		'city'          => $city,
		'postal_code'   => $postalcode,
		'phone'         => $phone,
		'country_code'  => 'IDN'
	);

	// Optional
	$customer_details = array(
		'first_name'    => $firstname,
		'last_name'     => $lastname,
		'email'         => $email,
		'phone'         => "081122334455",
		'billing_address'  => $billing_address,
		'shipping_address' => $shipping_address
	);

	// Data yang akan dikirim untuk request redirect_url.
			$credit_card['secure'] = true;
			//ser save_card true to enable oneclick or 2click
			//$credit_card['save_card'] = true;

			$time = time();
			$custom_expiry = array(
					'start_time' => date("Y-m-d H:i:s O",$time),
					'unit' => 'minute',
					'duration'  => 2
			);

			$transaction_data = array(
					'transaction_details'=> $transaction_details,
					'item_details'       => $item_details,
					'customer_details'   => $customer_details,
					'credit_card'        => $credit_card,
					'expiry'             => $custom_expiry
			);

	error_log(json_encode($transaction_data));
	$snapToken = $this->midtrans->getSnapToken($transaction_data);
	error_log($snapToken);
	echo $snapToken;
	}


	public function finish()
	{
		$result = json_decode($this->input->post('result_data'));
		echo 'RESULT <br><pre>';
		var_dump($result);
		echo '</pre>' ;

	}
}
