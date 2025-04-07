<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conecta São Felix</title>

    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/vendor/reset.css">
    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/global.css">

    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/layouts/home.css">

    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/components/lateral_menu.css">
    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/components/button.css">
    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/components/input.css" class="input-m1".css">    
    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/components/search.css">
    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/components/card.css">
    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/components/box.css">
    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/components/modal.css">
    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/components/notification.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>

    <script src="https://kit.fontawesome.com/638a0e7d84.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>

<body>
<aside id="lateral-menu">
        <div class="container">
            <div class="top-menu">
                <img src="<?= BASE_DIR?>/Public/src/assets/images/logo.png" class="logo" alt="">
                <h1 id="close-trigger"><i class="fa-solid fa-xmark"></i></h1>
            </div>
            
            <h2 class="current-system">Secretaria de Saúde</h2>
            
            <nav class="menu-desktop">
                <div class="menu-option">
                    <button class="topic-menu bg-green-01">Regulação</button>
                    <div class="content-menu">
                        <a href="<?= BASE_DIR?>" class="<?= ($_SESSION["active"] == "home") ? "active" : ""?>">Inicio</a>
                        <a href="<?= BASE_DIR?>/pacientes" class="<?= ($_SESSION["active"] == "pacientes") ? "active" : ""?>">Pacientes</a>
                        <a href="<?= BASE_DIR?>/relatorios" class="<?= ($_SESSION["active"] == "relatorios") ? "active" : ""?>">Relatórios</a>
                    </div>
                </div>

                <?php if($_SESSION["cargo"] === "Administrador"):?>

                <div class="menu-option">
                    <button class="topic-menu bg-green-01">Administração</button>
                    <div class="content-menu">
                        <a href="<?= BASE_DIR?>/cadastrar" class="<?= ($_SESSION["active"] == "cadastrar") ? "active" : ""?>"">Cadastrar Usuário</a>
                        <a href="<?= BASE_DIR?>/listar" class="<?= ($_SESSION["active"] == "listar") ? "active" : ""?>"">Listar Usuários</a>
                        <a href="<?= BASE_DIR?>/codigos" class="<?= ($_SESSION["active"] == "codigos") ? "active" : ""?>"">Códigos</a>
                    </div>
                </div>


                <?php endif;?>


                <!-- <div class="menu-option">
                    <button class="topic-menu bg-green-01">Suporte</button>
                    <div class="content-menu">
                        <a href="">Inicio</a>
                    </div>
                </div> -->

                <a href="<?= BASE_DIR?>/logout" class="menu-option">
                    <button class="topic-menu bg-green-01">sair</button>
                </a>
            </nav>


            <nav class="menu-mobile">

                <form action="" class="search" method="POST">
                    <input type="search" class="input-m2" placeholder="Pesquisar..." name="search" id="search">
                    <button type="submit" class="bg-green-01" name="action" value="search">
                        <span class="material-symbols-outlined">search</span>
                    </button>
                </form>

                <div class="menu-option">
                    <button class="topic-menu bg-green-01">Regulação</button>
                    <div class="content-menu show">
                        <a href="<?= BASE_DIR?>" class="<?= ($_SESSION["active"] == "home") ? "active" : ""?>">Inicio</a>
                        <a href="<?= BASE_DIR?>/pacientes" class="<?= ($_SESSION["active"] == "pacientes") ? "active" : ""?>">Pacientes</a>
                        <a href="<?= BASE_DIR?>/relatorios" class="<?= ($_SESSION["active"] == "relatorios") ? "active" : ""?>">Relatórios</a>
                    </div>
                </div>

                <?php if($_SESSION["cargo"] === "Administrador"):?>

                    <div class="menu-option">
                        <button class="topic-menu bg-green-01">Administração</button>
                        <div class="content-menu">
                            <a href="<?= BASE_DIR?>/cadastrar" class="<?= ($_SESSION["active"] == "cadastrar") ? "active" : ""?>"">Cadastrar Usuário</a>
                            <a href="<?= BASE_DIR?>/listar" class="<?= ($_SESSION["active"] == "listar") ? "active" : ""?>"">Listar Usuários</a>
                            <a href="<?= BASE_DIR?>/codigos" class="<?= ($_SESSION["active"] == "codigos") ? "active" : ""?>"">Códigos</a>
                        </div>
                    </div>

                <?php endif;?>

                
                <!-- <div class="menu-option">
                    <button class="topic-menu bg-green-01">Suporte</button>
                    <div class="content-menu">
                        <a href="">Inicio</a>
                    </div>
                </div> -->
            </nav>
        </div>
    </aside>

    <aside id="site-content">
        <div class="container">

            <header>
                <div class="menu-trigger">
                    <span class="material-symbols-outlined" id="trigger-menu">menu</span>
                </div>

                <form action="<?= BASE_DIR?>/search" class="search" method="GET">
                    <input type="search" class="input-m2" placeholder="Pesquisar..." name="search" id="search">
                    <button type="submit" class="bg-green-01">
                        <span class="material-symbols-outlined">search</span>
                    </button>
                </form>

                <div class="user-tools">
                    <a href="<?= BASE_DIR?>/perfil" class="profile">
                        <img src="<?= BASE_DIR?>/Public/src/assets/icons/default_user.png" alt="">
                    </a>
                </div>

            </header>

            <?php 
                $this->loadViewTemplate($viewName, $viewData);
                $this->getFlashMessage();
            ?>

        </div>
    </aside>

    <script type="module" src="<?= BASE_DIR?>/Public/src/scripts/shared/lateralMenu.js"></script>
    <script src="<?= BASE_DIR?>/Public/src/scripts/shared/notification.js"></script>
    <script src="<?= BASE_DIR?>/Public/src/scripts/shared/modal.js"></script>

    <script>
        let alert = document.querySelector(".alertMessage");

        setTimeout(() => {
            alert.style.display = "none"
        }, 3000);
    </script>
</body>
</html>