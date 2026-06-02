### O projeto foi criado utilizando Laravel 10, pensando em uma arquitetura simples, porém organizada e escalável.

- Utilizei Controllers (Single Action Controllers) separando suas responsabilidades, deixando cada controller responsável por uma ação, facilitando uma possível manutenção.

- Seguindo essa idéia de desacoplamento de responsabilidade, utilizei Form Request independentes, garantindo maior organização e reutilização de regras de validação.

- Criação de Services para que a regra de negócio ficasse encapsulada.

- Toda interface da aplicação conta com a utilização do Bootstrap.

- O envio de e-mail de boas-vindas foi implementado utilizando o sistema de Mailables do Laravel. A responsabilidade de criação do usuário e disparo do e-mail foi centralizada no UserService, garantindo reutilização da lógica entre os fluxos de cadastro público e administrativo.

- O disparo do e-mail ocorre após a criação de um usuário, tanto no fluxo público quanto no administrativo, evitando duplicação de código ao centralizar a regra em uma camada de serviço.

### Instruções para rodar o projeto localmente

## - Requisitos

Antes de iniciar, certifique-se de ter instalado:

- PHP 8.1+
- Composer
- MySQL
- Git
- XAMPP

## Passo 1

Clonar o repositório

No terminal (bash), executar:

- git clone https://github.com/Eriveltoon/Teste-Dinamk.git

Após clonar o projeto, acessar a pasta criada pelo Git:

- cd Teste-Dinamk

## Passo 2

Instalar dependências do PHP.
Dentro da pasta do projeto, rodar o comando (composer install).

## Passo 3

Configurar o arquivo .env
Copie o arquivo .env.example e cole no mesmo diretório e renomeie para .env

## Passo 4

Gerar chave da aplicação.
No terminal bash e dentro da pasta do projeto, rode este comando

- php artisan key:generate.

## Passo 5

Configurar banco de dados
Abrir o XAMPP e startar os MODULE (Apache e MySQL)
Crie um banco no MySQL, utilizei o phpmyadmin do XAMPP (http://localhost/phpmyadmin/), nome do Banco pode ser (teste_dinamk).

No .env configurar esta parte com o DB_DATABASE, DB_USERNAME:
OBS: Se tiver alguma senha no Banco que você criou, adicionar no campo (DB_PASSWORD)

- DB_DATABASE=teste_dinamk
- DB_USERNAME=root
- DB_PASSWORD=

## Passo 6

Rodar migration.
No terminal bash, dentro da pasta do projeto, rodar o comando, para criar a tabela (users) já com os campos necessários.

- php artisan migrate

## Passo 7

Configuração de e-mail (Mailtrap)
Para testes e visualização dos e-mails enviados, pode ser utilizada uma conta no Mailtrap, responsável pela criação da inbox e obtenção das credenciais SMTP utilizadas no arquivo .env
Após criar a conta e logar no Mailtrap, acessar o passo a passo a seguir.

Sandboxes -> Projects -> Acessar config (SMTP) que terá os dados p/ configurar o .env:

- MAIL_MAILER=smtp
- MAIL_HOST=sandbox.smtp.mailtrap.io
- MAIL_PORT=2525
- MAIL_USERNAME=seu_usuario
- MAIL_PASSWORD=sua_senha
- MAIL_ENCRYPTION=null
- MAIL_FROM_ADDRESS="noreply@teste.com"
- MAIL_FROM_NAME="Sistema"

## Passo 8

Configuração dos testes automatizados (Opcional)

Para executar os testes automatizados, crie um arquivo `.env.testing` na raiz do projeto com uma configuração de banco de dados separada da utilizada pela aplicação.

Exemplo:

- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=auto_testing
- DB_USERNAME=root
- DB_PASSWORD=

Crie previamente o banco de dados, seguindo a mesma orientação do (Passo 5) informado em `DB_DATABASE` exemplo sugerido do Banco (auto_testing).

Para executar um teste específico:

- php artisan test --filter=RegisterTest (Valida o cadastro público de usuários)
- php artisan test --filter=LoginTest (Valida a autenticação e o acesso ao sistema)
- php artisan test --filter=UserStoreTest (Valida o cadastro de usuários por um usuário autenticado)

Atualmente o projeto possui testes automatizados de Feature para validação dos fluxos de cadastro público, autenticação e cadastro de usuários por usuários autenticados.

## Passo 9

Rodar o servidor local
No terminal bash, dentro da pasta do projeto, rodar o comando (php artisan serve)
A aplicação rodará neste link (http://127.0.0.1:8000), só copiar e colar no navegador, para que possa começar a usá-lo.

- php artisan serve
- http://127.0.0.1:8000

## Passo 10

Acesso ao sistema
Crie um novo usuário para que possa fazer o login no sistema e ter acesso a todas funcionalidades.

## O desenvolvimento deste projeto, foi pensado em boas práticas de arquitetura, isolando responsabilidades e adicionando envio de e-mail automatizado no processo de criação de usuários.
