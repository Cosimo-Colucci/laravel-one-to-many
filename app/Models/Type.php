<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function types(){
        // con hasMany sto automanìticamente dicendo di essere il modello indipendente e ha una relazione con il modello selezionato nel metodo, che dipende da questo modello.
        return $this->hasMany(Project::class);
    }
}
