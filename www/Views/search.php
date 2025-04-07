<head>
    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/layouts/pacientes.css">
</head>


<section class="title">
    <h2>Resultados</h2>
</section>

<section class="patients">
    <?php foreach($patients as $patient):?>
    <div class="patient-card">
        <div class="first-side">
            <div class="risk">
                <button disabled style="background-color: <?= $patient->getClassificacao()?>;"></button>
            </div>

            <div class="patient-informations">
                <h3><?= $patient->getName()?></h3>
                <div class="topic-informations">
                    <div class="information">
                        <span>cpf/cns:</span>
                        <h4><?= $patient->getCpfCns()?></h4>
                    </div>

                    <div class="information">
                        <span>Procedimento:</span>
                        <h4><?= $patient->getProcedimento()?></h4>
                    </div>

                    <div class="information">
                        <span>Unidade:</span>
                        <h4><?= $patient->getUnidade()?></h4>
                    </div>

                    <div class="information">
                        <span>codigo:</span>
                        <h4><?= $patient->getCodigo()?></h4>
                    </div>

                    <div class="information">
                        <span>ACS:</span>
                        <h4><?= $patient->getAcs()?></h4>
                    </div>

                    <div class="information">
                        <span>Situação:</span>
                        <h4><?= $patient->getSituacao()?></h4>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="patient-actions">

            <a href="">
                <button class="bg-lightGreen-01">Ver Mais</button>
            </a>

            <a href="<?= BASE_DIR?>/pacientes/edit/<?= $patient->getId()?>">
                <button class="bg-yellow-01">Editar</button>
            </a>

            <a href="<?= BASE_DIR?>/pacientes/delete/<?= $patient->getId()?>">
                <button class="bg-red-01">Deletar</button>
            </a>
        </div>
    </div>
    <?php endforeach;?>
</section>


<div class="modal">
    <div class="modal-content">
        <div class="top">
            <h1>Cadastro de Pacientes</h1>
            <p id="close-modal"><i class="fa-regular fa-circle-xmark"></i></p>
        </div>    
        <form method="POST" action="<?= BASE_DIR?>/patientAction">
            <input class="input-m1" type="text" id="name" name="name" placeholder="Nome">
            <input class="input-m1" type="text" id="cpf_cns" name="cpf_cns" placeholder="CPF/CNS">
            <input class="input-m1" type="text" id="codigo" name="codigo" placeholder="Código">
            <select class="input-m1" type="text" id="procedimento" name="procedimento">
                <option value="">Selecione</option>
                <option value="consulta_cardiologia">Consulta com Cardiologista</option>
                <option value="ultrassonografia_abdome">Ultrassonografia de Abdômen</option>
                <option value="ressonancia_magnetica">Ressonância Magnética</option>
                <option value="eletrocardiograma">Eletrocardiograma (ECG)</option>
                <option value="endoscopia_digestiva">Endoscopia Digestiva Alta</option>
                <option value="hemograma_completo">Hemograma Completo</option>
                <option value="mamografia">Mamografia</option>
                <option value="teste_ergometrico">Teste Ergométrico</option>
                <option value="colonoscopy">Colonoscopia</option>
                <option value="psicoterapia">Psicoterapia</option>
            </select>
            <input class="input-m1" type="text" id="acs" name="acs" placeholder="ACS"> 
            <select class="input-m1" type="text" id="classificacao" name="classificacao">
                    <option value="">Selecione</option>
                    <option value="#05A2FF">Azul</option>
                    <option value="#FDA712">Amarelo</option>
                    <option value="#FD5646">Vermelho</option>
            </select>
            <input class="input-m1" type="text" id="unidade" name="unidade" placeholder="Unidade">
            <select class="input-m1" type="text" id="situacao" name="situacao">
                <option value="">Selecione</option>
                <option value="Aberto">Aberto</option>
                <option value="Encerrado">Encerrado</option>
            </select>
            <button class="bg-green-01" type="submit" name="action" value="add-patient">Cadastrar</button>
        </form>

    </div>
</div>