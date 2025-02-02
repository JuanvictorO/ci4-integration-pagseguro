# CodeIgniter 4  Integration PagSeguro API

Em desenvolvimento.

### Funcionalidades

- Geração de boleto pela API do PagSeguro
- Callback ao atualizar algum status de pagamento
- Validação com um código de referência unico
- Envio de confirmação por e-mail do status do pedido
- Boleto em Lightbox em um modal

### Em desenvolvimento


### A fazer

- Tratamento de erros do PagSeguro
- Utilizar o cURL do ci4
- Finalização de campos do formulário
- Pagamento por cartão de crédito
- Aviso de vencimento de boleto a 1 dia do vencimento

### Estrutura:
| Tipo | Nome | Razão |
| ------ | ------ | ------ |
| Controller | Home.php | Listagem das transações |
| Controller | Notificação.php | Receber a requisição do PagSeguro |
| Controller | Pagar.php | Enviar as requisições ao PagSeguro |
| Controller | Transações.php | Comunicação o banco de dados |
| Helper | pagamento.php | Conversão de valores para o cliente |
| Model | Transações.php | Operações no banco de dados |


### Funcionamento:
Testes realizados em sandbox com geração de nome e CPF inválidos somentes para testes. 

#### Listagem de todas transações:

![listagem](https://user-images.githubusercontent.com/45601574/69562541-29d7c280-0f8e-11ea-871e-242c1d648e16.gif)

<br>

#### Página para gerar o boleto:

![criar_boleto](https://user-images.githubusercontent.com/45601574/69563332-ac14b680-0f8f-11ea-8229-5fbb0e26940f.gif)

### Utilização:
- A documentação pode ser acessar através do link [Documentação PagSeguro](https://dev.pagseguro.uol.com.br/docs "Documentação PagSeguro")
- Criar uma conta no [PagSeguro Sandbox](https://sandbox.pagseguro.uol.com.br/ "PagSeguro Sandbox")
- Alterar o email de teste disponibizado no PagSeguro `./Views/home` no campo `email`. Serviço de e-mail utilizado: [Mailtrap](https://mailtrap.io/ "Mailtrap") 
- Caso dê algum erro de instalação do CI4 com o PHP, siga estes passos [Instalação PHP](https://github.com/matheuscastroweb/ci4-crud/blob/master/README.md "Instalação PHP") 

Extensões necessárias do `php.ini`

```php
extension=mbstring
extension=mysqli
extension=curl
```

Alterar os parâmetros no `./env`: 

```php
#-----------------------------
# API PagSeguro
#-----------------------------
api.mode	= development
api.email	= seu_email
api.token	= seu_token
```
Ao alterar o `api.mode: ` para `production` acessará a URL de produção do PagSeguro.

Para o envio de e-mails basta alterar as para as respectivas.

```php
#--------------------------------------------------------------------
# Config Mail
#--------------------------------------------------------------------
mail.host   = host
mail.user   = user
mail.pass   = pass
mail.port   = port
```

Banco de dados utilizado:

```sql
CREATE OR REPLACE DATABASE ci4_integration_pagseguro;
```

```sql
CREATE OR REPLACE TABLE transacao (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_pedido INT NOT NULL,
    id_cliente INT NOT NULL, 
    codigo_transacao VARCHAR(255) NOT NULL,
    tipo_transacao TINYINT(1) NOT NULL,
    referencia_transacao VARCHAR(255) NOT NULL,
    status_transacao VARCHAR(45)  NOT NULL,
    valor_transacao DOUBLE  NOT NULL,
    url_boleto VARCHAR(255)  NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    deleted_at DATETIME DEFAULT NULL 
    );
```

