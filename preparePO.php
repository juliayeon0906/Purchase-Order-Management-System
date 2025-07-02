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
    <link rel="stylesheet" href="./css/style.css">
    <title>Prepare Purchase Order</title>
</head>
<body>
    <div class="container">
        <h1>Prepare Purchase Order</h1>
        <button class="backBtn btn btn-primary btn-sm m-2" onclick="location.href='index.php'">Back</button>
        <form class="border border-primary border-2 p-2" name="poInputForm" action="validatePO.php" method="post">
            <div id="clientForm" class="clientForm container">
                <h2>Client Information</h2>
                <label for="clientIdInput">Enter Client Id</label>
                <input class="d-block" type="number" name="clientIdInput" id="clientIdInput" required>
                <button type="button" id="clientInputButton" name="clientInputButton" class="clientInputButton btn btn-sm btn-primary mt-2">Submit</button>
            </div>
            <div class="poForm container" id="poForm">
                <h2>Purchase Order Information</h2>
                <label for="poDateInput">Enter Today's Date</label>
                <input class="d-block" type="date" name="poDateInput" id="poDateInput" required>
                <button type="button" id="poFormButton" name="poFormButton" class="btn btn-sm btn-primary mt-2">Submit</button>
            </div>
            <div class="lineForm container" id="lineForm">
                <h2>Line Information (Max : 5)</h2>
                <h3>Line #1</h3>
                <label for="partNumberInput-1">Enter Part Number</label>
                <input class="d-block" type="number" name="partNumberInput-1" id="partNumberInput-1" required>
                <label for="partQtyInput-1">Enter Quantity of Part</label>
                <input class="d-block" type="number" name="partQtyInput-1" id="partQtyInput-1" required>
                <label for="partPriceInput-1">Enter Price of Part</label>
                <input class="d-block" type="number" name="partPriceInput-1" id="partPriceInput-1" required>
                <h3>Line #2</h3>
                <label for="partNumberInput-2">Enter Part Number</label>
                <input class="d-block" type="number" name="partNumberInput-2" id="partNumberInput-2">
                <label for="partQtyInput-2">Enter Quantity of Part</label>
                <input class="d-block" type="number" name="partQtyInput-2" id="partQtyInput-2">
                <label for="partPriceInput-2">Enter Price of Part</label>
                <input class="d-block" type="number" name="partPriceInput-2" id="partPriceInput-2">
                <h3>Line #3</h3>
                <label for="partNumberInput-3">Enter Part Number</label>
                <input class="d-block" type="number" name="partNumberInput-3" id="partNumberInput-3">
                <label for="partQtyInput-3">Enter Quantity of Part</label>
                <input class="d-block" type="number" name="partQtyInput-3" id="partQtyInput-3">
                <label for="partPriceInput-3">Enter Price of Part</label>
                <input class="d-block" type="number" name="partPriceInput-3" id="partPriceInput-3">
                <h3>Line #4</h3>
                <label for="partNumberInput-4">Enter Part Number</label>
                <input class="d-block" type="number" name="partNumberInput-4" id="partNumberInput-4">
                <label for="partQtyInput-4">Enter Quantity of Part</label>
                <input class="d-block" type="number" name="partQtyInput-4" id="partQtyInput-4">
                <label for="partPriceInput-4">Enter Price of Part</label>
                <input class="d-block" type="number" name="partPriceInput-4" id="partPriceInput-4">
                <h3>Line #5</h3>
                <label for="partNumberInput-5">Enter Part Number</label>
                <input class="d-block" type="number" name="partNumberInput-5" id="partNumberInput-5">
                <label for="partQtyInput-5">Enter Quantity of Part</label>
                <input class="d-block" type="number" name="partQtyInput-5" id="partQtyInput-5">
                <label for="partPriceInput-5">Enter Price of Part</label>
                <input class="d-block" type="number" name="partPriceInput-5" id="partPriceInput-5">
            </div>
            <button type="submit" id="formSubmit" name="formSubmit" class="btn btn-sm btn-primary mt-2" onclick="location.href='validatePO.php'">Submit</button>
        </form>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>