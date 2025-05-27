<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $table = 'tarefa';

    protected $fillable = [
        'usuario_id',
        'titulo',
        'descricao',
        'concluida',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function anexos()
    {
        return $this->hasMany(Anexo::class);
    }
}

