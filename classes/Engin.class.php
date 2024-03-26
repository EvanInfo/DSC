<?php
class Engin
{
	// Attributs
	private $_Numéro;
	private $_Caserne_id;
    private $_Type_Engin_id;
    private $_Url_Image;
	
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

	public function getNuméro()
	{
		return $this->_Numéro;
	}

	public function getCaserneId()
	{
		return $this->_Caserne_id;
	}

    public function getTypeEnginId()
    {
        return $this->_Type_Engin_id;
    }
	
    public function getUrlImage()
    {
        return $this->_Url_Image;
    }

	// Setters

	public function setNuméro($Numéro)
	{
		$Numéro = (int) $Numéro;
		if ($Numéro > 0)
		{
			$this->_Numéro = $Numéro;
		}	
	}

	
	public function setCaserneId($Caserne_id)
	{
		$Caserne_id = (int) $Caserne_id;
		if ($Caserne_id > 0)
		{
			$this->_Caserne_id = $Caserne_id;
		}	
	}

    public function setTypeEnginId($Type_Engin_id)
    {
        // Vérifie si la valeur contient au moins une lettre et au plus 25 lettres
        if (preg_match('/^[A-Za-z]{1,5}$/', $Type_Engin_id)) {
            $this->_Type_Engin_id = $Type_Engin_id;
        } else {
            // Gérer l'erreur, par exemple, lancer une exception ou définir une valeur par défaut
            throw new InvalidArgumentException("Le numéro de l'engin doit contenir au moins une lettre et au maximum 5 lettres.");
        }
    }

    public function setUrlImage($Url_Image)
    {
        // Vérifie si la valeur contient au moins une lettre et au plus 25 lettres
        if (preg_match('/^[A-Za-z]{1,25}$/', $Url_Image)) {
            $this->_Url_Image = $Url_Image;
        } else {
            // Gérer l'erreur, par exemple, lancer une exception ou définir une valeur par défaut
            throw new InvalidArgumentException("L'url de l'engin doit contenir au moins une lettre et au maximum 25 lettres.");
        }
    }
}
?>