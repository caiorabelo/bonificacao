# PROJETO - SISTEMA DE BONIFICAÇÃO

<a id="sobre"></a>
## Sobre

Projeto para Gerenciamente de Bonificações dos Funcionários.

-------------------------------------------------

Tabela de conteúdos
=================
   * [Sobre](#sobre)
   * [Requisitos](#requisitos)
   * [Instalação](#instalacao)
   * [Como usar](#como-usar)
   * [Ocorrências de Erro](#ocorrencias)
   * [Tecnologias](#tecnologias)
   * [Autor](#autor)

-------------------------------------------------

<a id="requisitos"></a>
## Requisitos

* Primeiramente verifique se você possui os seguintes requisitos:
    * PHP 7.2.5+
    * Composer
    * Laravel
    * Mysql
    

-------------------------------------------------

<a id="instalacao"></a>
## 🛠 Instalação 

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:
[Php](https://www.php.net/downloads), [Composer](https://getcomposer.org/), [Laravel](https://laravel.com/), [Xampp](https://www.apachefriends.org/pt_br/index.html). 

* Faça Download do Projeto ou clone usando comando
    ```bash
    git clone <https://github.com/caiorabelo/bonificacao.git>
    ```

* Abra o Xampp e inicie o MYSQL

* Crie um banco de dados com o nome "bonificacao", caso queira personalizar informe-o também no arquivo .env 
(obs: crie esse arquivo .env caso não possua e cole tudo que esta dentro do arquivo .env-example)

* Pelo terminal vá até a raiz do projeto e execute:
    ```bash
    composer update
    ```

* Feito isso! Rode o seguinte comando:
    ```bash
    php artisan migrate --seed
    ```

-------------------------------------------------

<a id="como-usar"></a>
## 🎲 Como Usar

Para utilizar você vai precisar seguir os seguintes passos:
* Na pasta do projeto execute o seguinte comando em seu terminal:
    ```bash
    php artisan serve
    ```
Para fazer login utilize os seguintes dados pré-configurados:
* Login: admin
* Senha: 12345678

-------------------------------------------------

<a id="tecnologias"></a>
## 🛠 Tecnologias

As seguintes ferramentas foram utilizadas na construção do projeto

- [Composer v1.10.10](https://getcomposer.org/)
- [Laravel 8](https://laravel.com/)
- [AdminLte3](https://github.com/jeroennoten/Laravel-AdminLTE)
- [DomPDF](https://github.com/barryvdh/laravel-dompdf)

-------------------------------------------------

<a id="autor"></a>
## Autor

<div style="display:flex; justify-content:center; align-items:center">

<div style="width: 30%; display: inline-block">
 <a href="https://github.com/caiorabelo">
 <img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/caiorabelo" width="100px;" alt=""/><br>
 <b>Caio Rabelo Pereira</b>
 </a>
 </div>

 </div>
