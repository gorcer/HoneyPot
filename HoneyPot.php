<?php


class HoneyPot {
	
	public static function check($ip=false)
	{
		if (!$ip)
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$access_key = '';
		$domain = 'dnsbl.httpbl.org';
		$dns_query = $access_key . '.' . implode ( '.', array_reverse ( explode ( '.', $ip ) ) ) . '.' . $domain;
		
		$dns_responce = gethostbyname ( $dns_query );
		if ($dns_query != $dns_responce) {
			//@file_put_contents ( ROOT . 'cache/blackip_activity.log', date ( 'Y/m/d H:i' ) . " $ip => $dns_responce\t" . getenv ( 'REQUEST_URI' ) . "\n", FILE_APPEND );
			return explode ( '.', $dns_responce );
		} else
			return null;
		
	}
}