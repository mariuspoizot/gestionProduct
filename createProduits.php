<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="" method="post">
        <!-- Formulaire pour saisir les informations d'une nouvelle personne -->
        <label for="noprod">N° Produit</label>
        <input type="text" name="noprod"> <br>
        <label for="name">Name</label>
        <input type="text" name="name"> <br>
        <label for="price">Price</label>
        <input type="number" name="price" min=1> <br>
        <label for="descr">Description</label>
        <input type="text" name="descr" ><br>
        <input type="submit" value="Créer">
        <br>
    </form>

    <?php
    // Inclusion du fichier contenant la classe DBconnect pour la connexion à la base de données
    require_once('utils/DBconnect.php');
    require_once('dao/imp/IProductDao.php');
    require_once('dao/ProductDaoImp.php');
    require_once('model/Produits.php');

    // Vérification si le formulaire a été soumis (méthode POST)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Vérification si les champs requis sont présents dans la requête
        if (
            isset($_POST['noprod'])
            && isset($_POST['name'])
            && isset($_POST['price'])
            && isset($_POST['descr'])
        ) {
            
            $noprod = $_POST['noprod'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $descr = $_POST['descr'] ;
            $productDao=  new ProductDaoImp();
            $productDao->getAllProduct();
            $productDao->saveProduct($noprod, $name, $price, $descr);
            

        }
    }
    ?>
</body>

</html>