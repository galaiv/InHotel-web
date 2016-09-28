<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Authorize{
 	function __construct(){
		$this->ci =& get_instance();
	} 
  public function setSubscribeXmlContent($conf){
  	 if(isset($conf) && !empty($conf)){
	 	$content =
			"<?xml version=\"1.0\" encoding=\"utf-8\"?>" .
			"<ARBCreateSubscriptionRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">" .
			"<merchantAuthentication>".
			"<name>" . $conf["loginname"]  . "</name>".
			"<transactionKey>" . $conf["transactionkey"] . "</transactionKey>".
			"</merchantAuthentication>".
			"<refId>" . $conf["refId"] . "</refId>".
			"<subscription>".
			"<name>" . $conf["name"] . "</name>".
			"<paymentSchedule>".
			"<interval>".
			"<length>". $conf["length"] ."</length>".
			"<unit>". $conf["unit"] ."</unit>".
			"</interval>".
			"<startDate>" . $conf["startDate"] . "</startDate>".
			"<totalOccurrences>". $conf["totalOccurrences"] . "</totalOccurrences>".
			"<trialOccurrences>". $conf["trialOccurrences"] . "</trialOccurrences>".
			"</paymentSchedule>".
			"<amount>". $conf["amount"] ."</amount>".
			"<trialAmount>" . $conf["trialAmount"] . "</trialAmount>".
			"<payment>".
			"<creditCard>".
			"<cardNumber>" . $conf["cardNumber"] . "</cardNumber>".
			"<expirationDate>" . $conf["expirationDate"] . "</expirationDate>".
			"</creditCard>".
			"</payment>".
			"<billTo>".
			"<firstName>". $conf["firstName"] . "</firstName>".
			"<lastName>" . $conf["lastName"] . "</lastName>".
			"</billTo>".
			"</subscription>".
			"</ARBCreateSubscriptionRequest>";
		return  $content;
	 }	
	 
  }
  function setCancelXmlContent($conf){
  	$content =
        "<?xml version=\"1.0\" encoding=\"utf-8\"?>".
        "<ARBCancelSubscriptionRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">".
        "<merchantAuthentication>".
        "<name>" . $conf["loginname"] . "</name>".
        "<transactionKey>" . $conf["transactionkey"] . "</transactionKey>".
        "</merchantAuthentication>" .
        "<subscriptionId>" . $conf["subscriptionId"] . "</subscriptionId>".
        "</ARBCancelSubscriptionRequest>";
		return  $content;
  }
  function setStatusXmlContent($conf){
  	$content =
        "<?xml version=\"1.0\" encoding=\"utf-8\"?>".
        "<ARBGetSubscriptionStatusRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">".
        "<merchantAuthentication>".
        "<name>" . $conf["loginname"] . "</name>".
        "<transactionKey>" . $conf["transactionkey"] . "</transactionKey>".
        "</merchantAuthentication>" .
        "<subscriptionId>" . $conf["subscriptionId"] . "</subscriptionId>".
        "</ARBGetSubscriptionStatusRequest>";
		return  $content;	
  }
 
	 //function to send xml request via curl
	function send_request_via_curl($host,$path,$content)
	{
		$posturl = "https://" . $host . $path;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $posturl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$response = curl_exec($ch);
		return $response;
	} 
	

	//function to parse Authorize.net response
	function parse_return($content)
	{
		$refId = $this->substring_between($content,'<refId>','</refId>');
		$resultCode = $this->substring_between($content,'<resultCode>','</resultCode>');
		$code = $this->substring_between($content,'<code>','</code>');
		$text = $this->substring_between($content,'<text>','</text>');
		$subscriptionId = $this->substring_between($content,'<subscriptionId>','</subscriptionId>');
		return array ($refId, $resultCode, $code, $text, $subscriptionId);
	}

	//helper function for parsing response
	function substring_between($haystack,$start,$end) 
	{
		if (strpos($haystack,$start) === false || strpos($haystack,$end) === false) 
		{
			return false;
		} 
		else 
		{
			$start_position = strpos($haystack,$start)+strlen($start);
			$end_position = strpos($haystack,$end);
			return substr($haystack,$start_position,$end_position-$start_position);
		}
	}		
}

?>