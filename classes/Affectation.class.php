<?php
class Affectation
{
	// Attributs
    private $_Date;
	private $_Matricule;
	private $_id;
	
	public function __construct(array $donnees)
	{
		$this->hydrate($donnees);
	}

	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value) {
			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}

	// Getters

    public function getDate()
    {
        return $this->_Date;
    }

	public function getId()
	{
		return $this->_id;
	}

	public function getMatricule()
	{
		return $this->_Matricule;
	}

	
	// Setters

    public function setDate($date) {
       
        $this->_Date = $date;
    }

	public function setId($id)
	{
		$id = (int) $id;
		if ($id > 0)
		{
			$this->_id = $id;
		}	
	}

	
	public function setMatricule($Matricule)
	{
		$Matricule = (int) $Matricule;
		if ($Matricule > 0)
		{
			$this->_Matricule = $Matricule;
		}	
	}


}
?>