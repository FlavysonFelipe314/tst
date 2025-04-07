<head>
    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/layouts/pacientes.css">
</head>


<section class="title">
    <h2>Códigos Cadastrados</h2>
</section>

<section class="patients">
    <?php if(!empty($codes)){ foreach($codes as $code):?>
    
    <div class="patient-card">
        <div class="first-side">
            <div class="risk">
                <button disabled class="bg-blue-01"></button>
            </div>

            <div class="patient-informations">
                <h3><?= $code->getCodigo()?></h3>
                <div class="topic-informations">
                    <div class="information">
                        <span>Unidade:</span>
                        <h4><?= $code->getUnidade()?></h4>
                    </div>

                    <div class="information">
                        <span>ACS:</span>
                        <h4><?= $code->getAcs()?></h4>
                    </div>

                    <div class="information">
                        <span>Cadastro Completo:</span>
                        <h4>Pendente</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;} else{echo "Não Há Dados Para Mostrar";}?>
</section>
