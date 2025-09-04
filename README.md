# Filid-MVC

Filid-MVC é um framework PHP simples e eficiente. Foi desenvolvido para facilitar o desenvolvimento de aplicações web, oferecendo uma estrutura organizada e fácil de entender.


<img width="1885" alt="Captura de tela 2025-07-27 164046" src="https://github.com/user-attachments/assets/6394ed03-4fba-4491-b8cd-cd8d1af5a980" />
<br /><br />
<p>Esta nova versão foram feitas algumas melhorias e adicionado uma Dashboard para controle do seu site</p>
<img width="1915" alt="Captura de tela 2025-07-27 164125" src="https://github.com/user-attachments/assets/c169ab67-1f9f-4bc7-b0c9-6898b19d67ba" />


## Estrutura do Projeto:
É um projeto PHP seguindo o padrão MVC (Model-View-Controller)<br>
Possui uma estrutura organizada com diretórios separados: Configs, Controllers, Core, Migrations, Models, Views e Public<br>
Utiliza um sistema de autoload para carregamento automático de classes

## Funcionalidades Principais:
Sistema de gerenciamento de usuários (UserController)<br>
Página inicial (HomeController)<br>
Sistema de rotas e gerenciamento de URLs<br>
Configuração via arquivo .env para variáveis de ambiente<br>

## Tecnologias:
PHP 7.4 ou superior<br>
MySQL/MariaDB como banco de dados<br>
Apache/Nginx como servidor web<br>
HTML, CSS e JavaScript para frontend<br>

## Organização:
Separação clara de responsabilidades (MVC)<br>
Sistema de logs para monitoramento<br>
Arquivos de configuração separados<br>
Sistema de funções auxiliares (helpers.php)<br>

## Segurança 🔒 
Utilização de variáveis de ambiente (.env)<br>
Sistema de autenticação implementado<br>
Tratamento de URLs inválidas<br>
Segurança XSS-Protection, Csrf Token<br>

## Visão Geral 🌟 

O Filid-MVC é um framework que implementa o padrão MVC, dividindo a aplicação em três camadas principais:

- **Model**: Responsável pela lógica de negócios e interação com o banco de dados
- **View**: Interface do usuário, onde os dados são exibidos
- **Controller**: Gerencia as requisições entre a View e o Model

## Estrutura do Projeto 📁 

```
MVC/
├── Configs/                # Arquivos de configuração
├── Controllers/            # Controladores da aplicação
├── Core/                   # Classes principais do framework
├── logs/                   # Salva os erros em log
├── Migrations/             # Tabelas do Banco
├── Models/                 # Modelos e lógica de negócios
├── Public/                 # Arquivos públicos (CSS, JS, imagens)
├── Views/                  # Arquivos de visualização
│   ├── Controlador/        # Pastas principal da Dashboard
│   │  └── User/            # Páginas de Usuários
│   └── errors/             # Páginas de erro
├── .env                    # Variáveis de ambiente
├── .htaccess               # Configurações do Apache
├── autoload.php            # Carregador automático de classes
├── helpers.php             # Funções auxiliares
├── index.php               # Ponto de entrada da aplicação
├── make                    # CLI básica para criar Controllers, Models e Views
└── migrate                 # Roda as Migrations

```

## Requisitos ⚙️

- PHP 7.4 ou superior
- MySQL 5.7 ou superior
- Apache/Nginx
- mod_rewrite habilitado (Apache)
- Composer (opcional)

## 🚀 Instalação

1. Clone o repositório:
```bash
git clone https://github.com/aronisouza/MvcComPainelAdm
cd MvcComPainelAdm
```

2. Configure seu servidor web (Apache/Nginx) para apontar para a pasta do projeto

3. Copie o arquivo de exemplo de ambiente:
```bash
cp .env.example .env
```

4. Configure as variáveis de ambiente no arquivo `.env`:
```env
DB_HOST=localhost
DB_NAME=seu_banco
DB_USER=seu_usuario
DB_PASS=sua_senha
```

## ⚙️ Configuração

### Configuração do Banco de Dados

Apenas adicione as suas informações no .env
```env
DB_HOST=localhost
DB_NAME=seu_banco
DB_USER=seu_usuario
DB_PASS=sua_senha
```

