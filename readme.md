## Sobre
Sistema de Enquetes desenvolvido em PHP (Laravel 5.8) + Vue.

## Requisitos
- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension
- fileinfo PHP Extension
- Node
- Composer
- SGBD Mysql

## Instalação do Banco de dados (Mysql)
Este tutorial explica como instalar o MySQL em um servidor Ubuntu.
A instalação é simples: 
- Atualize seu índice de pacotes
```
sudo apt update
```
- Instale o pacote mysql-server
```
sudo apt install mysql-server
```
- Execute o script de segurança que vem incluído.
```
mysql_secure_installation
```
A partir daí, você pode pressionar Y e então ENTER para aceitar as respostas padrão para todas as questões subsequentes. Isso irá remover alguns usuários anônimos e o banco de dados de teste, desativar login remoto para o root, e carregar todas essas novas regras para que o MySQL respeite imediatamente as alterações que você fez.

## Instalação do Projeto
- Clone o projeto
- Instale
```
composer install
npm install
```
- Copie o arquivo .env.example e renomeie para .env
- Configure a conexão com o banco no arquivo .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```
- Gere uma chave para o projeto
```
php artisan key:generate
```
- Execute as migrations
```
php artisan migrate
```

## Executando localmente
Execute o comando
```
php artisan serve
```
Acesse a url exibida no terminal: http://127.0.0.1:8000

