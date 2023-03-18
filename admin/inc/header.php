<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<?php
include '../classes/producer.php';
$producer = new producer();
include '../classes/product.php';
$product = new product();
include '../classes/category.php';
$category = new category();
include '../classes/categorysub.php';
$categorysub = new categorysub();
include '../classes/typeproduct.php';
$typeproduct = new typeproduct();
include '../classes/cart.php';
$cart = new cart();
include '../classes/customer.php';
$customer = new customer();
include '../classes/admin.php';
$admin = new admin();
include '../classes/voucher.php';
$voucher = new voucher();
include '../classes/store.php';
$store = new store();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="./images/logo_luonvuituoi.png" type="image/x-icon">
    <title>Admin | luonvuituoiStore</title>
    <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="./css/sb-admin-2.css" rel="stylesheet" />
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/PagedList.css" rel="stylesheet" type="text/css" />
    <link href="../themes/base/jquery-ui.min.css" rel="stylesheet" />
    <link href="../css/value.css" rel="stylesheet" />
    <link href="../css/PagedList.css" rel="stylesheet" type="text/css" />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<body>
    <div id="wrapper">
        <?php include 'menuadmin.php'; ?>