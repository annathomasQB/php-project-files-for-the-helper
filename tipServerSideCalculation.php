        <?php
        $bill = mysql_real_escape_string($_GET['billAmount']);
        $rate = mysql_real_escape_string($_GET['tipRate']);
        $tip = $bill * $rate / 100;
        $totalAmount = $bill + $tip;
        $arr = array('tip'=>$tip, 'totalAmount'=>$totalAmount);
        $json = array('TipCalculator'=>$arr);
        echo json_encode($json);
        ?>