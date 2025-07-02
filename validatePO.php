<!DOCTYPE html>
<html lang="en">
<?php
    include 'db-connect.php';
    require 'functions.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Validate Purchase Order</title>
</head>
<body>
    <?php
        $clientId = isset($_REQUEST["clientIdInput"]) ? trim($_REQUEST["clientIdInput"]) : '';
        $poDate = isset($_REQUEST["poDateInput"]) ? trim($_REQUEST["poDateInput"]) : '';
        $partNo1 = isset($_REQUEST["partNumberInput-1"]) ? trim($_REQUEST["partNumberInput-1"]): '';
        $partQty1 = isset($_REQUEST["partQtyInput-1"]) ? trim($_REQUEST["partQtyInput-1"]) : '';
        $partPrice1 = isset($_REQUEST["partPriceInput-1"]) ? trim($_REQUEST["partPriceInput-1"]) : '';
        $partNo2 = isset($_REQUEST["partNumberInput-2"]) ? trim($_REQUEST["partNumberInput-2"]) : '';
        $partQty2 = isset($_REQUEST["partQtyInput-2"]) ? trim($_REQUEST["partQtyInput-2"]) : '';
        $partPrice2 = isset($_REQUEST["partPriceInput-2"]) ? trim($_REQUEST["partPriceInput-2"]) : '';
        $partNo3 = isset($_REQUEST["partNumberInput-3"]) ? trim($_REQUEST["partNumberInput-3"]) : '';
        $partQty3 = isset($_REQUEST["partQtyInput-3"]) ? trim($_REQUEST["partQtyInput-3"]) : '';
        $partPrice3 = isset($_REQUEST["partPriceInput-3"]) ? trim($_REQUEST["partPriceInput-3"]) : '';
        $partNo4 = isset($_REQUEST["partNumberInput-4"]) ? trim($_REQUEST["partNumberInput-4"]) : '';
        $partQty4 = isset($_REQUEST["partQtyInput-4"]) ? trim($_REQUEST["partQtyInput-4"]) : '';
        $partPrice4 = isset($_REQUEST["partPriceInput-4"]) ? trim($_REQUEST["partPriceInput-4"]) : '';
        $partNo5 = isset($_REQUEST["partNumberInput-5"]) ? trim($_REQUEST["partNumberInput-5"]) : '';
        $partQty5 = isset($_REQUEST["partQtyInput-5"]) ? trim($_REQUEST["partQtyInput-5"]) : '';
        $partPrice5 = isset($_REQUEST["partPriceInput-5"]) ? trim($_REQUEST["partPriceInput-5"]) : '';
    ?>
    <div class="container">
        <div class="border border-primary border-2 p-2 m-2">
            <?php
                $validate = new functions();
                $validate -> submit274($clientId, $poDate, $partNo1, $partQty1, $partPrice1, $partNo2, $partQty2, $partPrice2, $partNo3, $partQty3, $partPrice3, $partNo4, $partQty4, $partPrice4, $partNo5, $partQty5, $partPrice5);
            ?>
        </div>
        <button class="backBtn btn btn-primary btn-sm m-2" onclick="location.href='preparePO.php'">Back</button>
        <button class="homeBtn btn btn-primary btn-sm m-2" onclick="location.href='index.php'">Home</button>
    </div>
</body>
</html>