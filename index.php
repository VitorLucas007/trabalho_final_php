<?php
#view.principal.php
include_once('view.cabecalho.php');
?>

<div class="container mt-5">
    <h3 class="text-center mb-4">💊 Sistema de Gerenciamento de Medicamentos 💊</h3>

    <!-- Breve Tutorial -->
    <div class="alert alert-info">
        <h5>📋 Como utilizar o sistema:</h5>
        <ul>
            <li><strong>Medicamentos:</strong> Cadastre, atualize ou exclua os medicamentos disponíveis no sistema.</li>
            <li><strong>Pacientes:</strong> Registre os pacientes que farão uso dos medicamentos.</li>
            <li><strong>Planos de Uso:</strong> Associe medicamentos a pacientes, definindo quantidade, posologia e duração.</li>
            <li><strong>Administrações:</strong> Registre as administrações de medicamentos feitas em cada paciente.</li>
            <li><strong>Relatórios:</strong> Gere relatórios em PDF com os dados dos pacientes e seus medicamentos.</li>
        </ul>
        <p>📌 Navegue pelos módulos abaixo para começar.</p>
    </div>

    <div class="row justify-content-center">
        <!-- Card - Medicamentos -->
        <div class="col-md-4 mb-3">
            <div class="card text-center shadow">
                <div class="card-header bg-primary text-white">
                    Medicamentos
                </div>
                <div class="card-body">
                    <p class="card-text">Gerenciar todos os medicamentos cadastrados no sistema.</p>
                    <form method="GET" action="view.formListaMedicamento.php">
                        <button type="submit" class="btn btn-primary">Ver Lista de Medicamentos</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Card - Pacientes -->
        <div class="col-md-4 mb-3">
            <div class="card text-center shadow">
                <div class="card-header bg-success text-white">
                    Pacientes
                </div>
                <div class="card-body">
                    <p class="card-text">Gerenciar os pacientes e visualizar seus planos de uso de medicamentos.</p>
                    <form method="GET" action="view.formlistaPaciente.php">
                        <button type="submit" class="btn btn-success">Ver Lista de Pacientes</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Card - Relatório PDF -->
        <div class="col-md-4 mb-3">
            <div class="card text-center shadow">
                <div class="card-header bg-warning text-dark">
                    Relatórios
                </div>
                <div class="card-body">
                    <p class="card-text">Gerar um relatório completo em PDF com os dados dos pacientes e medicamentos.</p>
                    <form method="GET" action="controller.gerarRelatorioPDF.php">
                        <button type="submit" class="btn btn-warning">Gerar Relatório PDF</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once('view.rodape.php');
?>
