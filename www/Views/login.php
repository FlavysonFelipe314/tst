<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conecta São Felix</title>

    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/vendor/reset.css">
    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/global.css">

    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/layouts/login.css">

    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/components/form.css">
    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/components/button.css">
    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/components/input.css" class="input-m1".css">    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/c49e0b56e6.js" crossorigin="anonymous"></script>
</head>
<body>

    <section class="login">

        <aside id="infos">
            <div class="container">
                <img src="<?= BASE_DIR?>/Public/src/assets/images/logo.png" class="logo" alt="">

                <div class="init-text">
                    <h1>Bem vindo<br>de volta!</h1>
                    <p>Acesse sua conta  agora<br>mesmo.</p>
                </div>

                <a href="<?= BASE_DIR?>/recuperar">
                    <button class="bg-green-01">Recuperar Senha</button>
                </a>
            </div>            
        </aside>

        <aside id="credentials">
            <div class="container">
                <div class="title">
                    <h1>Login</h1>
                    <p>Preencha Todos Os Campos</p>
                </div>
    
                <form method="POST" action="<?= BASE_DIR?>/loginAction">
                    <input class="input-m1" type="email" id="email" name="email" placeholder="E-mail">
                    <input class="input-m1" type="password" id="password" name="password" placeholder="Senha">
    
                    <button class="bg-green-01" type="submit" name="action" value="login">Entrar</button>
                </form>
            </div>
        </aside>
    </section>
    
    <script type="module" src="<?= BASE_DIR?>/Public/src/scripts/shared/login.js"></script>
</body>
</html>