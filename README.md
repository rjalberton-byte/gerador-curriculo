# Gerador de Currículo em PHP

Projeto desenvolvido para a disciplina **Fundamentos de Programação para Internet (UNIPAR EAD)**.

## Descrição

Aplicação web que permite ao usuário preencher um formulário com seus dados pessoais,
experiências profissionais, formação acadêmica, habilidades, idiomas e referências.
Com base nesses dados, o sistema gera um currículo formatado, pronto para impressão
ou salvamento em PDF através do próprio navegador.

## Tecnologias utilizadas

- PHP
- HTML
- CSS (Bootstrap via CDN)
- JavaScript
- XAMPP (servidor local)
- Git e GitHub

## Funcionalidades

- Cálculo automático da idade a partir da data de nascimento (JavaScript).
- Campos dinâmicos para **experiências profissionais** com botão `+`.
- Campos dinâmicos para **formação acadêmica** com botão `+`.
- Campos dinâmicos para **referências pessoais** com botão `+`.
- Geração de currículo formatado via PHP.
- Botão de **Imprimir / Salvar em PDF** utilizando `window.print()`.

## Como executar o projeto

1. Copie a pasta do projeto para o diretório `htdocs` do XAMPP, por exemplo:

   `C:\xampp\htdocs\curriculo-app`

2. Inicie o servidor Apache no painel do XAMPP.

3. Acesse no navegador:

   `http://localhost/curriculo-app/index.php`

4. Preencha o formulário e clique em **Gerar Currículo**.

5. Na tela do currículo, use o botão **Imprimir / Salvar em PDF**.

## Autor

- Renata – Acadêmica UNIPAR EAD.
