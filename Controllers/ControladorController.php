<?php

class ControladorController extends Controller
{
    public function index()
    {
        $this->checklogin();
        $this->render('Controlador/home');
    }


    private function checklogin()
    {
        if (!isset($_SESSION['role']) && $_SESSION['role'] != 'admin') {
            $this->render('Controlador/Login');
            return;
        }
    }
}
