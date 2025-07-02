<!DOCTYPE html>
<html lang="en">
<?php
    include 'db-connect.php';
    require "functions.php";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Purchase Order List</title>
</head>
<body class="bg-body">
    <div class="container">
        <h1 class="m-2">Purchase Order Information</h1>
        <div class="border border-primary border-2 p-3">
            <?php
                $listPO = new functions();
                $listPO->listPOs274();
            ?>
        </div>
        <button class="backBtn btn btn-primary btn-sm m-2" onclick="location.href='index.php'">Back</button>
    </div>
</body>
</html>