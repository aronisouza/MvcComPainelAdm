<?php

// Arquivo de configuração de rotas
return [
    // Rotas básicas do site
    // ['GET', '/', 'Controller', 'index'],
    ['GET', '/', 'HomeController', 'index'],

    //--- rotas de controle carregam view
    ['GET', '/Controle', 'ControladorController', 'index'],
    ['GET', '/Controle/Usuario', 'UserController', 'index'],
    ['GET', '/Controle/Usuario/Edit/{id}', 'UserController', 'edit'],

    //--- rotas de ação não carrega view
    ['POST', '/Usuario/create', 'UserController', 'create'], 
    ['POST', '/Usuario/Edit/{id}', 'UserController', 'update'],
    ['POST', '/Usuario/Delete/{id}', 'UserController', 'delete'],

    //--- rotas de login
    ['GET', '/login', 'LoginController', 'index'],
    ['POST', '/login/post', 'LoginController', 'login'],
    ['GET', '/logoff', 'LoginController', 'logoff'],
];
