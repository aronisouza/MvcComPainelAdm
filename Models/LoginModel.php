<?php

class LoginModel
{
    public function login($e, $s)
    {
        $email = addslashes($e);
        $senha = fldCrip(addslashes($s),0);
        $read = new Read();
        $read->exeRead("users", "WHERE email = :email AND password = :senha", "email={$email}&senha={$senha}");
        return $read->getResult();
    }

}