### Configuração do Apache (.htaccess)

```apache
RewriteEngine On
Options All -Indexes

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]

# Protege arquivos sensíveis
<FilesMatch "^(\.env|autoload\.php|helpers\.php|migrate|make)$">
    Require all denied
</FilesMatch>

# Proteção contra injeção de SQL e XSS
<IfModule mod_rewrite.c>
    RewriteCond %{QUERY_STRING} (\<|%3C).*script.*(\>|%3E) [NC,OR]
    RewriteCond %{QUERY_STRING} UNION.*SELECT.* [NC]
    RewriteRule .* - [F,L]
</IfModule>

# Cabeçalhos de segurança
<IfModule mod_headers.c>
    Header always set X-Content-Type-Options "nosniff"
    Header always set X-Frame-Options "SAMEORIGIN"
    Header always set X-XSS-Protection "1; mode=block"
    Header always set Referrer-Policy "strict-origin-when-cross-origin"
    Header always set Permissions-Policy "geolocation=(), microphone=()"
</IfModule>

# Cache estático
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType text/css "access plus 1 year"
    ExpiresByType application/javascript "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType image/webp "access plus 1 year"
</IfModule>

ErrorDocument 403 https://github.com/aronisouza

```

## 💻 Uso

### Criando um Controller

```
php make controller UserController
```

```php
<?php
// Controllers/UserController.php

class UserController extends Controller
{
    public function index()
    {
        // Lógica para listar usuários
        $this->render('users/index');
    }

    public function create()
    {
        // Lógica para criar usuário
        $this->render('users/create');
    }
}
```

### Criando um Model

```
php make model UserModel
```

```php
<?php
// Models/User.php

class UserModel
{
    public function getUserById($id)
    {
        $read = new Read();
        $read->ExeRead('users', "WHERE id={$id}");
        return $read->getResult();
    }
}
```

### Criando uma View

```
 php make view NomeView Pasta/SubpastaOpcional
```

```html
<!-- Views/users/index.php -->
<div class="container">
    <h1>Lista de Usuários</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['nome']; ?></td>
                <td><?php echo $user['email']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
```

### Definindo Rotas

As rotas podem ser definidas da seguinte maneiras:

#### 1. Usando arquivo de configuração

Arquivo `Configs/routes.php`:

```php
<?php
return [
    // Rotas básicas
    ['GET', '/', 'HomeController', 'index'],
    ['GET', '/users', 'UserController', 'index'],

    // Rotas com parâmetros
    ['GET', '/users/edit/{id}', 'UserController', 'edit'],
    ['POST', '/users/edit/{id}', 'UserController', 'update'],

    // Rotas para criação
    ['GET', '/users/create', 'UserController', 'create'],
    ['POST', '/users/create', 'UserController', 'store'],

    // Rota para deletar
    ['GET', '/users/delete/{id}', 'UserController', 'delete'],
];
```

## 🔒 Segurança

O framework inclui várias medidas de segurança:

- Proteção contra CSRF
- Headers de segurança configurados
- Validação de dados
- Escape de saída HTML

### Exemplo de Proteção CSRF

```php
// No formulário
<form method="POST" action="/users/create">
    <?= token(); ?>
    <!-- campos do formulário -->
</form>
```

```php
// No controller
public function store()
{
    if ($this->validateCsrfToken($_POST['csrf_token'])) {
        // Processar dados
    }
}
```

## 🎨 Personalização

### Adicionando CSS e JavaScript

```html
<!-- Views/template.php -->
<head>
    <!-- CSS -->
    <link rel="stylesheet" href="<?= fld_url('Public/Css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= fld_url('Public/Css/base.css') ?>">
    <link rel="stylesheet" href="<?= fld_url('Public/Css/animacoes.css') ?>">
    
    <!-- JavaScript -->
    <script src="<?= fld_url('Public/Js/jquery-3.6.4.min.js') ?>"></script>
    <script src="<?= fld_url('Public/Js/sweetalert2.js') ?>"></script>
    <script src="<?= fld_url('Public/Js/Chartjs-v4.4.7.js') ?>"></script>
    <script src="<?= fld_url('Public/Js/alertas.js') ?>"></script>
</head>
```