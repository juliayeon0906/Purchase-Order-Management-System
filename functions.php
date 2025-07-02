<?php

class functions{
    public function listParts274(){
        include 'db-connect.php';
        $statement = "SELECT * FROM Parts274";
        if($result = mysqli_query($conn, $statement)) {
            while($row = mysqli_fetch_array($result)){
                echo "<div class=\"border border-primary border-2 m-2 p-2\">"
                ."<p>Part Number : ".$row['partNo274']."</p>"
                ."<p>Part Description : ".$row['descPart']."</p>"
                ."<p>Price of Part : $".$row['pricePart']."</p>"
                ."<p>QOH : ".$row['qoh']."</p>"
                ."</div>";
            }
        }
        else {
            return "ERROR: " . mysqli_error($conn);
        }
    }
    public function listPOs274(){
        include 'db-connect.php';
        $statement = "SELECT * FROM POs274";
        if($result = mysqli_query($conn, $statement)) {
            while($row = mysqli_fetch_array($result)){
                echo "<div class=\"border border-primary border-2 m-2 p-2\">"
                ."<p>Purchase Order Number : ".$row['poNo274']."</p>"
                ."<p>Client Company ID : ".$row['poClientCompId']."</p>"
                ."<p>Date of PO : ".$row['dateOfPO']."</p>"
                ."<p>Status : ".$row['statusPO']."</p>"
                ."</div>";
            }
        }
        else {
            return "ERROR: " . mysqli_error($conn);
        }
    }

    public function listPOinfo274($poNo){
        include 'db-connect.php';
        $statement1 = "SELECT poNo274, dateOfPO, poClientCompId FROM POs274 WHERE poNo274 = $poNo";
        $statement2 = "SELECT lineNo274, linePartNo, qtyOrdered, priceOrdered FROM Lines274, POs274 WHERE Lines274.linePoNo274 = POs274.poNo274 AND Lines274.linePoNo274= $poNo";
        if($result = mysqli_query($conn, $statement1)){
            while($row = mysqli_fetch_array($result)){
                echo "<div class=\"border border-primary border-2 m-2 p-2\">"
                ."<p>Purchase Order Number : ".$row['poNo274']."</p>"
                ."<p>Client Company ID : ".$row['poClientCompId']."</p>"
                ."<p>Date of PO : ".$row['dateOfPO']."</p>"
                ."</div>";
            }
        }
        else{
            echo "ERROR: " . mysqli_error($conn);
        }
        $lineCounter = 1;
        if($result = mysqli_query($conn, $statement2)){
            while($row = mysqli_fetch_array($result)){
                echo "<div class=\"border border-primary border-2 m-2 p-2\">"
                ."<p>Line Number : ".$row['lineNo274']."</p>"
                ."<p>Part number Ordered : ".$row['linePartNo']."</p>"
                ."<p>Quantity Ordered : ".$row['qtyOrdered']."</p>"
                ."<p>Price Ordered : $".$row['priceOrdered']."</p>"
                ."</div>";

                $lineCounter++;
            }
        }
        else{
            echo "ERROR: " . mysqli_error($conn);
        }
    }

    public function submit274($clientId, $poDate, $partNo1, $partQty1, $partPrice1, $partNo2, $partQty2, $partPrice2, $partNo3, $partQty3, $partPrice3, $partNo4, $partQty4, $partPrice4, $partNo5, $partQty5, $partPrice5){
        include 'db-connect.php';

        $clientSql = "SELECT clientId274 FROM Clients274 WHERE clientId274 = $clientId";
        $result = mysqli_query($conn, $clientSql);
        $validClient = false;
        if ($result) {
            if (mysqli_num_rows($result) == 0) {
                echo "<p>ERROR: Invalid Client Id</p>";
            }else{
                $validClient=true;
            }
        } else {
            return "ERROR: " . mysqli_error($conn);
        }
        $numOfPart = array($partNo1, $partNo2, $partNo3, $partNo4, $partNo5);
        $partQtyArr = array($partQty1, $partQty2, $partQty3, $partQty4, $partQty5);
        $partPriceArr = array($partPrice1, $partPrice2, $partPrice3, $partPrice4, $partPrice5);
        for($i = count($numOfPart) - 1; $i >=0; $i--){
            if($numOfPart[$i] !== ''){
                break;
            }
            unset($numOfPart[$i]);
            unset($partQtyArr[$i]);
            unset($partPriceArr[$i]);
        }

        $length = count($numOfPart);
        $count = 0;
        while($count < $length){
            $partNo = $numOfPart[$count];
            $partQty = $partQtyArr[$count];

            $partSql = "SELECT partNo274 FROM Parts274 WHERE partNo274 = $partNo";
            $result = mysqli_query($conn, $partSql);
            $validPart = false;
            if($result) {
                if(mysqli_num_rows($result) == 0) {
                    echo "<p>ERROR: Invalid Part No ".$partNo."</p>";
                }else{
                    $validPart = true;
                }
            } else {
                echo "ERROR: " . mysqli_error($conn);
            }
            if($validPart){
                $qtySql = "SELECT qoh FROM Parts274 WHERE qoh >= $partQty AND partNo274 = $partNo";
                $result = mysqli_query($conn, $qtySql);
                $enoughQty = false;
                if($result) {
                    if(mysqli_num_rows($result) == 0) {
                        echo "<p>ERROR: There is no sufficient quantity on stock for Part ".$partNo."</p>";
                    }else{
                        $enoughQty = true;
                    }
                }else {
                    echo "ERROR: " . mysqli_error($conn);
                }
            }
            $count++;
        }

        // validation passes
        if($validClient && $validPart && $enoughQty) {
            echo "<p>Validation Passed!</p>";
            $poNoSql = "SELECT poNo274 FROM POs274";
            $result = mysqli_query($conn, $qtySql);
            
            $existingPoNos = [];
            while ($row = mysqli_fetch_array($result)) {
                $existingPoNos[] = $row['poNo274'];
            }

            do {
                $poNo = rand(1000, 2000);
            } while (in_array($poNo, $existingPoNos));
            
            $insertPO = "INSERT INTO `POs274` (`poNo274`, `poClientCompId`, `dateOfPO`, `statusPO`) VALUES ('$poNo', '$clientId', '$poDate', 'Order Received')";
            if($result = mysqli_query($conn, $insertPO)){
                echo "<p>PO has been added!</p>
                <p>Your PO Number is ".$poNo."</p>";
            } else {
                echo "ERROR: " . mysqli_error($conn);
            }

            $count = 0;
            while ($count < $length){
                $partNo = $numOfPart[$count];
                $partQty = $partQtyArr[$count];
                $partPrice = $partPriceArr[$count];
                $lineNo = $count + 1;
                $insertLine = "INSERT INTO `Lines274` VALUES ('$lineNo', '$poNo', '$partNo', '$partQty', '$partPrice')";
                $result = mysqli_query($conn, $insertLine);
                $count++;
            }
            if($result){
                echo "<p>Lines of PO has been added!</p>";
            } else {
                echo "ERROR: " . mysqli_error($conn);
            }

        }
    }
}

?>