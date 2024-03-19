<?php
class PompierManager
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDB($db);
    }
    
    public function inserer(Pompier $pompier)
    {
        // Vérifier si tous les attributs requis sont définis
        if (!$pompier->getMatricule() || !$pompier->getNom() || !$pompier->getPrenom() || !$pompier->getDateNaiss() || !$pompier->getTel() || !$pompier->getSexe() || !$pompier->getId() || !$pompier->getIdCaserne()) {
            throw new Exception("Tous les attributs requis doivent être définis avant d'insérer dans la base de données.");
        }

        // Préparation de la requête d'insertion
        $requete = $this->_db->prepare("INSERT INTO pompier (Matricule, Nom, Prenom, DateNaiss, Tel, Sexe, id, idCaserne   ) VALUES (:matricule, :nom, :prenom, :dateNaiss, :tel, :sexe, :id, :idcaserne)");

        // Liaison des valeurs avec les paramètres de la requête
        $requete->bindValue(':matricule', $pompier->getMatricule());
        $requete->bindValue(':nom', $pompier->getNom());
        $requete->bindValue(':prenom', $pompier->getPrenom());
        $requete->bindValue(':dateNaiss', $pompier->getDateNaiss());
        $requete->bindValue(':tel', $pompier->getTel());
        $requete->bindValue(':sexe', $pompier->getSexe());
        $requete->bindValue(':id', $pompier->getId());
        $requete->bindValue(':idcaserne', $pompier->getIdCaserne());

        // Exécution de la requête
        $requete->execute();
    }

    public function setDB(PDO $db)
    {
        $this->_db = $db;
    }
}
?>
