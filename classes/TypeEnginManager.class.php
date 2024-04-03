<?php
class TypeEnginManager
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDB($db);
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
