<?php

set_time_limit(0);
function downloadfile()
{
	$options = array(
	  CURLOPT_TIMEOUT =>  5,
	  CURLOPT_URL     => "http://freedom-01.serv.totalfreedom.me:28966/players",
	  CURLOPT_RETURNTRANSFER => true 
	);

	$ch = curl_init();
	curl_setopt_array($ch, $options);
	$result = curl_exec($ch);
	curl_close($ch);

	if ($result)
	{
		$fp = fopen("players.json", "w");
		fwrite($fp, $result);
		fclose($fp);
	}
}

downloadfile();

$json = file_get_contents("players.json");

header("Content-Type: application/json");
echo $json;

?>
