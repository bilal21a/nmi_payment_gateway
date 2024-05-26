<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecurePaymentController extends Controller
{
    public function step_1()
    {
        return view('3ds.step1');
    }
    public function step_2(Request $request)
    {
        $data['data'] = $request;
        return view('3ds.step2', $data);
    }

    public function test()
    {
        return view('test');
    }
    public function payment_done(Request $request)
    {
        $jsonContent = json_decode(file_get_contents('php://input'));

        $fields = array(
            'security_key' => env('NMI_API'),
            'ccnumber' => $jsonContent->cardNumber,
            'ccexp' => $jsonContent->cardExpMonth . substr($jsonContent->cardExpYear, -2),
            'amount' => $jsonContent->amount,
            'email' => $jsonContent->email,
            'phone' => $jsonContent->phone,
            'city' => $jsonContent->city,
            'state' => $jsonContent->state,
            'address1' => $jsonContent->address1,
            'country' => $jsonContent->country,
            'first_name' => $jsonContent->firstName,
            'last_name' => $jsonContent->lastName,
            'zip' => $jsonContent->postalCode,
            'cavv' => $jsonContent->cavv,
            'xid' => $jsonContent->xid,
            'eci' => $jsonContent->eci,
            'cardholder_auth' => $jsonContent->cardHolderAuth,
            'three_ds_version' => $jsonContent->threeDsVersion,
            'directory_server_id' => $jsonContent->directoryServerId,
            'cardholder_info' => $jsonContent->cardHolderInfo
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://secure.networkmerchants.com/api/transact.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $fields
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}
