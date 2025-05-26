<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{

    // Lista todos os posts do banco
    public function index(): JsonResponse {
        $posts = Post::all(); // SELECT * FROM posts
        return response()->json($posts);
    }

    // Cria um novo posts
    public function store(Request $request): JsonResponse {
        $post = Post::create($request->only(['title', 'conteudo', 'autor']));
        return response()->json($post, 201); // HTTP 201 Created
    }

    // Busca um posts por id
    public function show($id): JsonResponse {
        $posts = Post::find($id);
        if (!$posts) {
            return response()->json(['mensagem' => 'Post não encontrado'], 404);
        }
        return response()->json($posts);
    }

    public function update(Request $request, $id): JsonResponse {
        $posts = Post::find($id);
        if (!$posts) {
            return response()->json(['mensagem' => 'Post inexistente'], 404);
        }
        $posts->update($request->only(['title', 'conteudo', 'autor']));
        return response()->json($posts);
    }

    public function destroy($id): JsonResponse {
        $posts = Post::findOrFail($id);
        if (!$posts) {
            return response()->json(['mensagem' => 'Post inexistente'], 404);
        }
        $posts->delete();
        return response()->json(['mensagem' => 'Post deletado com sucesso']);
    }
}
