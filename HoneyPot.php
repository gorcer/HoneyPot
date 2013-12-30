<?php

/**
 * HoneyPot class file.
 *
 * @author Egor Zaretskiy <gorcer@gmail.com>
 * @link https://github.com/gorcer/HoneyPot
  */

class HoneyPot {
	
	public $access_key = '';
	
	public function check($ip=false)
	{
		
		if (!$ip)
		$ip = $_SERVER['REMOTE_ADDR'];
		
		if ($this->access_key=='')
			throw new EAuthException(Yii::t('honeypot', 'Undefined access key'), 500);
		
		$access_key = $this->access_key;
		$domain = 'dnsbl.httpbl.org';
		$dns_query = $access_key . '.' . implode ( '.', array_reverse ( explode ( '.', $ip ) ) ) . '.' . $domain;
		
		$dns_response = @gethostbyname ( $dns_query );		
		if ($dns_query != $dns_response) {			
			return false;
		} else
			return true;		
	}
	
	public function init()
	{
		
	}
}
