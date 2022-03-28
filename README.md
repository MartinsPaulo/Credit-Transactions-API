
<p align="center">
    <h1>Como configurar a aplicação:</h1>
    <p>Depois de fazer o clone do repositório em sua maquina, pelo prompt vá até o local do projeto e execute:</p>
    <p><i>composer install --no-scripts</i></p>
    <p>Copie o arquivo env.example e renomei para .env:</p>
    <p><i>em linux o comando é cp .env.example .env , mas você pode fazer isto manualmente tanto no linux como no windows.<i></p>
     <p>- Dentro do arquivo .env, configure seu banco de dados. Vamos usar as migrações do laravel, por isto você pode ultilizar qualquer banco de dados a sua escolha e o sistema funcionara, basta definir as informações no arquivo .env:</p>
    <p><i>DB_CONNECTION=mysql  (tipo do banco de dados)</p>
    <p>DB_HOST=127.0.0.1        (url do banco de dados)</p>
    <p>DB_DATABASE=caju_base     (nome da base de dados)</p>
    <p> DB_USERNAME="exemplo"   (nome do usuario da base de dados)</p>
    <p>DB_PASSWORD="exemplo"    (senha do usuario da base de dados, caso não tiver deixe vazio)</i></p>
    <p>Eu deixei pronto comando para realizar as configurações principais, inclusive criar o banco de dados, ultilize:</p>
    <p><i>php artisan StartCajuApi</i></p>
    <p>Caso apareça a mensagem de sucesso esta tudo configurado, basta ultilizar o comando</p>
    <p><i>php artisan serve</i></p>
    <p>E testar a aplicação ultilizando o postman pelas urls</p>
    <p><i>http://127.0.0.1:8000\api\l1</i></p>
    <p><i>http://127.0.0.1:8000\api\l2</i></p>
    <p><i>http://127.0.0.1:8000\api\l3</i></p>
 </p>

