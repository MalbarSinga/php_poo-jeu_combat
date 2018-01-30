<?php
Class Attack
{

// Attributs
 private $id, $nom, $puissance, $categorie;




// Constantes




// Méthodes

/////// Constructeur

public function __construct()
{
    $this->nom = 'Coup de poing';
    $this->puissance = 5;
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
     * @param mixed $id
     * @return Attack
     */
    public function setId($id)
    {
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
     * @return Attack
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPuissance()
    {
        return $this->puissance;
    }

    /**
     * @param mixed $degats
     * @return Attack
     */
    public function setPuissance($puissance)
    {
        $this->degats = $puissance;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $personnage
     * @return Attack
     */
    public function setCategorie(Personnage $personnage)
    {
        $this->categorie = $personnage->getId();
        return $this;
    }

    
    
////// Logique métier



}