# CRUD Simples em PHP para Faculdade

Este é um projeto de CRUD (Create, Read, Update, Delete) desenvolvido em PHP puro com PDO e MySQL, como parte de um trabalho acadêmico.

## Como Executar

1.  **Clone o repositório:**
    ```
    git clone [URL_DO_SEU_REPOSITORIO]
    ```

2.  **Banco de Dados:**
    - Crie um banco de dados chamado `crud_php`.
    - Execute o seguinte script SQL para criar a tabela `usuarios`:
    ```sql
    CREATE TABLE usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    ```

3.  **Configuração:**
    - Renomeie o arquivo `db.example.php` para `db.php`.
    - Abra o arquivo `db.php` e insira as suas credenciais de acesso ao banco de dados (usuário e senha).

4.  **Execute:**
    - Coloque a pasta do projeto no diretório do seu servidor local (ex: `htdocs` do XAMPP).
    - Acesse `http://localhost/nome-da-pasta` no seu navegador.