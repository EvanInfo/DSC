<?php
class GradeManager
{
    private $_db;

    public function __construct($db)
    {
        $this->setDB($db);
    }
    

    public function getGrade()
    {
        $q = $this->_db->prepare('SELECT id, libellé FROM grade');
        $q->execute();

        $gradeInfo = $q->fetchAll(PDO::FETCH_ASSOC);

        // Fermeture du curseur
        $q->closeCursor();

        return $gradeInfo;
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
