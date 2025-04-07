<head>
    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/layouts/cadastro.css">
</head>

<div class="title">
    <h1>Editar Usuário: <?= $usuario->getName()?></h1>
    <p>Preencha Todos Os Campos</p>
</div>

<form method="POST" action="<?= BASE_DIR?>/usuarios/edit">
    <input class="input-m1" type="text" id="name" name="name" placeholder="Nome" value="<?= $usuario->getName()?>">
    <input class="input-m1" type="email" id="email" name="email" placeholder="E-mail" value="<?= $usuario->getEmail()?> ">
    <input class="input-m1" type="password" id="password" name="password" placeholder="Senha">

    <select name="departament" id="departament" class="input-m1">
        <option value="<?= $usuario->getDepartament()?>" selected> <?= $usuario->getDepartament()?></option>
        <option value="Secretaria de Saúde">Secretaria de Saúde</option>
        <option value="Secretaria de Educação">Secretaria de Educação</option>
    </select>

    <select name="access" id="access" class="input-m1">
    <option value="<?= $usuario->getAccess()?>" selected> <?= $usuario->getAccess()?></option>
    <option value="Administrador">Administrador</option>
        <option value="Gerente">Gerente</option>
        <option value="Usuário">Usuário</option>
    </select>



    <button class="bg-green-01" type="submit" name="action" value="<?= $usuario->getId()?>">Cadastrar</button>
</form>