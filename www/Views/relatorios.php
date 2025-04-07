<head>
    <link rel="stylesheet" href="<?= BASE_DIR?>/Public/src/styles/layouts/relatorios.css">
</head>


<section class="title">
    <h2>Relatorios</h2>
</section>

<section class="resums">
    <div class="resum-box">
        <div class="resum bg-lightGreen-01">
            <h3>Procedimentos</h3>
        
            <form action="<?= BASE_DIR?>/relatorios/relatorio" method="POST">
                <select name="select" id="" class="select-m2">
                    <option value="">Selecione Uma Opção</option>
                    <option value="*">Todos</option>
                    <?php foreach($procedimentos as $procedimento):?>
                        <option value="<?= $procedimento?>"><?= $procedimento?></option>
                    <?php endforeach;?>
                </select>

                <div class="dates">
                    <input type="date" name="initial-date" class="select-m1">
                    <input type="date" name="end-date" class="select-m1">
                </div>
                <input type="hidden" name="key" value="procedimento" class="select-m1">
                <button class="btn2" type="submit" name="action" value="resum">Baixar</button>
            </form>
        </div>
    </div>

    <div class="resum-box">
        <div class="resum bg-blue-01">
            <h3>Pacientes</h3>
        
            <form action="">
                <select name="select" id="" class="select-m2">
                    <option value="">Selecione Uma Opção</option>
                    <option value="*">Todos</option>
                    <?php foreach($procedimentos as $procedimento):?>
                        <option value="<?= $procedimento?>"><?= $procedimento?></option>
                    <?php endforeach;?>
                </select>

                <div class="dates">
                    <input type="date" name="initial-date" class="select-m1">
                    <input type="date" name="end-date" class="select-m1">
                </div>

                <button class="btn2" type="submit" name="action" value="resum">Baixar</button>
            </form>
        </div>
    </div>

    <div class="resum-box">
        <div class="resum bg-green-01">
            <h3>ACS</h3>
            
            <form action="<?= BASE_DIR?>/relatorios/relatorio" method="POST">
                <select name="select" id="" class="select-m2">
                    <option value="">Selecione Uma Opção</option>
                    <option value="*">Todos</option>
                    <?php foreach($acs as $item):?>
                        <option value="<?= $item?>"><?= $item?></option>
                    <?php endforeach;?>
                </select>

                <div class="dates">
                    <input type="date" name="initial-date" class="select-m1">
                    <input type="date" name="end-date" class="select-m1">
                </div>

                <input type="hidden" name="key" value="acs" class="select-m1">
                <button class="btn2" type="submit" name="action" value="resum">Baixar</button>
            </form>
        </div>
    </div>

    <div class="resum-box">
        <div class="resum bg-purple-01">
            <h3>Unidade</h3>
            
            <form action="<?= BASE_DIR?>/relatorios/relatorio" method="POST">
                <select name="select" id="" class="select-m2">
                    <option value="">Selecione Uma Opção</option>
                    <option value="*">Todos</option>
                    <?php foreach($unidades as $unidade):?>
                        <option value="<?= $unidade?>"><?= $unidade?></option>
                    <?php endforeach;?>
                </select>

                <div class="dates">
                    <input type="date" name="initial-date" class="select-m1">
                    <input type="date" name="end-date" class="select-m1">
                </div>

                <input type="hidden" name="key" value="unidade" class="select-m1">
                <button class="btn2" type="submit" name="action" value="resum">Baixar</button>
            </form>
        </div>
    </div>
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
        <canvas id="grafico"></canvas>
    </section>
</section>

<script src="<?= BASE_DIR?>/Public/src/scripts/shared/chartData.js"></script>
