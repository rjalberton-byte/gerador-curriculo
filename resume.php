<?php
// resume.php

// Funções simples para pegar os campos
function campo($name) {
    return isset($_POST[$name]) ? trim($_POST[$name]) : '';
}

function arr($name) {
    return (isset($_POST[$name]) && is_array($_POST[$name])) ? $_POST[$name] : [];
}

// Dados pessoais
$nome     = campo('nome');
$nasc     = campo('nasc');
$idade    = campo('idade');
$email    = campo('email');
$telefone = campo('telefone');
$cidade   = campo('cidade');
$objetivo = campo('objetivo');
$habilStr = campo('habilidades');

// transforma habilidades em lista
$habilidades = [];
if ($habilStr !== '') {
    $habilidades = array_filter(array_map('trim', explode(',', $habilStr)));
}

// Experiências (arrays)
$exp_empresa = arr('exp_empresa');
$exp_cargo   = arr('exp_cargo');
$exp_inicio  = arr('exp_inicio');
$exp_fim     = arr('exp_fim');
$exp_desc    = arr('exp_desc');
$ref_nome    = arr('ref_nome');
$ref_cargo   = arr('ref_cargo');
$ref_contato = arr('ref_contato');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Currículo - <?php echo htmlspecialchars($nome); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        @media print {
            .no-print { display: none; }
            body { background: #fff; }
        }
        body {
            background: #f5f5f5;
        }
    </style>
</head>
<body>

<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Currículo</h1>
        <button class="btn btn-secondary no-print" onclick="window.print()">Imprimir / Salvar em PDF</button>
    </div>

    <div class="bg-white p-4 rounded shadow-sm">

        <!-- Cabeçalho -->
        <h2 class="h2"><?php echo htmlspecialchars($nome); ?></h2>
        <p class="text-muted mb-1">
            <?php if ($cidade): ?>
                <?php echo htmlspecialchars($cidade); ?> |
            <?php endif; ?>
            <?php if ($email): ?>
                <?php echo htmlspecialchars($email); ?> |
            <?php endif; ?>
            <?php if ($telefone): ?>
                <?php echo htmlspecialchars($telefone); ?>
            <?php endif; ?>
        </p>
        <p class="text-muted">
            <?php if ($nasc): ?>
                Nascimento: <?php echo htmlspecialchars($nasc); ?>
            <?php endif; ?>
            <?php if ($idade): ?>
                <?php echo $nasc ? ' | ' : ''; ?>Idade: <?php echo htmlspecialchars($idade); ?> anos
            <?php endif; ?>
        </p>

        <!-- Objetivo -->
        <?php if ($objetivo): ?>
            <hr>
            <h3 class="h5">Objetivo</h3>
            <p><?php echo nl2br(htmlspecialchars($objetivo)); ?></p>
        <?php endif; ?>

        <!-- Habilidades -->
        <?php if (!empty($habilidades)): ?>
            <hr>
            <h3 class="h5">Habilidades</h3>
            <ul>
                <?php foreach ($habilidades as $h): ?>
                    <li><?php echo htmlspecialchars($h); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <!-- Experiência Profissional -->
        <?php
        $temExp = false;
        foreach ($exp_empresa as $i => $emp) {
            if (trim($emp) !== '' || trim($exp_cargo[$i] ?? '') !== '' || trim($exp_desc[$i] ?? '') !== '') {
                $temExp = true;
                break;
            }
        }
        ?>

        <?php if ($temExp): ?>
            <hr>
            <h3 class="h5">Experiência Profissional</h3>
            <?php for ($i = 0; $i < count($exp_empresa); $i++): ?>
                <?php
                $empresa = trim($exp_empresa[$i] ?? '');
                $cargo   = trim($exp_cargo[$i] ?? '');
                $inicio  = trim($exp_inicio[$i] ?? '');
                $fim     = trim($exp_fim[$i] ?? '');
                $desc    = trim($exp_desc[$i] ?? '');

                if ($empresa === '' && $cargo === '' && $desc === '') {
                    continue;
                }
                ?>
                <div class="mb-3">
                    <strong>
                        <?php echo htmlspecialchars($cargo); ?>
                        <?php if ($empresa): ?>
                            - <?php echo htmlspecialchars($empresa); ?>
                        <?php endif; ?>
                    </strong><br>
                    <small class="text-muted">
                        <?php echo htmlspecialchars($inicio); ?>
                        <?php if ($fim): ?>
                            &nbsp;até&nbsp;<?php echo htmlspecialchars($fim); ?>
                        <?php endif; ?>
                    </small>
                    <?php if ($desc): ?>
                        <p class="mb-0"><?php echo nl2br(htmlspecialchars($desc)); ?></p>
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        <?php endif; ?>

    </div>
        <!-- Referências Pessoais -->
        <?php
        $temRef = false;
        foreach ($ref_nome as $i => $nomeRef) {
            if (trim($nomeRef) !== '' || trim($ref_contato[$i] ?? '') !== '') {
                $temRef = true;
                break;
            }
        }
        ?>

        <?php if ($temRef): ?>
            <hr>
            <h3 class="h5">Referências Pessoais</h3>
            <ul>
                <?php for ($i = 0; $i < count($ref_nome); $i++): ?>
                    <?php
                    $n  = trim($ref_nome[$i] ?? '');
                    $c  = trim($ref_cargo[$i] ?? '');
                    $ct = trim($ref_contato[$i] ?? '');
                    if ($n === '' && $ct === '') continue;
                    ?>
                    <li>
                        <strong><?php echo htmlspecialchars($n); ?></strong>
                        <?php if ($c): ?>
                            – <?php echo htmlspecialchars($c); ?>
                        <?php endif; ?>
                        <?php if ($ct): ?>
                            (<?php echo htmlspecialchars($ct); ?>)
                        <?php endif; ?>
                    </li>
                <?php endfor; ?>
            </ul>
        <?php endif; ?>

    <div class="mt-3 no-print">
        <a href="index.php" class="btn btn-link">Voltar e editar dados</a>
    </div>
</div>

</body>
</html>