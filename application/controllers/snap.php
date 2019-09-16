<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


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
    	$this->load->view('checkout_snap');
    }

    public function token()
    {

		// Required
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => 94000, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => 'a1',
		  'price' => 18000,
		  'quantity' => 3,
		  'name' => "Apple"
		);

		// Optional
		$item2_details = array(
		  'id' => 'a2',
		  'price' => 20000,
		  'quantity' => 2,
		  'name' => "Orange"
		);

		// Optional
		$item_details = array ($item1_details, $item2_details);

		// Optional
		$billing_address = array(
		  'first_name'    => "Andri",
		  'last_name'     => "Litani",
		  'address'       => "Mangga 20",
		  'city'          => "Jakarta",
		  'postal_code'   => "16602",
		  'phone'         => "081122334455",
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
		  'first_name'    => "Obet",
		  'last_name'     => "Supriadi",
		  'address'       => "Manggis 90",
		  'city'          => "Jakarta",
		  'postal_code'   => "16601",
		  'phone'         => "08113366345",
		  'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
		  'first_name'    => "Andri",
		  'last_name'     => "Litani",
		  'email'         => "om.donypurnama@gmail.com",
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

		public function notification()
		{
			echo 'test notification handler';
			$json_result = file_get_contents('php://input');
			$result = json_decode($json_result);

			if($result){
			$notif = $this->veritrans->status($result->order_id);
			}

			error_log(print_r($result,TRUE));

			//notification handler sample

			$transaction = $notif->transaction_status;
			$type = $notif->payment_type;
			$order_id = $notif->order_id;
			$fraud = $notif->fraud_status;

			if ($transaction == 'capture') {
			  // For credit card transaction, we need to check whether transaction is challenge by FDS or not
			  if ($type == 'credit_card'){
			    if($fraud == 'challenge'){
			      // TODO set payment status in merchant's database to 'Challenge by FDS'
			      // TODO merchant should decide whether this transaction is authorized or not in MAP
			      echo "Transaction order_id: " . $order_id ." is challenged by FDS";
			      }
			      else {
			      // TODO set payment status in merchant's database to 'Success'
			      echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
			      }
			    }
			  }
			else if ($transaction == 'settlement'){
			  // TODO set payment status in merchant's database to 'Settlement'
			  echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
			  }
			  else if($transaction == 'pending'){
			  // TODO set payment status in merchant's database to 'Pending'
			  echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
			  }
			  else if ($transaction == 'deny') {
			  // TODO set payment status in merchant's database to 'Denied'
			  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
			}

		}

    public function finish()
    {
    	$result = json_decode($this->input->post('result_data'));
    	echo 'RESULT <br><pre>';
    	var_dump($result);
    	echo '</pre>' ;

    }

		public function payment() {
			$json = '{
								  "transaction_time": "2017-08-09 16:54:22",
								  "transaction_status": "deny",
								  "transaction_id": "61270576-1938-4ba6-84d4-2780f20d742a",
								  "status_message": "Veritrans payment notification",
								  "status_code": "202",
								  "signature_key": "b874c3906a679fd57f3acc2382078c6859cbb4619abe11e42cd4e25386553c577a06d3f163409ef3e00e04a1d9f078c2b5289c19182f37d19bd7a3498b5fcabf",
								  "payment_type": "mandiri_clickpay",
								  "order_id": "1033850673",
								  "masked_card": "411111-1111",
								  "gross_amount": "94000.00",
								  "fraud_status": "accept",
								  "approval_code": "1502272464843"
								}';

					var_dump(json_decode($json));
					var_dump(json_decode($json, true));

					$obj = json_decode($json);

					echo $obj->{'status_code'};


		}
}
