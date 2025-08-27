<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= getenv('SITE_TITLE'); ?></title>
    <link rel="icon" href="<?= fld_url('Public/Images/as-logo.png') ?>" sizes="32x32">
    <!-- Link com todas as fontes tipográficas normais -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Infant:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Great+Vibes&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Suranna&display=swap" rel="stylesheet">
    <!-- Link separado apenas para os ícones Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= fld_url('Public/Css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= fld_url('Public/Css/controleCss.css') ?>">
    <link rel="stylesheet" href="<?= fld_url('Public/Css/base.css') ?>">
    <link rel="stylesheet" href="<?= fld_url('Public/Css/animacoes.css') ?>">

    <script src="<?= fld_url('Public/Js/jquery-3.6.4.min.js') ?>"></script>
    <script src="<?= fld_url('Public/Js/sweetalert2.js') ?>"></script>
    <script src="<?= fld_url('Public/Js/Chartjs-v4.4.7.js') ?>"></script>
    <script src="<?= fld_url('Public/Js/alertas.js') ?>"></script>

</head>

<body class="bd-pontilhado text-black">
    <?php displayErrorMessage(); ?>
    <?php displaySuccessMessage(); ?>

    <nav class="sidebar d-flex flex-column flex-shrink-0 position-fixed">
        <button class="toggle-btn d-inline-flex align-items-center" onclick="toggleSidebar()">
            <?= fldIco("arrow_menu_close", 27, "text-dark"); ?>
        </button>
        <div class="row pt-5 pb-2">
            <div class="col-3">
                <?= fldIco("taunt", 50, "text-white"); ?>
            </div>
            <div class="col hide-on-collapse">
                <h4 class="logo-text">FLD Controle</h4>
                <p class="text-muted small">Dashboard</p>
            </div>
        </div>

        <div class="nav flex-column seting-section">
            <a href="/Controle/Usuario" class="sidebar-link d-inline-flex align-items-center text-decoration-none p-3 gap-2">
                <?= fldIco("user_attributes", 27, "text-white"); ?>
                <span class="hide-on-collapse">Usuáios</span>
            </a>
            <a href="#" class="sidebar-link d-inline-flex align-items-center text-decoration-none p-3 gap-2">
                <?= fldIco("arrow_menu_close", 27, "text-white"); ?>
                <span class="hide-on-collapse">Products</span>
            </a>
        </div>

        <div class="nav flex-column seting-section mt-5">
            <a href="/" class="sidebar-link d-inline-flex align-items-center text-decoration-none p-3 gap-2">
                <?= fldIco("captive_portal", 27, "text-white"); ?>
                <span class="hide-on-collapse">Site</span>
            </a>
            <a href="#" class="sidebar-link d-inline-flex align-items-center text-decoration-none p-3 gap-2">
                <?= fldIco("settings", 27, "text-white"); ?>
                <span class="hide-on-collapse">Settings</span>
            </a>
        </div>

        <div class="profile-section mt-auto p-4">
            <div class="d-flex align-items-center">
                <?= fldIco("account_circle", 40, "text-white"); ?>
                <div class="ms-3 profile-info">
                    <h6 class="text-white mb-0"><?= $_SESSION['name']; ?></h6>
                    <small class="text-muted"><?= $_SESSION['role']; ?></small>
                    <br>
                    <a href="/logoff" class="d-inline-flex align-items-center text-decoration-none text-danger">
                        <span class="hide-on-collapse">Logoff</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="main-content">
        <div class="container-fluid">
            <?php require_once $content; ?>
        </div>
    </main>

    <script src="/../../Public/Js/jquery-3.6.4.min.js"></script>
    <script src="/../../Public/Js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const toggleBtn = document.querySelector(".toggle-btn");
            const sidebar = document.querySelector("nav.sidebar");

            // Recupera o estado salvo no localStorage
            const isCollapsed = localStorage.getItem("sidebarCollapsed") === "true";

            // Aplica o estado salvo
            if (isCollapsed) {
                sidebar.classList.add("collapsed");
            }

            toggleBtn.addEventListener("click", function() {
                sidebar.classList.toggle("collapsed");

                // Salva o novo estado
                const isNowCollapsed = sidebar.classList.contains("collapsed");
                localStorage.setItem("sidebarCollapsed", isNowCollapsed);
            });
        });
    </script>
</body>

</html>