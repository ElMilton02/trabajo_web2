<?php
class ErrorController
{

  public function showErrorInvalidUser($error)
  {

    require_once './templates/login.phtml';
  }

  public function showErrorNonData($error)
  {

    require_once './templates/login.phtml';
  }
  public function showErrorNonDataCat($error, $model)
  {
    $categories = $model->getCategories();
    $view = new CategoriesView();
    $view->showCategories($categories, $error);
  }
  public function showErrorInsert($error)
  {

    require_once './templates/login.phtml';
  }
  public function showErrorDelete($error, $model)
  {
    $categories = $model->getCategories();
    $view = new CategoriesView();
    $view->showCategories($categories, $error);
  }
  public function showErrorNonUser($error, $page)
  {

    if ($page == 'about') {
      $view = new AboutView();
      $view->showAbout($error);
    } else {
      $view = new HomeView();
      $view->showHome($error);
    }
  }

  public function showError404($error)
  {
    $view = new HomeView();
    $view->showHome($error);
  }
  public function showErrorNonDataClothes($error, $model, $categorieId)
  {
    $listClothes = $model->getClothesByCategorie($categorieId);
    $view = new CategorieView();
    $view->showClothesByCategorieId($listClothes, $categorieId, $error = null);
  }
}
