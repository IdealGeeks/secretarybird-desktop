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
