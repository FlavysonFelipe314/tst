
<div class="wellcome-message">
    Bem Vindo, <?= $user->getName()?>!
</div>

<section class="cards">
    <div class="card-content">
        <div class="card">
            <p>Pacientes Registrados</p>
            <h1><?= ($patients > 0) ? count($patients) : 0 ?></h1>
        </div>
    </div>

    <div class="card-content">
        <div class="card">
            <p>Procedimentos Realizados</p>
            <h1><?= ($procedimentosRealizados > 0) ? count($procedimentosRealizados) : $procedimentosRealizados ?></h1>
        </div>
    </div>

    <div class="card-content">
        <div class="card">
            <p>Procedimentos Pendentes</p>
            <h1><?=($procedimentosPendentes > 0) ? count($procedimentosPendentes) : $procedimentosPendentes ?></h1>
        </div>
    </div>
</section>


<section class="informatives">
    <aside>
        <header class="top-box  bg-blue-01">
            <h3>Ultimos Pacientes Cadastrados</h3>
        </header>

        <section class="card-box">
            <?php if(!empty($patients)){ foreach($patients as $patient):?>
                <div class="patient">
                    <div class="risk" style="background-color: <?= $patient->getClassificacao()?>;"></div>

                    <div class="patient-infos">
                        <h2><?= $patient->getName()?></h2>
                        <div class="patient-data">
                            <div class="data">
                                <div class="topic">
                                    <p>Cpf/Cns:</p>
                                    <h4><?= $patient->getCpfCns()?></h4>
                                </div>

                                <div class="topic">
                                    <p>Proc:</p>
                                    <h4><?= $patient->getProcedimento()?></h4>
                                </div>
                            </div>

                            <div class="data">
                                <div class="topic">
                                    <p>Cod:</p>
                                    <h4><?= $patient->getCodigo()?></h4>
                                </div>

                                <div class="topic">
                                    <p>ACS:</p>
                                    <h4><?= $patient->getAcs()?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;} else{echo "Não Há Dados Para Mostrar";}?>
        </section>
    </aside>

    <aside>
        <header class="top-box  bg-yellow-01">
            <h3>Classificação de Risco</h3>
            
            <form action="" id="risk-form">
                <select style="width: 100%;" name="risco" id="risk" class="select-m1">
                    <option value="#05A2FF">Azul</option>
                    <option value="#FDA712">Amarelo</option>
                    <option value="#FD5646">Vermelho</option>
                </select>
            </form>
        </header>

        <section class="card-box risk-box">

        </section>
    </aside>
</section>

<section class="charts">
    <header class="top-box bg-purple-01">
        <h3>Procedimentos Mais Realizados</h3>
        
        <form action="">

            <input type="date" name="" id="init-date" class="select-m1">

            <input type="date" name="" id="final-date" class="select-m1" disabled>

        </form>
    </header>

    <section class="card-box2">
        <canvas id="grafico">
            <h2 style="font-size:10px;">selecione u</h2>
        </canvas>
    </section>

</section>


<script src="<?= BASE_DIR?>/Public/src/scripts/shared/selectRisk.js"></script>
<script src="<?= BASE_DIR?>/Public/src/scripts/shared/chartData.js"></script>
