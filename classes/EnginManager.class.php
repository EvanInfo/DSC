<?php
class EnginManager
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDB($db);
    }
    
    public function insererEngin(Engin $engin)
    {
        // Vérifier si tous les attributs requis sont définis
        if (!$engin->getNuméro() || !$engin->getCaserneId() || !$engin->getTypeEnginId() || $engin->getUrlImage()) {
            throw new Exception("Tous les attributs requis doivent être définis avant d'insérer dans la base de données.");
        }
        // Préparation de la requête d'insertion
        $requete = $this->_db->prepare("INSERT INTO engin (Numéro, Caserne_id, Type_Engin_id, Url_Image) VALUES (:numero, :caserne_id, :type_engin_id, :url_image)");

        // Liaison des valeurs avec les paramètres de la requête
        $requete->bindValue(':numero', $engin->getNuméro());
        $requete->bindValue(':caserne_id', $engin->getCaserneId());
        $requete->bindValue(':type_engin_id', $engin->getTypeEnginId());
        $requete->bindValue(':url_image', $engin->getUrlImage());
        // Exécution de la requête
        $requete->execute();
    }


    public function affichageEngin()
    {
        $q = $this->_db->prepare('SELECT * FROM engin');
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
