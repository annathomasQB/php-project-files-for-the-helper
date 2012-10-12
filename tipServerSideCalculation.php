<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $bill = mysql_real_escape_string($_GET['billAmount']);
        $rate = mysql_real_escape_string($_GET['tipRate']);
        $tip = $bill * $rate / 100;
        $totalAmount = $bill + $tip;
        $arr = array('tip'=>$tip, 'totalAmount'=>$totalAmount);
        $json = array('TipCalculator'=>$arr);
        echo json_encode($json);
        ?>
    </body>
</html>
