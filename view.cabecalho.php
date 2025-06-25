<?php
#view.cabecalho.php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MediControl</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">MediControl</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
        aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">🏠 Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="view.formcadPaciente.php">➕ Cadastrar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="view.formlistaPaciente.php">📋 Listar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="view.formdelPaciente.php">❌ Apagar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="view.formUpdPaciente.php">✏️ Atualizar</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">

		