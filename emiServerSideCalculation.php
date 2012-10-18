<?php
$principal = mysql_real_escape_string($_GET['principal']);
$rate = mysql_real_escape_string($_GET['rate']);
$time = mysql_real_escape_string($_GET['time']);
$emi = $principal * $rate;
$temp = $rate + 1;
$temp = pow($temp, $time);
$emi = $emi * $temp / ($temp-1);
$totalInterest = ($emi*$time) - $principal;
$totalPayment =$principal + $totalInterest;
$emiXml = new SimpleXMLElement('<xml/>');
$root = $emiXml->addChild('LoanCalculator');
$root->addChild('emi', $emi);
$root->addChild('totalInterest', $totalInterest);
$root->addChild('totalPayment', $totalPayment);
header('Content-type : text/xml');
print($emiXml->asXML());
?>