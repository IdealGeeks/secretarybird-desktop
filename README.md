# SecretaryBird - Webapp
API to feed all the nodes of the SecretaryBird ecosystem and responsive webapp1

## Requisitos minimos necessários

Para qualquer um dos ambientes, se faz necessários os seguintes itens:

* PHP 7.1 ou superior
* MySql 5.7 ou superior
* [Node.js](https://nodejs.org/en/)
* [NPM](https://www.npmjs.com/)
* [Gulp](https://gulpjs.com/)

### Clonar a aplicação 

```bash
git clone git@github.com:IdealGeeks/secretarybird-webapp.git
```

### Configurar o ambiente
Requirementos:
- Web Service (Apache, Nginx etc)

Após a instalação dos itens acima, será necessário adicionar ao arquivo hosts o seguinte linha: 
```
127.0.0.1   secretarybird.lh
```

Configure seu [Virtual Host](https://www.digitalocean.com/community/tutorials/how-to-set-up-apache-virtual-hosts-on-ubuntu-16-04#step-four-—-create-new-virtual-host-files) com o host secretarybird.lh
```xml
<VirtualHost *:80>
  ServerName secretarybird.lh
  ServerAlias secretarybird.lh
  DocumentRoot /var/www/secretarybird-webapp/public

  <Directory /var/www/secretarybird-webapp/public>
    AllowOverride All
    Order Allow,Deny
    Allow from All 
  </Directory>
  ErrorLog /var/log/apache2/secretarybird-error.log
  CustomLog /var/log/apache2/secretarybird-custom.log combined
</VirtualHost>
```

### Configuração do projeto

#### Instalação dos pacotes NPM:

```bash
npm install --prefix ./public
```

#### Instalação do Composer:

```bash
composer install
```

#### Configuração do banco de dados:

Criar uma cópia do arquivo `.env.example` para `.env` (caso não exista).
Abra o arquivo `.env` e informe os dados para acesso ao banco de dados.

```php
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

#### Configuração a aplicação:

No arquivo `.env` ajuste o campo `APP_URL=http://secretarybird.lh` e em seguida rode o comando:

```bash
php artisan key:generate
```

#### Criar e popular o banco de dados:

Crie um banco no seu MySQL com o nome que você colocou no `.env` e em seguida rode o comando:

```bash
php artisan migrate:fresh --seed
```

### Acessos do sistema

Usuário administrador padrão: `admin@admin.com.br` <br/>
Senha do administrador padrão: `102030`
