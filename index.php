<?php
// index.php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerador de Currículo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap (via CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container my-4">
    <h1 class="mb-3">Gerador de Currículo</h1>
    <p class="text-muted">Preencha seus dados e clique em “Gerar Currículo”.</p>

    <!-- FORMULÁRIO: NÃO MEXER NA ABERTURA NEM NO FECHAMENTO -->
    <form action="resume.php" method="POST" class="row g-3">

        <!-- DADOS PESSOAIS -->
        <h2 class="h5 mt-3">Dados Pessoais</h2>

        <div class="col-md-6">
            <label class="form-label">Nome completo</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="col-md-3">
            <label class="form-label">Data de nascimento</label>
            <input type="date" name="nasc" id="nasc" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">Idade (automático)</label>
            <input type="text" name="idade" id="idade" class="form-control" readonly>
        </div>

        <div class="col-md-6">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label">Cidade / UF</label>
            <input type="text" name="cidade" class="form-control">
        </div>

        <!-- PERFIL -->
        <h2 class="h5 mt-4">Perfil</h2>

        <div class="col-md-6">
            <label class="form-label">Objetivo</label>
            <textarea name="objetivo" class="form-control" rows="3"></textarea>
        </div>

        <div class="col-md-6">
            <label class="form-label">Habilidades (separe por vírgulas)</label>
            <textarea name="habilidades" class="form-control" rows="3"></textarea>
        </div>

<div class="col-12">
    <label class="form-label">Idiomas (ex.: Inglês fluente, Espanhol intermediário)</label>
    <textarea name="idiomas" class="form-control" rows="2"></textarea>
</div>

        <!-- EXPERIÊNCIA PROFISSIONAL (DINÂMICA) -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h2 class="h5 mb-0">Experiência Profissional</h2>
            <button type="button" id="addExp" class="btn btn-outline-secondary btn-sm">
                + Adicionar experiência
            </button>
        </div>

        <div id="experiencias" class="mt-2">
            <!-- Bloco base de experiência -->
            <div class="row g-3 exp-item">
                <div class="col-md-6">
                    <label class="form-label">Empresa</label>
                    <input type="text" name="exp_empresa[]" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Cargo</label>
                    <input type="text" name="exp_cargo[]" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Início (mm/aaaa)</label>
                    <input type="text" name="exp_inicio[]" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Fim (mm/aaaa ou Atual)</label>
                    <input type="text" name="exp_fim[]" class="form-control">
                </div>

                <div class="col-12">
                    <label class="form-label">Descrição das atividades</label>
                    <textarea name="exp_desc[]" class="form-control" rows="3"></textarea>
                </div>
            </div>
        </div>

<!-- FORMAÇÃO ACADÊMICA (DINÂMICA) -->
<div class="d-flex justify-content-between align-items-center mt-4">
    <h2 class="h5 mb-0">Formação Acadêmica</h2>
    <button type="button" id="addForm" class="btn btn-outline-secondary btn-sm">
        + Adicionar formação
    </button>
</div>

<div id="formacoes" class="mt-2">
    <!-- Bloco base de formação -->
    <div class="row g-3 form-item">
        <div class="col-md-6">
            <label class="form-label">Curso</label>
            <input type="text" name="form_curso[]" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label">Instituição</label>
            <input type="text" name="form_inst[]" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label">Início (mm/aaaa)</label>
            <input type="text" name="form_inicio[]" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label">Fim (mm/aaaa ou Atual)</label>
            <input type="text" name="form_fim[]" class="form-control">
        </div>
    </div>
</div>

        <!-- REFERÊNCIAS PESSOAIS (DINÂMICAS) -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h2 class="h5 mb-0">Referências Pessoais</h2>
            <button type="button" id="addRef" class="btn btn-outline-secondary btn-sm">
                + Adicionar referência
            </button>
        </div>

        <div id="referencias" class="mt-2">
            <!-- Bloco base de referência -->
            <div class="row g-3 ref-item">
                <div class="col-md-4">
                    <label class="form-label">Nome</label>
                    <input type="text" name="ref_nome[]" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Relação/Cargo</label>
                    <input type="text" name="ref_cargo[]" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Contato (telefone/email)</label>
                    <input type="text" name="ref_contato[]" class="form-control">
                </div>
            </div>
        </div>

        <!-- BOTÃO DE GERAR CURRÍCULO (DENTRO DO FORM!) -->
        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">
                Gerar Currículo
            </button>
        </div>

    </form> <!-- FIM DO FORMULARIO -->

</div>

<!-- JS: IDADE + CAMPOS DINÂMICOS -->
<script>
// ========== CÁLCULO AUTOMÁTICO DA IDADE ==========
const nascInput  = document.getElementById('nasc');
const idadeInput = document.getElementById('idade');

if (nascInput && idadeInput) {
    nascInput.addEventListener('change', function () {
        const valor = nascInput.value; // AAAA-MM-DD
        if (!valor) {
            idadeInput.value = '';
            return;
        }

        const hoje = new Date();
        const nasc = new Date(valor);

        let idade = hoje.getFullYear() - nasc.getFullYear();
        const mes  = hoje.getMonth() - nasc.getMonth();

        if (mes < 0 || (mes === 0 && hoje.getDate() < nasc.getDate())) {
            idade--;
        }

        idadeInput.value = idade >= 0 ? idade : '';
    });
}

// ========== BOTÃO + PARA EXPERIÊNCIAS ==========
const btnAddExp    = document.getElementById('addExp');
const containerExp = document.getElementById('experiencias');

if (btnAddExp && containerExp) {
    btnAddExp.addEventListener('click', function () {
        const modelo = containerExp.querySelector('.exp-item');
        if (!modelo) return;

        const clone = modelo.cloneNode(true);
        const campos = clone.querySelectorAll('input, textarea');
        campos.forEach(campo => campo.value = '');

        containerExp.appendChild(clone);
    });
}

// ========== BOTÃO + PARA REFERÊNCIAS ==========
const btnAddRef    = document.getElementById('addRef');
const containerRef = document.getElementById('referencias');

if (btnAddRef && containerRef) {
    btnAddRef.addEventListener('click', function () {
        const modelo = containerRef.querySelector('.ref-item');
        if (!modelo) return;

        const clone = modelo.cloneNode(true);
        const campos = clone.querySelectorAll('input');
        campos.forEach(campo => campo.value = '');

        containerRef.appendChild(clone);
    });
}

// ========== BOTÃO + PARA FORMAÇÃO ACADÊMICA ==========
const btnAddForm    = document.getElementById('addForm');
const containerForm = document.getElementById('formacoes');

if (btnAddForm && containerForm) {
    btnAddForm.addEventListener('click', function () {
        const modelo = containerForm.querySelector('.form-item');
        if (!modelo) return;

        const clone = modelo.cloneNode(true);
        const campos = clone.querySelectorAll('input');
        campos.forEach(campo => campo.value = '');

        containerForm.appendChild(clone);
    });
}
</script>
</body>
</html>