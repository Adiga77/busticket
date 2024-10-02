<?php
session_start();
include_once('authentication.php');
$ref = $_GET['reference'];
echo $ref;
if($ref == ""){
    header("location:javascript://history.go(-1");
}
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_58d7de1de92fff5f18a0f465fb56b64724aabda7",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    // echo $response;
    $result = json_decode($response);
  }
  

  if($result->data->status == 'success'){
    $status = $result->data->status;
    $reference = $result->data->reference;
    $lname = $result->data->customer->last_name;
    $fname = $result->data->customer->first_name; 
    $email = $result->data->customer->email; 
    $amount = $result->data->amount;
    $fullname = $lname.' ' .$fname;
    date_default_timezone_set('Africa/lagos');
    $date_time = date('m/d/Y h:i:s a', time());
    include_once('classes/Admin.php');
    $admin = new Admin();
    $admin->users($fullname, $amount, $status, $reference, $email, $date_time);
    $_SESSION['message'] = "Payment Sucessful";
    header('location:payment.php');

  }else {
    # code...
    echo "error";
  }
?>