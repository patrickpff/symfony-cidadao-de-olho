# 🕵️‍♂️ Cidadão de Olho — Versão Symfony

Projeto desenvolvido em Symfony 5 como uma releitura/reescrita de um sistema originalmente feito em Laravel.

O objetivo foi estudar e comparar as abordagens dos dois frameworks, mantendo as mesmas regras de negócio e lógica de domínio.

> 🔗 Projeto original no GitLab:
> https://gitlab.com/patrickpff/symfony-cidadao-de-olho

## 📌 Sobre o Projeto

O Cidadão de Olho é uma aplicação destinada a consultar, organizar e exibir informações relacionadas a parlamentares e suas despesas, permitindo análise e fiscalização simplificada por parte dos cidadãos.

A versão Symfony mantém:

- Estrutura por Entities, Repositories e Controllers
- Persistência com Doctrine ORM
- Migrações próprias
- Views usando Twig
- Configurações baseadas no padrão do Symfony Flex

🏗️ Tecnologias Utilizadas

O projeto foi desenvolvido com:
- PHP 7.2+
- Symfony 5.0
- Doctrine ORM
- Twig
- Symfony HttpClient

Veja todas as dependências no composer.json.

## 📂 Estrutura de Pastas
```.
symfony-cidadao-de-olho
│
├── bin/
├── config/
├── public/
│   ├── css/
│   ├── fontawesome/
│   └── index.php
│
├── src/
│   ├── Controller/
│   ├── Entity/
│   ├── Repository/
│   ├── Migrations/
│   └── Kernel.php
│
├── templates/
├── tests/
└── translations/
```
## 🚀 Como executar o projeto
### 1. Instale as dependências:
composer install

### 2. Configure o arquivo .env:
DATABASE_URL="mysql://user:password@127.0.0.1:3306/cidadaodeolho_symfony"

### 3. Execute as migrações:
php bin/console doctrine:migrations:migrate

### 4. Suba o servidor local:
symfony serve
#### ou:
php -S localhost:8000 -t public

## 📒 Objetivo da Reescrita em Symfony

Este projeto foi reescrito a partir de um original em Laravel com o intuito de:

- Comparar padrões de arquitetura dos frameworks
- Explorar o ecossistema Symfony (Flex, Bundles, CLI, MakerBundle)
- Aprimorar o conhecimento em Doctrine ORM
- Estudar diferenças entre Eloquent e Doctrine
- Validar padrões de reestruturação de código

## 📄 Licença

Este projeto está licenciado sob a **MIT License**.  
Consulte o arquivo LICENSE para mais informações.

## ✉️ Contato
Caso queira saber mais ou trocar ideias:

**Patrick Ferreira** <br>
Desenvolvedor PHP / Fullstack <br>
<a href="https://www.linkedin.com/in/parickpff/">LinkedIn</a>