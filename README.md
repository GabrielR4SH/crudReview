# Sistema CRUD de Multiusuários com PHP, MySQL e JS

Este projeto é um sistema básico de CRUD (Create, Read, Update, Delete) desenvolvido utilizando PHP, MySQL e JavaScript. O sistema permite que vários usuários se cadastrem, façam login e realizem operações CRUD em seus dados.

## Configuração do Ambiente

1. **Servidor Web:**
   Certifique-se de ter um servidor web configurado para executar o PHP. Você pode usar soluções como XAMPP, WampServer ou MAMP.

2. **Banco de Dados:**
   - Importe o arquivo `database.sql` no seu sistema de gerenciamento de banco de dados para criar a estrutura do banco de dados.

3. **Configuração do Banco de Dados:**
   - Edite o arquivo `db/connection.php` e atualize as configurações do banco de dados com suas credenciais.

## Funcionalidades

### Registro de Usuários
- Os usuários podem se cadastrar fornecendo um nome de usuário, um endereço de e-mail e uma senha.

### Login
- Os usuários podem fazer login usando seu endereço de e-mail e senha.

### Operações CRUD
- Os usuários autenticados têm a capacidade de criar, visualizar, atualizar e excluir seus próprios dados.

## Estrutura do Projeto

- **`index.php`:** Página inicial que direciona os usuários para login ou registro.
  
- **`login.php`:** Página de login para autenticar os usuários.

- **`register.php`:** Página de registro para criar novas contas de usuário.

- **`welcome.php`:** Página principal após o login, exibindo as operações CRUD e as informações do usuário.

- **`db/connection.php`:** Arquivo de configuração do banco de dados.

- **`assets/style/style.css`:** Arquivo CSS para estilizar as páginas.

- **`assets/script/script.js`:** Arquivo JavaScript para funcionalidades adicionais.

## Executando o Projeto

1. Configure o ambiente conforme as instruções acima.

2. Inicie o servidor web.

3. Acesse o projeto através do navegador.

4. Registre uma nova conta ou faça login com uma conta existente.

5. Explore as funcionalidades CRUD disponíveis na página principal.

## Observações

- Certifique-se de implementar medidas de segurança adequadas, como validação de entrada e proteção contra injeção SQL.

- Este é um projeto básico destinado a fins educacionais. Recomenda-se adaptar e expandir conforme necessário para atender aos requisitos específicos do seu projeto.

Espero que este README ajude a entender e configurar o seu projeto de sistema CRUD de multiusuários com PHP, MySQL e JS. Se precisar de mais assistência ou esclarecimentos, sinta-se à vontade para entrar em contato.
