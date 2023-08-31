<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'data',
        'slug',
        'project_start',
    ];

    public function type(){
        // con hasMany sto automanìticamente dicendo di essere il modello indipendente e ha una relazione con il modello selezionato nel metodo, che dipende da questo modello.
        return $this->belongsTo(Type::class);
    }
}
