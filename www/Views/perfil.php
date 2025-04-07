<head>
<link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/layouts/pacientes.css">
</head>

<section class="title">
    <h2>Meu Perfil</h2>
</section>

<section class="patients">
    <div class="patient-card">
        <div class="first-side">
            <div class="risk">
                <button disabled class="bg-blue-01"></button>
            </div>

            <div class="patient-informations">
                <h3><?= $user->getName()?></h3>
                <div class="topic-informations">
                    <div class="information">
                        <span>Email:</span>
                        <h4><?= $user->getEmail()?></h4>
                    </div>

                    <div class="information">
                        <span>Departamento:</span>
                        <h4><?= $user->getDepartament()?></h4>
                    </div>

                    <div class="information">
                        <span>Acesso:</span>
                        <h4><?= $user->getAccess()?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>