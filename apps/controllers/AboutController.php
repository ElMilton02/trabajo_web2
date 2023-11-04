<?php

//permite usar las clases y funciones definidas en esos archivos
require_once './apps/views/AboutView.php';
require_once './apps/helpers/AuthHelper.php';

//las clases son la forma de encapsular la funcionalidad

//se define la clase AboutController
class AboutController
{
    //se declara la propiedad $view(almacena la instancia de la clase AboutView)
    private $view;

    //constructor de la clase, metodo especial que se ejecuta automaticamente cuando se crea una instancia de la clase
    public function __construct()
    {
        //llama el metodo 'verify' y pasa el argumento 'about' como parametro
        AuthHelper::verify('about');
        //prepara la vista que se muestra el llamar a showAbout 
        $this->view = new AboutView();
    }

    public function showAbout()
    {
        //mustra la vista about en el navegador
        $this->view->showAbout();
    }
}
