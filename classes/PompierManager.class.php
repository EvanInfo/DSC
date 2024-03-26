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
        if (!$pompier->getMatricule() || !$pompier->getNom() || !$pompier->getPrenom() || !$pompier->getDateNaiss() || !$pompier->getTel() || !$pompier->getSexe() || !$pompier->getId()) {
            throw new Exception("Tous les attributs requis doivent être définis avant d'insérer dans la base de données.");
        }
        $pompier->setMatricule($pompier->getMatricule());
        $pompier->setNom($pompier->getNom());
        $pompier->setPrenom($pompier->getPrenom());
        $pompier->setDateNaiss($pompier->getDateNaiss());
        $pompier->setTel($pompier->getTel());
        $pompier->setSexe($pompier->getSexe());
        $pompier->setId($pompier->getId());
        

        // Préparation de la requête d'insertion
        $requete = $this->_db->prepare("INSERT INTO pompier (Matricule, Nom, Prénom, DateNaiss, Tel, Sexe, id) VALUES (:matricule, :nom, :prenom, :dateNaiss, :tel, :sexe, :id)");

        // Liaison des valeurs avec les paramètres de la requête
        $requete->bindValue(':matricule', $pompier->getMatricule());
        $requete->bindValue(':nom', $pompier->getNom());
        $requete->bindValue(':prenom', $pompier->getPrenom());
        $requete->bindValue(':dateNaiss', $pompier->getDateNaiss());
        $requete->bindValue(':tel', $pompier->getTel());
        $requete->bindValue(':sexe', $pompier->getSexe());
        $requete->bindValue(':id', $pompier->getId());


        // Exécution de la requête
        $requete->execute();
    }

    public function setDB(PDO $db)
    {
        $this->_db = $db;
    }
}
?>
