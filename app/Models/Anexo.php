<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    use HasFactory;

    protected $table = 'anexo';

    protected $fillable = [
        'tarefa_id',
        'nome_arquivo',
        'caminho',
    ];

    public function tarefa()
    {
        return $this->belongsTo(Tarefa::class);
    }
}
