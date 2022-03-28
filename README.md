
<p align="center">
    <b><h1>Como configurar a aplicação:</h1></b>
    <b><p>Depois de fazer o clone do repositório em sua maquina, pelo prompt vá até o local do projeto e execute:</p></b>
    <p><i>composer install --no-scripts</i></p>
    <b><p>Copie o arquivo env.example e renomei para .env:</p></b>
    <p><i>em linux o comando é cp .env.example .env , mas você pode fazer isto manualmente tanto no linux como no windows.<i></p>
    <b><p>Dentro do arquivo .env, configure seu banco de dados. Vamos usar as migrações do laravel, por isto você pode ultilizar qualquer banco de dados a sua escolha e o sistema funcionara, basta definir as informações no arquivo .env:</p></b>
    <p><i>DB_CONNECTION=mysql  (tipo do banco de dados)</p>
    <p>DB_HOST=127.0.0.1        (url do banco de dados)</p>
    <p>DB_DATABASE=caju_base     (nome da base de dados)</p>
    <p> DB_USERNAME="exemplo"   (nome do usuario da base de dados)</p>
    <p>DB_PASSWORD="exemplo"    (senha do usuario da base de dados, caso não tiver deixe vazio)</i></p>
    <b><p>Eu deixei pronto comando para realizar as configurações principais, inclusive criar o banco de dados, ultilize:</p></b>
    <p><i>php artisan StartCajuApi</i></p>
    <b><p>Caso apareça a mensagem de sucesso esta tudo configurado, basta ultilizar o comando</p></b>
    <p><i>php artisan serve</i></p>
    <b><p>E testar a aplicação ultilizando o postman pelas urls</p></b>
    <p><i>http://127.0.0.1:8000\api\l1</i></p>
    <p><i>http://127.0.0.1:8000\api\l2</i></p>
    <p><i>http://127.0.0.1:8000\api\l3</i></p>
 </p>

<p><h1>Testes L1</h1></p>
```yaml
{
	"account": "123",
	"totalAmount": 40000.00,
	"mcc": "5811",
	"merchant": "PADARIA DO ZE               SAO PAULO BR"
}
```
```yaml
{
	"account": "123",
	"totalAmount": 100.00,
	"mcc": "9999",
	"merchant": "PADARIA DO ZE               SAO PAULO BR"
}
```
```yaml
{
	"account": "99999",
	"totalAmount": 100.00,
	"mcc": "5811",
	"merchant": "PADARIA DO ZE               SAO PAULO BR"
}
```
<p><h1>Testes L2</h1></p>
--Não tem valor no cartão, feito no cash
```yaml
{
	"account": "167",
	"totalAmount": 260.00,
	"mcc": "5411",
	"merchant": "PADARIA DO ZE               SAO PAULO BR"
}
```
--mcc inesxistente feito no cash
```yaml
{
	"account": "567",
	"totalAmount": 100.00,
	"mcc": "9999",
	"merchant": "PADARIA DO ZE               SAO PAULO BR"
}
```
```yaml
{
	"account": "99999",
	"totalAmount": 100.00,
	"mcc": "5811",
	"merchant": "PADARIA DO ZE               SAO PAULO BR"
}
```
