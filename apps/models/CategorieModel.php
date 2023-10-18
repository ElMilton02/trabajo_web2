<?php

require_once './database/config.php';

class CategoriesModel
{
    private $db;

    public function __construct()
    {
        require_once('./database/Conection_db.php');

        $conexionDb = new ConectionDb(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->db = $conexionDb->getDb();
    }

    function getCategories()
    {

        $query = $this->db->prepare('SELECT * FROM marcas');
        $query->execute();

        // $categorias es un arreglo de categorías
        $categories = $query->fetchAll(PDO::FETCH_OBJ);

        return $categories;
    }

    function deleteCategoria($idCategorie)
    {
        $query = $this->db->prepare('DELETE FROM marcas WHERE id = ?');
        $query->execute([$idCategorie]);
        
    }
    
    function insertCategorie($categorie)
    {
        $query = $this->db->prepare('INSERT INTO marcas (marca) VALUES(?)');
        $query->execute([$categorie]);
        return $this->db->lastInsertId();
    }

    public function getCategorieById($id)
    {
        $query = $this->db->prepare('SELECT * FROM marcas WHERE id = ?');
        $query->execute([$id]);

        // Obtener la categoría como un objeto
        $categorie = $query->fetch(PDO::FETCH_OBJ);

        return $categorie;
    }

    public function modifyCategorie($categorie, $id)
    {
        $query = $this->db->prepare('UPDATE categorias SET categoria = ? WHERE id_categoria = ?');
        $query->execute([$categorie, $id]);
    }
}


class CategorieModel
{
    private $db;

    public function __construct()
    {
        require_once('./database/Conection_db.php');

        $conexionDb = new ConectionDb(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->db = $conexionDb->getDb();
    }

    function getBooksByCategorie($href)
    {

        $query = $this->db->prepare('SELECT * FROM ropa WHERE marca_id = ?');
        $query->execute([$href]);

        // $categorias es un arreglo de categorias
        $categorie2 = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorie2;
    }

    function deleteRopa($idRopa)
    {

        $query = $this->db->prepare('DELETE FROM ropa WHERE id = ?');
        $query->execute([$idRopa]);
    }

   
    //<-no terminado->//
}