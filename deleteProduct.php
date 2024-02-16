<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="id">ID</label>
        <input type="number" name="id" id="">
        <input type="submit" name="delete" value="delete">
        
        
    </form>

    <?php
    require_once('utils/DBconnect.php');
    require_once('dao/imp/IProductDao.php');
    require_once('dao/ProductDaoImp.php');
    require_once('model/Produits.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["id"])) {
            $productDao=  new ProductDaoImp();
            $productDao->deleteProduct( $_POST['id']);
            
            echo"Supression réussie";
        }
    }


    ?>
    
</body>
</html>
