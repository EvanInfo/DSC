<?php
class VolontaireManager
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDB($db);
    }
    
    public function inserer(Volontaire $volontaire)
    {
        // Vérifier si tous les attributs requis sont définis
        if (!$volontaire->getMatricule()) {
            throw new Exception("Tous les attributs requis doivent être définis avant d'insérer dans la base de données.");
        }

        // Préparation de la requête d'insertion
        $requete = $this->_db->prepare("INSERT INTO volontaire (Matricule) VALUES (:matricule)");

        // Liaison des valeurs avec les paramètres de la requête
        $requete->bindValue(':matricule', $volontaire->getMatricule());
 

        // Exécution de la requête
        $requete->execute();
    }

    public function setDB(PDO $db)
    {
        $this->_db = $db;
    }
}
?>
