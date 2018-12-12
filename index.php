<?php 

$filename = 'counter.txt';
$ip_filename = 'ip.txt';

function inc_counter()
{
	global $filename, $ip_filename;
	$ip_address = $_SERVER['REMOTE_ADDR'];

	$the_array = file($ip_filename, FILE_IGNORE_NEW_LINES);

	if (!in_array($ip_address, $the_array)) {
		$current_value = (file_exists($filename)) ? file_get_contents($filename): 0;
		file_put_contents($ip_filename, $ip_address."\n", FILE_APPEND);
		file_put_contents($filename, ++$current_value);		
	}
}

inc_counter();

?>