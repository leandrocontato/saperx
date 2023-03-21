Agenda Telefônica
Este projeto é uma Agenda Telefônica desenvolvida em Laravel, com uma API e um CRUD básico para cadastro, edição e exclusão de contatos. Além disso, possui um relatório para visualização dos nomes contidos na agenda.

Tecnologias Utilizadas
Laravel
MySQL
PHPUnit
Instalação
Clone este repositório: git clone https://github.com/seu-usuario/seu-repositorio.git.
Acesse a pasta do projeto: cd agenda-telefonica.
Instale as dependências do projeto: composer install.
Crie um arquivo .env a partir do .env.example e configure as informações do banco de dados.
Gere uma nova chave para a aplicação: php artisan key:generate.
Execute as migrações para criar as tabelas do banco de dados: php artisan migrate.
Inicie o servidor local: php artisan serve.
Acesse o projeto em http://localhost:8000.
Utilização
API
A API da Agenda Telefônica possui os seguintes endpoints:

GET /api/contatos: Retorna todos os contatos cadastrados.
POST /api/contatos: Cadastra um novo contato.
GET /api/contatos/{id}: Retorna as informações de um contato específico.
PUT /api/contatos/{id}: Edita as informações de um contato específico.
DELETE /api/contatos/{id}: Exclui um contato específico.
Os campos suportados para cadastro/edição de um contato são: nome, e-mail, data de nascimento, CPF e telefones.

Relatório
O relatório da Agenda Telefônica pode ser acessado em http://localhost:8000/relatorio. Ele exibe apenas o nome de todos os contatos cadastrados.

Testes
Para executar os testes automatizados, basta rodar o comando phpunit na raiz do projeto.

Autor Desenvolvido por Leandro Miranda.
