<?php
///* ========================= TEST PARAMETERS START =========================
// set from your own Authentication method for live data! (and, certainly change those defaults on a live site!)
$user = 'Admin';
$pass = 'password';
// set to your root folder where phpScheduleIt is installed
$server_url = "http://localhost:8888/booked";
// ========================= TEST PARAMETERS END ========================= */

// create login/auth info
// need username and password in an array to do json_encode
$body = array('username' => $user, 'password' => $pass);

// make sure it is utf-8 so json is happy (you may not need this step, but a good idea...)
$body = array_map(utf8_encode, $body );

// create the post data for the auth
$body =  json_encode($body );
echo $body;
// set the url for accessing the call you want
$url = $server_url . "/Web/Services/Authentication/Authenticate";

// make the call to the API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// grab URL and pass it to the browser, retaining the reply
$reply = curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);

// see what we got
echo $reply . "<br>";

// Convert JSON to an array
//$auth= json_decode($reply);

//  Display the array
/*
echo "<br>sessionToken = " . $auth['sessionToken'];
echo "<br>sessionExpires = " . $auth['sessionExpires'];
echo "<br>userId = " . $auth['userId'];
echo "<br>isAuthenicated = " . $auth['isAuthenticated'];
echo "<br>links = " . $auth['links']['href'];
echo "<br>message = " . $auth['links']['message'];
*/

//  Session token to make additional requests
//curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-phpScheduleIt-SessionToken" => $header_data['sessionToken'], "X-phpScheduleIt-UserId" => . $auth['userId']);
?>