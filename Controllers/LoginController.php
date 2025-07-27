<?php

class LoginController extends Controller
{
    public function index()
    {
        $this->render('Controlador/Login');
    }

    public function login()
    {
        if (!$this->validateCsrfToken($_POST['csrf_token'] ?? '')) {
            $this->setErrorAndRedirect(
                "Requisição inválida. Token inválido.",
                "/login",
                "Erro de Segurança"
            );
        }
        fldPre($_POST);

        $r = new LoginModel();
        $user = $r->login($_POST['email'], $_POST['password']);
        if (empty($user)) :
            $this->setErrorAndRedirect(
                "Login ou Senha Errados.",
                "/login",
                "Erro de autenticação",
                "error"
            );
        else:
            $_SESSION['status'] = $user[0]['status'];
            $_SESSION['name'] = $user[0]['name'];
            $_SESSION['role'] = $user[0]['role'];
            $_SESSION['email'] = $user[0]['email'];
            $this->setSuccessAndRedirect(
                "Logado com sucesso!",
                "/Controle",
                "LOGIN"
            );
        endif;
    }

    public function logoff()
    {
        $_SESSION['status'] = null;
        $_SESSION['name'] = null;
        $_SESSION['email'] = null;
        $_SESSION['role'] = null;
        session_destroy();
        $this->render('Controlador/Login');
    }
}
