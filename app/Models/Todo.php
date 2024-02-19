<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public $table = "todos";

    protected $fillable = [
        "name",
        "beschreibung",
        "datum",
        "uhrzeit"
    ];
}
