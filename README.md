# trabalho_final_php

Repositório para o trabalho final da disciplina Programação para Web
-

## Oque é o projeto ?
  - O projeto é um gerenciador de Medicamentos para Humanos 💊

## Oque a aplicação faz ?
  - A aplicação serve para que um usuario registre os medicamentos usados no seu dia a dia e ter um controle melhor

## Quais suas funcionalidades ?
  - CRUD(Criação, Leitura, Atualização, Exclusão)
  - Geração de Relatorio 

## Quais ferramentas seram utilizadas ?
  - HTML
  - PHP
  - BOOTSTRAP
  - MYSQL

## Diagramas da Aplicação

### Diagrama de Casos de Uso

## Diagrama de Entidade e Relacionamento
- O diagrama de entidade e relacionamento tem como objetivo representar um sistema de registro pessoal de medicamentos, onde o próprio paciente pode organizar seus tratamentos e acompanhar quando e como toma seus remédios.
- Sobre as tabelas do sistema
- Paciente: representa o usuário do sistema. Cada paciente pode criar seus próprios planos de uso e registrar quando toma os medicamentos.
- Medicamento: aqui ficam armazenadas todas as informações dos remédios, como nome, substância ativa (princípio ativo), forma de uso (ex: comprimido ou xarope), dosagem, fabricante e o tipo de tarja.
- PlanoUso: funciona como um agrupador de medicamentos que o paciente está usando ou vai usar para um determinado tratamento. Por exemplo: “Plano de uso para gripe”.
- PlanoUso_Medicamento: é a tabela que liga os medicamentos ao plano de uso. Nela também ficam informações como quantidade, posologia (como tomar) e por quantos dias o medicamento será usado.
- Administração: registra quando o paciente realmente tomou o remédio, com informações como data, hora, dose e via (ex: oral, injetável). Esse histórico pode ser útil para acompanhamento ou geração de relatórios.
- Via_administracao: é uma tabela auxiliar que lista todas as formas possíveis de administração (oral, intravenosa, etc), evitando repetição de dados e garantindo mais organização.
  
![ERDDiagram_prog_web](https://github.com/user-attachments/assets/09d4aa0f-4ccd-4041-84c5-48497af64653)

### Diagrama de Sequencia 

### Diagrama de classes
 
