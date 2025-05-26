# 📝 Todolist API - CRUD de Usuários com Laravel

Este é um projeto de estudo desenvolvido com **Laravel 10** e **PHP 8.1**, que implementa uma API RESTful simples para gerenciamento de usuários. Ele faz parte do meu portfólio de aprendizado backend com PHP.

## 🚀 Tecnologias Utilizadas

- 💻 [PHP 8.1](https://www.php.net/)
- ⚙️ [Laravel Framework 10.10](https://laravel.com/)
- 🛢️ [MySQL](https://www.mysql.com/)
- 🧪 [Postman](https://www.postman.com/) — Para testar as rotas
- 🧰 [Laragon](https://laragon.org/) — Ambiente de desenvolvimento local
- 🧠 [PHPStorm](https://www.jetbrains.com/phpstorm/) — IDE usada no desenvolvimento

## 📌 Funcionalidades

- Criar usuários
- Listar todos os usuários
- Buscar usuário por ID
- Atualizar usuário
- Deletar usuário

## 📁 Estrutura das Rotas

| Método | Rota                | Ação                 |
|--------|---------------------|----------------------|
| GET    | `/usuarios`         | Lista todos os usuários |
| GET    | `/usuarios/{id}`    | Busca um usuário por ID |
| POST   | `/usuarios`         | Cria um novo usuário |
| PUT    | `/usuarios/{id}`    | Atualiza um usuário existente |
| DELETE | `/usuarios/{id}`    | Remove um usuário |

## 📥 Requisições no Postman

- Para **POST** e **PUT**, envie o corpo da requisição em **JSON**:
```json
{
  "nome": "Romário",
  "email": "romario@email.com"
}
