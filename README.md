
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

```json
{
	"account": "123",
	"totalAmount": 40000.00,
	"mcc": "5811",
	"merchant": "PADARIA DO ZE               SAO PAULO BR"
}
```

```json
{
	"account": "123",
	"totalAmount": 100.00,
	"mcc": "9999",
	"merchant": "PADARIA DO ZE               SAO PAULO BR"
}
```
```json
{
	"account": "99999",
	"totalAmount": 100.00,
	"mcc": "5811",
	"merchant": "PADARIA DO ZE               SAO PAULO BR"
}
```
<p><h1>Testes L2</h1></p>
--Não tem valor no cartão, feito no cash

```json
{
	"account": "167",
	"totalAmount": 260.00,
	"mcc": "5411",
	"merchant": "PADARIA DO ZE               SAO PAULO BR"
}
```

--mcc inesxistente feito no cash

```json
{
	"account": "567",
	"totalAmount": 100.00,
	"mcc": "9999",
	"merchant": "PADARIA DO ZE               SAO PAULO BR"
}
```
--Apenas outro teste invalido comum

```json
{
	"account": "99999",
	"totalAmount": 100.00,
	"mcc": "5811",
	"merchant": "PADARIA DO ZE               SAO PAULO BR"
}
```
<p><h1>L3 - Duvida Teorica</h1></p>
Eu fiquei com uma dúvida teórica bem grande na L3. Então resolvi responder teoricamente o que faria, caso desejem que implemente, também posso fazer. 

Se entendi corretamente o problema, eu apresentaria 3 possíveis soluções para discussão:

Primeira: Ter uma tabela com todos estabelecimentos que nós conhecemos mapeada sua real categoria na base de dados, e seguir por esta tabela.
Vantagem: Teoricamente rápido dependendo do nível da escalabilidade. 
Desvantagem: Provavelmente não temos mapeado todos estabelecimentos do Brasil.

Segunda: Esta opção, não consigo prever a eficácia por desconhecer a operação na prática, entretanto seria fazer uma tabela de mapeamento com palavras chaves. Se no nome do estabelecimento contiver as palavras Restaurante, lanchonete, bar ou similares, parece claro se tratar do grupo MEAL, se possui nome como spotify, hbo, cinema ou similares, também podemos encaixar em CULTURE… 
<table border="1">
    <tr>
        Tabela relacional
    </tr>
    <tr>
        <td>Cinema</td>
        <td>CULTURE</td>
    </tr>
    <tr>
        <td>HBO</td>
        <td>CULTURE</td>
    </tr>
    <tr>
        <td>Restaurante</td>
        <td>MEAL</td>
    </tr>
    <tr>
        <td>Bar</td>
        <td>MEAL</td>
    </tr>
</table>
Quando recebermos um nome de estabelicimento podemos quebrar a string do nome em diversos totens e fazer esta pesquisa em nossa tabela de mapeamento no banco de dados.
Exemplo "Bar da Rosa", contem a palavra Bar, então retornaria MEAL.
P.S: Para comparação ser precisa salvamos todos casos como maiúsculo ou minúsculo, e poderíamos verificar necessidade de acentuações.

Terceira: Com base nas categorias que sabemos serem corretas (Provavelmente já existe algo assim salvo no banco de dados da empresa), aplicar um algoritmo preditivo, exemplo de Bayes, para que ele receba um nome desconhecido, e encaixe corretamente na sua categoria de benefício.
Pode ser complementar com os outros métodos, ou dependendo de sua acurácia trabalhar sozinho.
Desvantagem: Só fazendo testes para entender se o tempo de resposta e a acurácia seriam boas o suficiente para ser utilizado na produção, e o resultado pode ser negativo. 

<p><h1>L4 - Resposta</h1></p>
Implataria a estrutura de dados <a href="https://www.cos.ufrj.br/~rfarias/cos121/filas.html" target="blank">FILA</a> para operação. 
Sempre que uma solicitação de compra for iniciada, ela entra em uma fila de processamento. Esta fila poderia ser uma tabela no banco de dados. 
Então o própio servidor executaria a fila constantemente, respeitando a ordem de o primeiro a chegar é o primeiro a ser atendido. 
Pensei em implementar no laravel usando os JOBS, mas seria mais trabalho configurar a suas maquinas do que a implementação, e como não trabalhamos com Laravel, pensei que talvez seria um pouco desnecessário, visto que a ideia é simples (embora a implementação nem tanto).
