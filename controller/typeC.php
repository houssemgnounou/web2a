<?php
require_once('C:/xampp/htdocs/web1/config.php');
include 'C:/xampp/htdocs/web1/model/type.php';

class typeC
{
    public function create($type)
    {

        $sql = "INSERT INTO `types`(`nom`) VALUES (:nom)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $type->getNom(),
            ]);
            header('Location:types.php');
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function read()
    {
        $sql = "SELECT * FROM types";
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
        $sql = "SELECT * FROM types order by $r";
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
        $sql = "SELECT * FROM types where id like '%$r%' or nom like '%$r%'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
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
                $sql = "DELETE FROM `types` WHERE `id` = '$id' ";
                $req = $db->prepare($sql);
                try {
                    $req->execute();
                    header("Location:types.php");
                } catch (Exception $e) {
                    die('Erreur:' . $e->getMessage());
                }
            }
        }
    }

    public function update($user, $id)
    {
        $sql = "UPDATE `types` SET `nom`=:nom WHERE `id`=:id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $user->getNom(),
                'id' => $id,

            ]);
            header('Location:types.php');
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function findone($id)
    {
        $sql = "SELECT * FROM types WHERE `id` = '$id'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            $t = $liste->fetch();
            return $t;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }
}
