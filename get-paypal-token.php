<?php
	$ch = curl_init();
	$clientId = "AaxJqfadw_mUp4eQXENzkGKe7esNewGzm496O2fVwBLG0pwTte3HADFWzKxeECAgObpVyzaSFIGBu92x";
	$secret = "EPRvzoPiGAwEp7woOplrFf1lQXygNcHwCP_FlOHBwqAe1bHU8vReujWHwaUkvxSqNpbbSjOpVfo03STt";

	curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSLVERSION , 6); //NEW ADDITION
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

	$result = curl_exec($ch);

	if(empty($result))die("Error: No response.");
	else
	{
	    $json = json_decode($result);
	    print_r($json->access_token);
	}

	curl_close($ch); //THIS CODE IS NOW WORKING!



?>
