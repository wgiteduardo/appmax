<p align="center"><img src="https://i.imgur.com/Wr5c1Lj.png"></p>

<p align="center">
    Laravel:<br>
    <a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sobre o projeto

O projeto consiste em sistema capaz de gerir produtos e estoques, foi construido utilizando o framework laravel como solicitado pelo teste. Nele você pode: adicionar produtos, editar, remover. Adicionar quantidades ao estoque, remover e visualizar os relatórios diários! Ferramentas utilizadas:

- [Laravel Framework v7.13.0](https://laravel.com/).
- [PHP v7.4.6](https://www.php.net/).
- [Composer v1.10.6](https://getcomposer.org/).
- [MariaDB v10.4.11](https://mariadb.org/).
- [Node v12.17.0](https://nodejs.org/en/).

## Como instalar

Baixe o projeto utilizando git `git clone https://github.com/wgiteduardo/appmax.git` e em seguinda rode o composer dentro do diretório do projeto com `composer update`. Após este processo, baixe as dependências do node.js utilizando o comando `npm install`.

## Configurando o projeto

Para configurar o projeto, faça uma cópia do arquivo `.env.example` renomeando para `.env` e insira as informações do seu banco de dados, como por exemplo: **DB_DATABASE, DB_USERNAME e DB_PASSWORD**.

Após configurar o seu banco de dados e tudo estiver ok, você deverá rodar as migrations e seeders do projeto. Para fazer isso utilize o comando `php artisan migrate --seed` dentro do diretório do projeto.

E então é só rodar o projeto utilizando `php artisan serve` ou acessar com Apache!

## Informações de Acesso

Para ter acesso a plataforma, você deverá realizar login na mesma. Para fazer isso utilize os dados que foram criados automaticamente pela seeder:

> Email: admin@appmax.com.br  
> Senha: appmax

## API

Você pode desfrutar da API do projeto enviando requisições para as urls abaixo:

> /stock/add/{product}  
> /stock/remove/{product}

Lembrando que **product** deve ser o código SKU do produto. ***IMPORTANTE!*** Você deve enviar através do parametro `stock` na requisição a quantidade de produtos que deseja adicionar ou remover do estoque.

## Agradecimentos

Agradeço a oportunidade cedida pela AppMax de participar desse teste e a equipe do Laravel pelo framework incrível!
