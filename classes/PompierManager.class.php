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
    
        // Préparation de la requête d'insertion
        $requete = $this->_db->prepare("INSERT INTO pompier (Matricule, Nom, Prénom, DateNaiss, Tel, Sexe, id) VALUES (:matricule, :nom, :prenom, :dateNaiss, :tel, :sexe, :id)");
    
        // Liaison des valeurs avec les paramètres de la requête
        $valeurs = array(
            ':matricule' => $pompier->getMatricule(),
            ':nom' => $pompier->getNom(),
            ':prenom' => $pompier->getPrenom(),
            ':dateNaiss' => $pompier->getDateNaiss(),
            ':tel' => $pompier->getTel(),
            ':sexe' => $pompier->getSexe(),
            ':id' => $pompier->getId()
        );
    
        // Exécution de la requête
        $requete->execute($valeurs);
    }
    


    public function chercherMatricule($id){
        
        $requete = $this->_db->prepare("SELECT Matricule FROM pompier WHERE Matricule = :id");
        $requete->bindValue(':id', $id, PDO::PARAM_INT);
        $requete->execute();
        //var_dump($requete);
        if($requete->rowCount() > 0){
           
            return true;
        } else {
            
            return false;
        }

    }

    public function setDB(PDO $db)
    {
        $this->_db = $db;
    }
}
?>
