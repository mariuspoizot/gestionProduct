<?php
class ProductDaoImp implements IProductDAO
{
    private PDO $connexion ;

    public function __construct() {
        $this->connexion =DBconnect::getInstance(
            "mysql:host=localhost;dbname=courspdo",
            "root",
            ""
        )->getConnexion();
    }
    public  function getAllProduct(): array
    {
        // Tableau pour stocker les personnes récupérées
        $product = [];

        try {
            // Récupération de l'instance de connexion à la base de données via le singleton DBconnect
            $connexion = DBconnect::getInstance(
                "mysql:host=localhost;dbname=courspdo",
                "root",
                ""
            );

            // Préparation de la requête SQL pour récupérer toutes les personnes
            $statement = $connexion->getConnexion()->prepare("SELECT * FROM produits ;");
            // Exécution de la requête SQL
            $statement->execute();
            // Récupération des résultats sous forme de tableau associatif
            $resultat = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Si des résultats sont trouvés
            if (count($resultat) > 0) {
                // Parcours des résultats pour créer des objets Person
                foreach ($resultat as $row) {
                    // Création d'un nouvel objet Person avec les données récupérées
                    $product[] = new Produits(
                        $row['id'],
                        $row['noprod'],
                        $row['name'],
                        $row['price'] ,
                        $row['descr'],
                    );
                }
            }
        }
        // Gestion des exceptions PDO
        catch (PDOException $e) {
            // Affichage du message d'erreur en cas d'échec
            echo "Erreur : " . $e->getMessage();
        }

        // Retourne le tableau des personnes récupérées depuis la base de données
        return $product;
    }
    //Methode statique creation de person
    public  function saveProduct(string $noprod, string $name, float $price, string $descr){ 
        try {
            // Tentative d'obtention de l'instance de connexion à la base de données via le singleton DBconnect
            $connexion = DBconnect::getInstance(
                "mysql:host=localhost;dbname=courspdo",
                "root",
                ""
            );

            // Définition de la requête SQL pour insérer une nouvelle personne dans la table 'persons'
            $query = "INSERT INTO produits (noprod , name , price , descr ) VALUES (:noprod , :name , :price, :descr)";

            // Préparation de la requête SQL
            $stmt = $connexion->getConnexion()->prepare($query);

            // Liaison des valeurs des champs du formulaire avec les paramètres de la requête SQL
            $stmt->bindValue(':noprod', $noprod);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':price', $price);
            $stmt->bindValue(':descr', $descr);
            // Exécution de la requête SQL préparée
            $stmt->execute();
            // Affichage d'un message de réussite si l'insertion s'est déroulée avec succès
            echo "Enregistrement réussi !";
        } catch (PDOException $e) {
            // Affichage d'un message d'erreur en cas d'échec de l'insertion
            echo $e->getMessage();
        }
    }

     public function getProductById($id) : array 
    {
        $result = null; // Initialisation de la variable résultat à null

        try {
            $connexion = DBconnect::getInstance(
                "mysql:host=localhost;dbname=courspdo",
                "root",
                ""
            );
            $query = "SELECT * FROM product WHERE id = :id";
            $stmt = $connexion->getConnexion()->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
    }

      public function deleteProduct(int $id): bool 
    {
        try {

            $connexion = DBconnect::getInstance(
                "mysql:host=localhost;dbname=courspdo",
                "root",
                ""
            );

            $query = "DELETE FROM produits WHERE id = :id";

            $stmt = $connexion->getConnexion()->prepare($query);

            $stmt->bindValue(":id", $id);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return false;
    }


    // Méthode statique pour mettre à jour les informations d'une personne
     function updateProduct(int $id, string $noprod, string $name, float $price, string $descr)
    {
        try {
            // Obtention de l'instance de connexion à la base de données via le singleton DBconnect
            $connexion = DBconnect::getInstance(
                "mysql:host=localhost;dbname=courspdo",
                "root",
                ""
            );

            // Requête SQL pour mettre à jour les informations d'une personne avec un ID donné
            $query  = "UPDATE produits SET  noprod = :noprod , name = :name , price = :price , descr = :descr  WHERE id = :id ;";

            // Préparation de la requête SQL
            $stmt = $connexion->getConnexion()->prepare($query);

            // Liaison des valeurs des paramètres de la requête SQL préparée
            $stmt->bindValue(":id", $id);
            $stmt->bindValue(':noprod', $noprod);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':price', $price);
            $stmt->bindValue('descr', $descr);

            // Exécution de la requête SQL préparée
            $stmt->execute();
        } catch (PDOException $PDOException) {
            // Gestion des exceptions PDO : affichage du message d'erreur
            echo $PDOException->getMessage();
        }
    }

    function getProductByName(string $name) : array{
         
    {
        $result = null; // Initialisation de la variable résultat à null

        try {
            $connexion = DBconnect::getInstance(
                "mysql:host=localhost;dbname=courspdo",
                "root",
                ""
            );
            $query = "SELECT * FROM product WHERE name LIKE %$name% ;";
            $stmt = $connexion->getConnexion()->prepare($query);
            $stmt->bindValue(':name', $name);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    }
}

