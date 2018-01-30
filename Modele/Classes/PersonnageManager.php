<?php
Class PersonnageManager
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
     * PersonnageManager constructor.
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
     * @return Personnage $personnage
     */
public function addPersonnage(Personnage $personnage) {
        $sql = 'INSERT INTO personnages VALUES (null, ?, ?, ?)';
        $result = $this->bdd->prepare($sql);
        $result->execute([$personnage->getNom(), $personnage->getDegats(), $personnage->getImage()]);
        return $personnage->setId($this->bdd->lastInsertId());

}

    /**
     * @param Personnage $personnage
     * @return mixed
     */
public function personnageExists(Personnage $personnage) {
        $sql = 'SELECT * FROM personnages where nom = ?';
        $result = $this->bdd->prepare($sql);
    $result->execute([$personnage->getNom()]);
        return $result->fetch();

    }

    /**
     * @param Personnage $personnage
     */
    public function personnageUpdate(Personnage $personnage) {
        $sql = 'UPDATE personnages set degats = ? where id = ?';
        $result = $this->bdd->prepare($sql);
        $result->execute([$personnage->getDegats(), $personnage->getId()]);


    }

    /**
     * @param Personnage $personnage
     */
    public function deletePersonnage(Personnage $personnage) {
        $sql = 'Delete from personnages where id = ?';
        $result = $this->bdd->prepare($sql);
        $result->execute([$personnage->getId()]);

    }

    /**
     * @return array
     */
    public function getAllPersonnages() {
        $sql = 'SELECT * FROM personnages';
        $result = $this->bdd->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Personnage::class);
        return $result->fetchAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPersonnageById($id) {
        $sql = 'SELECT * FROM personnages where id = ?';
        $result = $this->bdd->prepare($sql);
        $result->execute([$id]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Personnage::class);
       return $result->fetch();
    }

    public function countPersonnages() {
        $sql = 'SELECT COUNT(*) nbperso FROM personnages';
        $result = $this->bdd->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result = $result->fetch();
        return $result['nbperso'];
    }

}