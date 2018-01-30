<?php

Class Personnage
{

// Attributs

    protected $id, $nom, $degats, $image, $erreur = [];


// Constantes

    const PERSONNAGE_FRAPPE = 1;
    const PERSONNAGE_TUE = 2;
    const CEST_MOI = 3;
    const POINTS_DEGATS = 20;

// Méthodes

/////// Constructeur

    public function __construct(array $data=[])
    {
        $this->degats = 0;
        $this->image = null;
        $this->hydratation($data);
    }



////// Getter & Setter

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id){
        $this->id = $id;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Personnage
     */
    public function setNom($nom)
    {
        if ($nom === '')
            $this->erreur[] = 'Nom trop court';
        else
            $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDegats()
    {
        return $this->degats;
    }

    /**
     * @param mixed $degats
     * @return Personnage
     */
    public function setDegats($degats)
    {
        $this->degats = $degats;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * @return Personnage
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @param array $erreur
     * @return Personnage
     */
    public function setErreur($erreur)
    {
        $this->erreur[] = $erreur;
        return $this;
    }

    /**
     * @return array
     */
    public function getErreur()
    {
        return $this->erreur;
    }



////// Logique métier

    protected function hydratation(array $data = [])
    {
        foreach ($data as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($this, $setter))
                $this->$setter($value);
        }

    }

    /**
     * @param Personnage $adversaire
     * @return int|mixed
     */
    public function frapper(Personnage $adversaire)
    {
        if ($this->getId() === $adversaire->getId())
            return self::CEST_MOI;
        else if ($this->recevoirDegats() === self::PERSONNAGE_TUE)
            return self::PERSONNAGE_TUE;
        else {
            $adversaire->recevoirDegats();
            return $adversaire->getDegats();
        }
    }

    /**
     * @return int
     */
    public function recevoirDegats()
    {
        $this->setDegats($this->getDegats() + self::POINTS_DEGATS);
        if ($this->getDegats() >= 100) {
            return self::PERSONNAGE_TUE;
        } else
            return self::PERSONNAGE_FRAPPE;
    }


}   