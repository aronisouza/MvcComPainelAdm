<?php

class ControladorController extends Controller
{
    public function index()
    {
        $this->checklogin();
        $this->render('Controlador/home', ['pagina'=>'Dashboard']);
    }
}
