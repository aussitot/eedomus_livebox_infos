<?php

// paramètres
$myhost = "192.168.1.1"; //adresse IP de votre livebox sur le réseau local
$myusername = "admin"; //login pour accéder à la console d'administration de la livebox
$mypassword = "mdpadefinir"; //password pour accéder à la console d'administration de la livebox

// authentification
$headers = array("Content-Type: application/json");
$response = httpQuery("http://".$myhost."/authenticate?username=".$myusername."&password=".$mypassword,"POST",null,null,$headers,true);
$json = sdk_json_decode($response);

/*echo "<xmp>";
var_dump($json);
echo "</xmp>";*/

if ($json['status'] != '')
  {
    die("Erreur lors de l'authentification: <b>".$json['status']."</b>");
  }
if (isset($json['data']['contextID']))
  {
    $access_token = $json['data']['contextID'];
  }

//recupération des infos de connexion
$headers = array("Content-Type: application/json","X-Context: ".$access_token);

switch($_GET['action']){

	case 'wifistate':
		$response = httpQuery("http://".$myhost."/sysbus/NMC/Wifi:get","POST",'{"parameters":{}}',null,$headers,true);
		//$json = sdk_json_decode($response);
		echo $response;
	break;

	case 'lanstate':
		$response = httpQuery("http://".$myhost."/sysbus/NeMo/Intf/lan:getMIBs","POST",'{"parameters":{}}',null,$headers,true);
		echo $response;
	break;

	case 'dslstate':
		$response = httpQuery("http://".$myhost."/sysbus/NeMo/Intf/dsl0:getDSLStats","POST",'{"parameters":{}}',null,$headers,true);
		echo $response;
	break;

	case 'users':
		$response = httpQuery("http://".$myhost."/sysbus/UserManagement:getUsers","POST",'{"parameters":{}}',null,$headers,true);
		echo $response;
	break;

	case 'iplan':
		$response = httpQuery("http://".$myhost."/sysbus/NeMo/Intf/lan:luckyAddrAddress","POST",'{"parameters":{}}',null,$headers,true);
		echo $response;
	break;

	case 'ipwan':
		$response = httpQuery("http://".$myhost."/sysbus/NeMo/Intf/data:luckyAddrAddress","POST",'{"parameters":{}}',null,$headers,true);
		echo $response;
	break;

	case 'wanstate':
		$response = httpQuery("http://".$myhost."/sysbus/NMC:getWANStatus","POST",'{"parameters":{}}',null,$headers,true);
		echo $response;
	break;

	case 'phonestate':
		$response = httpQuery("http://".$myhost."/sysbus/VoiceService/VoiceApplication:listTrunks","POST",'{"parameters":{}}',null,$headers,true);
		echo $response;
	break;

	case 'tvstate':
		$response = httpQuery("http://".$myhost."/sysbus/NMC/OrangeTV:getIPTVStatus","POST",'{"parameters":{}}',null,$headers,true);
		echo $response;
	break;

	case 'hosts':
		$response = httpQuery("http://".$myhost."/sysbus/Hosts:getDevices","POST",'{"parameters":{}}',null,$headers,true);
		echo $response;
	break;

	case 'reboot':
		$response = httpQuery("http://".$myhost."/sysbus/NMC:reboot","POST",'{"parameters":{}}',null,$headers,true);
		echo $response;
	break;

	case 'wifion':
		$response = httpQuery("http://".$myhost."/sysbus/NMC/Wifi:set","POST",'{"parameters":{"Enable":true,"Status":true}}',null,$headers,true);
		echo $response;
	break;

	case 'wifioff':
		$response = httpQuery("http://".$myhost."/sysbus/NMC/Wifi:set","POST",'{"parameters":{"Enable":false,"Status":false}}',null,$headers,true);
		echo $response;
	break;

	case 'mibs':
		$response = httpQuery("http://".$myhost."/sysbus/NeMo/Intf/data:getMIBs","POST",'{"parameters":{}}',null,$headers,true);
		echo $response;
	break;

	case 'macoff':
		$response = httpQuery("http://".$myhost."/sysbus/NeMo/Intf/wl0:setWLANConfig","POST",'{"parameters":{"mibs":{"wlanvap":{"wl0":{"MACFiltering":{"Mode":"Off"},"WPS":{"Enable":false}}}}}}',null,$headers,true);
		echo $response;
	break;

	case 'macon':
		$response = httpQuery("http://".$myhost."/sysbus/NeMo/Intf/wl0:setWLANConfig","POST",'{"parameters":{"mibs":{"wlanvap":{"wl0":{"MACFiltering":{"Mode":"WhiteList"}}}}}}',null,$headers,true);
		echo $response;
	break;

	case 'dslinfo':
		$response = httpQuery("http://".$myhost."/sysbus/NeMo/Intf/data:getMIBs","POST",'{"parameters":{"mibs":"dsl","flag":"","traverse":"down"}}',null,$headers,true);
		echo $response;
	break;

	default:
		$result = '{"result":"Aucune action definie"}';
		echo $result;
	break;
}

/*
echo "<xmp>";
var_dump($json);
echo "</xmp>";
*/

//logout
$response = httpQuery("http://".$myhost."/logout","POST",null,null,true);

?>
