HoneyPot
========

Extension check IP in global anti-spam database http://www.projecthoneypot.org

Install
=======
1. Register on http://www.projecthoneypot.org
2. Go to Services - HTTP Black List - Enter capcha - get your http:BL Access Key 
3. Copy HoneyPot path to your extension path
4. Add to config:
'components'=>array(
	'honeypot' => array(
					'class' => 'application.extensions.HoneyPot.HoneyPot',
					'access_key'=>'YOUR-ACCESS-KEY'
			),
			.....
			)
			
			
Usage
=====			

$result=Yii::app()->honeypot->check($ip);

Check ip in Honeypot database. Return *true* if IP didn't exists and *false* if ip found.
To view information about blocked ip see this page http://www.projecthoneypot.org/ip_{IP} (replace {IP}).
$ip is optional, by default it's $_SERVER['REMOTE_ADDR'].
