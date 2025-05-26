# 📋 PHP CRUD Usuários - API com Laravel

Este projeto é uma API RESTful desenvolvida com **Laravel 10** e **PHP 8.1**, criada como parte dos meus estudos em backend com PHP. A API implementa um CRUD (Create, Read, Update, Delete) de usuários, com integração ao banco de dados MySQL.

---

## 🎯 Objetivo do Projeto

Criar uma API simples utilizando Laravel com operações básicas de manipulação de dados para consolidar os conhecimentos em:

- PHP moderno (8.1)
- Laravel (estrutura MVC, rotas, controllers, Eloquent ORM)
- Integração com banco de dados MySQL
- Testes de requisições RESTful usando Postman
- Organização de projetos backend para portfólio

---

## 🚀 Como Executar o Projeto

### ✅ Pré-requisitos

- PHP 8.1+
- Composer
- MySQL
- Laragon (ou outro ambiente local)
- PHPStorm (IDE recomendada)
- Postman (para testar a API)

### ⚙️ Passos para rodar localmente

```bash
# 1. Clone o repositório
git clone https://github.com/romariojhonatan/php-crud-usuarios.git
cd php-crud-usuarios

# 2. Instale as dependências com o Composer
composer install

# 3. Copie o arquivo de ambiente e configure com seus dados
cp .env.example .env

# Edite o .env e configure as variáveis de conexão com o banco:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=nome_do_banco
# DB_USERNAME=seu_usuario
# DB_PASSWORD=sua_senha

# 4. Gere a chave da aplicação
php artisan key:generate

# 5. Execute as migrations para criar as tabelas
php artisan migrate

# 6. Inicie o servidor local
php artisan serve

# A aplicação estará acessível em: http://127.0.0.1:8000
```

---

## 📡 Endpoints da API

| Método | Endpoint               | Ação                     |
|--------|------------------------|--------------------------|
| GET    | /usuarios              | Lista todos os usuários  |
| GET    | /usuarios/{id}         | Busca um usuário por ID  |
| POST   | /usuarios              | Cria um novo usuário     |
| PUT    | /usuarios/{id}         | Atualiza um usuário      |
| DELETE | /usuarios/{id}         | Remove um usuário        |

> ⚠️ Para requisições `POST`, `PUT` e `DELETE`, certifique-se de enviar os dados como **JSON** no corpo da requisição com o header `Content-Type: application/json`.

---

## 🛠️ Tecnologias Utilizadas

- [PHP 8.1](https://www.php.net/)
- [Laravel 10](https://laravel.com/)
- [MySQL](https://www.mysql.com/)
- [Composer](https://getcomposer.org/)
- [PHPStorm](https://www.jetbrains.com/phpstorm/)
- [Laragon](https://laragon.org/)
- [Postman](https://www.postman.com/)

---

## 👨‍💻 Autor

Desenvolvido por **Romário Jhonatan**  
[🔗 GitHub - romariojhonatan](https://github.com/romariojhonatan)

---

## 📌 Status do Projeto

✅ Projeto Finalizado – CRUD funcional com Laravel + MySQL  
🔜 Futuras melhorias: autenticação, validações, testes automatizados, interface web.
