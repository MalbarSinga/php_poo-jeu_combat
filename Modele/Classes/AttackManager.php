<?php
Class AttackManager
{

// Attributs

    /**
     * @var PDO
     */
    private $bdd;

// Constantes




// Méthodes

/////// Constructeur
    /**
     * AttackManager constructor.
     * @param $bdd
     */
    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }



////// Getter & Setter

    /**
     * @return PDO
     */
    public function getBdd()
    {
        return $this->bdd;
    }

    /**
     * @param PDO $bdd
     * @return PersonnageManager
     */
    public function setBdd(PDO $bdd)
    {
        $this->bdd = $bdd;
        return $this;
    }


////// Logique métier

    /**
     * @param Personnage $personnage
     * @return array
     */
public function getAllAttacks(Personnage $personnage) {
        $sql = "SELECT * FROM attack where categorie = ? OR categorie = 'Persodefaut'";
        $result= $this->bdd->prepare($sql);
        $result->execute([$personnage->getCategorie()]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Attack::class);
        return $result->fetchAll();
}

}