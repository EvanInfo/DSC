<?php
class TypeEnginManager
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDB($db);
    }
    

    public function insererTypeEngin(TypeEngin $engin)
    {
        //var_dump($engin->getId());
        //var_dump($engin->getlibelle());
        //var_dump($engin->getUrlImage());
        // Vérifier si tous les attributs requis sont définis et non vides
        if ($engin->getId() === null || $engin->getlibelle() === null || $engin->getUrl_Image() === null) {
            throw new Exception("Tous les attributs requis doivent être définis et non vides avant d'insérer dans la base de données.");
        }

        // Préparation de la requête d'insertion
        $requete = $this->_db->prepare("INSERT INTO type_engin (id, Libellé, Url_Image) VALUES (:id, :libelle, :url_image)");

        // Liaison des valeurs avec les paramètres de la requête
        $requete->bindValue(':id', $engin->getId());
        $requete->bindValue(':libelle', $engin->getlibelle());
        $requete->bindValue(':url_image', $engin->getUrl_Image());

        try {
            // Exécution de la requête
            $requete->execute();
        } catch (PDOException $e) {
            // Gérer les erreurs de requête ici
            throw new Exception("Erreur lors de l'insertion du type d'engin : " . $e->getMessage());
        }
    }


    public function affichageTypeEngin($idVehicule)
    {
        $q = $this->_db->prepare('SELECT Libellé FROM type_engin WHERE id = :id' );
        $q->bindValue(':id', $idVehicule, PDO::PARAM_STR);
        $q->execute();

        $typeEngin = $q->fetch(PDO::FETCH_ASSOC);
        // Fermeture du curseur
        $q->closeCursor();
        //var_dump($typeEngin);
        return  $typeEngin['Libellé'];
    }

    public function setDB(PDO $db)
    {
        $this->_db = $db;
    }
}
?>
