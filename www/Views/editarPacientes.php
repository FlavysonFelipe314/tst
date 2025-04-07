<style>
    input,
    select{
        border: 1px solid #666 !important;
        background-color: #fff !important;
    }

    h1{
        font-size: 22px;
        margin: 0 0 20px 0;
    }
</style>

<h1>Editando dados de: <?= $patient->getName()?></h1>

<form method="POST" action="<?= BASE_DIR?>/pacientes/edit/">
<input class="input-m1" type="text" id="name" name="name" placeholder="Nome" value="<?= $patient->getName()?>">
    <input class="input-m1" type="text" id="cpf_cns" name="cpf_cns" placeholder="CPF/CNS" value="<?= $patient->getCpfCns()?>">
    <input class="input-m1" type="text" id="codigo" name="codigo" placeholder="Código" value="<?= $patient->getCodigo()?>">
    <select class="input-m1" type="text" id="procedimento" name="procedimento" >
        <option value="<?= $patient->getProcedimento()?>"><?= $patient->getProcedimento()?></option>
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
    <input class="input-m1" type="text" id="acs" name="acs" placeholder="ACS" value="<?= $patient->getAcs()?>"> 
    <select class="input-m1" type="text" id="classificacao" name="classificacao">
        <option value="">Selecione a Classificação</option>
        <option value="#05A2FF" <?= $patient->getClassificacao() == '#05A2FF' ? 'selected' : '' ?>>Azul</option>
        <option value="#FDA712" <?= $patient->getClassificacao() == '#FDA712' ? 'selected' : '' ?>>Amarelo</option>
        <option value="#FD5646" <?= $patient->getClassificacao() == '#FD5646' ? 'selected' : '' ?>>Vermelho</option>
    </select>
    <input class="input-m1" type="text" id="unidade" name="unidade" placeholder="Unidade" value="<?= $patient->getUnidade()?>">
    <select class="input-m1" type="text" id="situacao" name="situacao" value="<?= $patient->getSituacao()?>">
        <option value="<?= $patient->getSituacao()?>"><?= $patient->getSituacao()?></option>
        <option value="Aberto">Aberto</option>
        <option value="Encerrado">Encerrado</option>
    </select>
    <input type="hidden" name="id" value="<?= $patient->getId()?>"><br><br>
    <button class="bg-green-01" type="submit" name="action" value="add-patient">Cadastrar</button>
</form>