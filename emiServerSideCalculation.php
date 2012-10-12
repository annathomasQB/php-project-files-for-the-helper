<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $principal = mysql_real_escape_string($_GET['principal']);
        $rate = mysql_real_escape_string($_GET['rate']);
        echo "the rate is ".$rate;
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
    </body>
</html>
