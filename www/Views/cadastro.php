<head>
    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/layouts/cadastro.css">
</head>

<div class="title">
    <h1>Cadastrar Usuário</h1>
    <p>Preencha Todos Os Campos</p>
</div>

<form method="POST" action="<?= BASE_DIR?>/cadastrarAction">
    <input class="input-m1" type="text" id="name" name="name" placeholder="Nome">
    <input class="input-m1" type="email" id="email" name="email" placeholder="E-mail">
    <input class="input-m1" type="password" id="password" name="password" placeholder="Senha">

    <select name="departament" id="departament" class="input-m1">
        <option value="">Selecione o Departamento</option>
        <option value="Secretaria de Saúde">Secretaria de Saúde</option>
        <option value="Secretaria de Educação">Secretaria de Educação</option>
    </select>

    <select name="access" id="access" class="input-m1">
        <option value="">Selecione o Acesso</option>
        <option value="Administrador">Administrador</option>
        <option value="Gerente">Gerente</option>
        <option value="Usuário">Usuário</option>
    </select>

    <button class="bg-green-01" type="submit" name="action" value="login">Cadastrar</button>
</form>