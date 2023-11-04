<?php

require_once './apps/models/CategorieModel.php';
require_once './apps/views/CategorieView.php';
require_once './apps/helpers/AuthHelper.php';
require_once './config.php';
require_once './apps/controllers/ErrorController.php';

class CategoriesController
{
    //privates

    private $model;
    private $view;

    //verifia la autenticacion del usuario 
    public function __construct()
    {

        AuthHelper::verify();

        $this->model = new CategoriesModel();
        $this->view = new CategoriesView();
    }

    //obtiene categorieas desde el modelo y las mustra
    public function showCategories()
    {

        $categories = $this->model->getCategories();
        $href = $this->view->showCategories($categories);
    }

    //elimina una marca 
    public function removeCategorie($id)
    {
        if (empty($id)) {
            header('Location: ' . BASE_URL . 'categorias');
        } else {
            try {

                $this->model->deleteCategoria($id);
                // Eliminación exitosa, redirige a la página de categorías
                header('Location: ' . BASE_URL . 'categorias');
            } catch (\Throwable $th) {
                $categoria =  $this->model->getCategorieById($id);
                $controller = new ErrorController();
                $controller->showErrorDelete("La Categoria: **" . $categoria->categoria . "** contiene ropa, primero debe vaciar.", $this->model);
            }
        }
    }

    //añade una nueva marca 
    public function addCategorie()
    {
        $categorie = $_GET['categorie'];
        if (empty($categorie)) {
            $controller = new ErrorController();
            $controller->showErrorNonDataCat('Datos Vacios',  $this->model);
        } else {
            $newCategorie = $this->model->insertCategorie($categorie);
            if ($newCategorie) {
                header('Location: ' . BASE_URL . 'categorias');
            } else {
                $controller = new ErrorController();
                $controller->showErrorInsert("Error al insertar la categoría");
            }
        }
    }


    public function editCategorie($id)
    {
        $categorie = $this->model->getCategorieById($id);
        $this->view->showEditCategorieForm($categorie, $id);
    }


    public function updateCategorie($id)
    {
        $categorie = $_GET['newCategorie'];

        if (empty($categorie)) {

            $controller = new ErrorController();
            $controller->showErrorNonDataCat('Datos Vacios',  $this->model);
        } else {
            $this->model->modifyCategorie($categorie, $id);
            header('Location: ' . BASE_URL . 'categorias');
        }
    }
}


class CategorieController
{
    private $model;
    private $view;

    public function __construct()
    {
        AuthHelper::verify();

        $this->model = new CategorieModel();
        $this->view = new CategorieView();
    }

    public function showClothesByCategorieId($categorieId)
    {
        $listClothes = $this->model->getClothesByCategorie($categorieId);
        $this->view->showClothesByCategorieId($listClothes, $categorieId);
    }

    public function removeClothes($idCategorie, $idClothes)
    {
        $this->model->deleteClothes($idClothes);
        header('Location: ' . BASE_URL . 'ropaByCategoria/' . $idCategorie);
    }

    public function addClothes($categorieId)
    {
        $nombre_ropa = $_GET['nombre_ropa'];
        $precio_ropa = $_GET['precio_ropa'];
        $id_Categorie = $categorieId;

        if (empty($id_Categorie) || empty($nombre_ropa) || empty($precio_ropa)) {


            var_dump($id_Categorie, $nombre_ropa, $precio_ropa);
        } else {
            $this->model->insertClothes($id_Categorie, $nombre_ropa, $precio_ropa);
            header('Location: ' . BASE_URL . 'ropaByCategoria/' . $id_Categorie);
        }
    }

    public function  editClothes($idClothes)
    {
        $this->view->showEditClothesForm($idClothes);
    }

    public function updateClothes($idClothes)
    {
        $newName = $_POST['nuevoNombre'];
        $newPrice =  $_POST['nuevoPrecio'];

        if (empty($newName) || empty($newPrice)) {
        } else {
            $this->model->modifyClothes($idClothes, $newName, $newPrice);
            header('Location: ' . BASE_URL . 'categorias');
        }
    }
}
