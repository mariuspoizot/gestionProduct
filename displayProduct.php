<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="id" placeholder="ID" id=""> <br>
        <input type="text" name="noprod" placeholder="N° Produit" id=""> <br>
        <input type="text" name="name" placeholder="Name" id=""> <br>
        <input type="text" name="price" placeholder="Price" id=""> <br>
        <input type="text" name="descr" placeholder="Description" id=""> <br>
        <input type="submit" name="submit" > <br>
    </form>
    
</body>
</html>

<?php

require_once('utils/DBconnect.php');
require_once('dao/imp/IProductDao.php');
require_once('dao/ProductDaoImp.php');
require_once('model/Produits.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["id"])) {
        $productDao=  new ProductDaoImp();
        $productDao->updateProduct( $_POST['id'], $_POST['noprod'], $_POST['name'], $_POST['price'],$_POST['descr']);
        echo"Mise a jour reussie";
    }
}