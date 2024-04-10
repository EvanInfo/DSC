<?php
class CaserneManager
{
    private $_db;

    public function __construct($db)
    {
        $this->setDB($db);
    }
    

    public function getCaserne()
    {
        $q = $this->_db->prepare('SELECT id, Nom FROM Caserne');
        $q->execute();

        $CaserneInfo = $q->fetchAll(PDO::FETCH_ASSOC);

        // Fermeture du curseur
        $q->closeCursor();

        return $CaserneInfo;
    }
    
    public function getCaserneId($id)
    {
        $q = $this->_db->prepare('SELECT Nom FROM caserne WHERE id = :id');
        $q->bindValue(':id', $id, PDO::PARAM_INT);
        $q->execute();
        
        // Récupérer le nom de la caserne à partir du résultat de la requête
        $resultat = $q->fetch(PDO::FETCH_ASSOC);
        
        // Vérifier si le résultat est non vide
        if ($resultat) {
            // Retourner le nom de la caserne
            return $resultat['Nom'];
        } else {
            // Retourner un message d'erreur ou une valeur par défaut si aucun résultat n'est trouvé
            return "Caserne introuvable";
        }
    }

      
    /**
     * Récupère les informations d'une catégorie avec un identifiant spécifié.
     *
     * @param int $id L'identifiant de la catégorie à récupérer.
     * @return array|false Un tableau associatif représentant les informations de la catégorie récupérée,
     *                     ou false si la catégorie n'est pas trouvée.
     */
    /*
    public function getCategorieById($id)
    {
        $q = $this->_db->prepare('SELECT idCategorie, libelle FROM categorie WHERE idCategorie = :id');
        $q->bindValue(':id', $id, PDO::PARAM_INT);
        $q->execute();

        $categorieInfo = $q->fetch(PDO::FETCH_ASSOC);

        // Fermeture du curseur
        $q->closeCursor();

        return $categorieInfo;
    }
    */
    public function setDB(PDO $db)
    {
        $this->_db = $db;
    }
}
?>
