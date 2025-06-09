# trabalho_final_php

Repositório para o trabalho final da disciplina Programação para Web
-

## Oque é o projeto ?
  - O projeto é um gerenciador de Medicamentos para Humanos 💊

## Oque a aplicação faz ?
  -

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

![UseCaseDiagram_prog_web](https://github.com/user-attachments/assets/4c5c0f2f-4ada-47a6-85a9-6dfe03d7cb79)

## Diagrama de Entidade e Relacionamento
- O diagrama de entidade e relacionamento tem como objetivo representar um sistema de registro pessoal de medicamentos, onde o próprio paciente pode organizar seus tratamentos e acompanhar quando e como toma seus remédios.
- Sobre as tabelas do sistema
- Paciente: representa o usuário do sistema. Cada paciente pode criar seus próprios planos de uso e registrar quando toma os medicamentos.
- Medicamento: aqui ficam armazenadas todas as informações dos remédios, como nome, substância ativa (princípio ativo), forma de uso (ex: comprimido ou xarope), dosagem, fabricante e o tipo de tarja.
- PlanoUso: funciona como um agrupador de medicamentos que o paciente está usando ou vai usar para um determinado tratamento. Exemplo: “Plano de uso para gripe”.
- PlanoUso_Medicamento: é a tabela que liga os medicamentos ao plano de uso. Nela também ficam informações como quantidade, posologia (como tomar) e por quantos dias o medicamento será usado.
- Administração: registra quando o paciente realmente tomou o remédio, com informações como data, hora, dose e via (ex: oral, injetável). Esse histórico pode ser útil para acompanhamento ou geração de relatórios.
- Via_administracao: é uma tabela auxiliar que lista todas as formas possíveis de administração (oral, intravenosa, etc), evitando repetição de dados e garantindo mais organização.
  
![ERDDiagram_prog_web](https://github.com/user-attachments/assets/09d4aa0f-4ccd-4041-84c5-48497af64653)

### Diagrama de Sequencia 



### Diagrama de classes

### Models

![ClassDiagram_prog_web](https://github.com/user-attachments/assets/94288c38-665c-4f75-bc19-07588881ec1d)

### Views

![ClassDiagram_prog_web_views](https://github.com/user-attachments/assets/03614216-7d63-415c-b64b-cfd286dca7b7)

### Controllers

![ClassDiagram_prog_web_controllers](https://github.com/user-attachments/assets/53f73c3e-acaf-4582-b250-645272c10697)
