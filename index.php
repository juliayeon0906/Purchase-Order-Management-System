<!DOCTYPE html>
<html lang="en">
<?php
    include 'db-connect.php'
?>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Assignment 2 - 4140</title>
</head>
<body class="bg-body">
    <div class="container">
        <h1 class="m-2">Main Page</h1>
        <div class="border border-primary border-2 p-3 m-2">
            <button type="submit" name="partButton" class="btn btn-primary m-2" onclick="location.href='listPart.php'">Part List</button>
            <button type="submit" name="poButton" class="btn btn-primary m-2" onclick="location.href='listPO.php'">Purchase Order List</button>
        </div>
        <div class="border border-primary border-2 p-3 m-2">
            <form name="searchForm" action="poSearch.php" method="get">
                <label for="searchInput">Enter Purchase Order</label>
                <input type="number" name="searchInput" id="searchInput">
                <button type="submit" name="searchPOButton" class="btn btn-primary m-2" onclick="location.href='poSearch.php'">Search Purchase Order</button>
            </form>
        </div>
        <div class="border border-primary border-2 p-3 m-2">
            <button type="submit" name="preparePOButton" class="btn btn-primary m-2" onclick="location.href='preparePO.php'">Prepare Purchase Order</button>
        </div>
    </div>
</body>
</html>

