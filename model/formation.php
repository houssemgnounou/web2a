<?php
class formation
{
    private $id = null;
    private $nom = null;
    private $description = null;
    private $type = null;
    private $ide = null;

    public function __construct($nom, $description, $type, $ide)
    {
        $this->nom = $nom;
        $this->description = $description;
        $this->type = $type;
        $this->ide = $ide;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getIde()
    {
        return $this->ide;
    }

    public function setIde($ide)
    {
        $this->ide = $ide;
    }
}
