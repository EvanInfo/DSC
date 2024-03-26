<?php
class EmployeurManager
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDB($db);
    }
    
    public function insererEmployeur(Employeur $employeur)
    {
        // Vérifier si tous les attributs requis sont définis
        if (!$employeur->getNom() || !$employeur->getPrenom() || !$employeur->getTel()) {
            throw new Exception("Tous les attributs requis doivent être définis avant d'insérer dans la base de données.");
        }

        // Utilisation des setters pour définir les valeurs des attributs
        $employeur->setNom($employeur->getNom());
        $employeur->setPrenom($employeur->getPrenom());
        $employeur->setTel($employeur->getTel());

        // Préparation de la requête d'insertion
        $requete = $this->_db->prepare("INSERT INTO employeur (Nom, Prenom, Tel) VALUES (:nom, :prenom, :tel)");

        // Liaison des valeurs avec les paramètres de la requête
        $requete->bindValue(':nom', $employeur->getNom());
        $requete->bindValue(':prenom', $employeur->getPrenom());
        $requete->bindValue(':tel', $employeur->getTel());
        // Exécution de la requête
        $requete->execute();
    }


    public function affichageEmployeur()
    {
        $q = $this->_db->prepare('SELECT * FROM employeur');
        $q->execute();

        $EmployeurInfo = $q->fetchAll(PDO::FETCH_ASSOC);

        // Fermeture du curseur
        $q->closeCursor();

        return $EmployeurInfo;
    }

    public function setDB(PDO $db)
    {
        $this->_db = $db;
    }
}
?>
