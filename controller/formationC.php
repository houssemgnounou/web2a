<?php
require_once('C:/xampp/htdocs/web1/config.php');
include 'C:/xampp/htdocs/web1/model/formation.php';
include 'C:/xampp/htdocs/web1/controller/userC.php';
include 'C:/xampp/htdocs/web1/controller/typeC.php';

class formationC
{

    public function create($formation)
    {

        $sql = "INSERT INTO `formations`(`nom`, `description`, `type`, `ide`) VALUES (:nom,:description, :type, :ide )";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $formation->getNom(),
                'description' => $formation->getDescription(),
                'ide' => $formation->getIde(),
                'type' => $formation->getType(),
            ]);
            header('Location:formations.php');
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function read()
    {
        $sql = "SELECT * FROM formations";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    public function search($r)
    {
        $sql = "SELECT * FROM formations where id like '%$r%' or nom like '%$r%' or description like '%$r%'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    public function sort($r)
    {
        $sql = "SELECT * FROM formations order by $r";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    public function findone($id)
    {
        $sql = "SELECT * FROM formations WHERE `id` = '$id'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            $f = $liste->fetch();
            return $f;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    public function delete()
    {
        if (isset($_GET['delete'])) {
            $db = config::getConnexion();
            if (isset($_GET['delete'])) {
                $id = $_GET['delete'];
                $sql = "DELETE FROM `formations` WHERE `id` = '$id' ";
                $req = $db->prepare($sql);
                try {
                    $req->execute();
                    header("Location:formations.php");
                } catch (Exception $e) {
                    die('Erreur:' . $e->getMessage());
                }
            }
        }
    }

    public function update($formation, $id)
    {
        $sql = "UPDATE `formations` SET `nom`=:nom,`description`=:description,`type`=:type WHERE `id`=:id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $formation->getNom(),
                'description' => $formation->getDescription(),
                'type' => $formation->getType(),
                'id' => $id,

            ]);
            header('Location:formations.php');
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
}
