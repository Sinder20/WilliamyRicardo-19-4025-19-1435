<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table='contact';

    protected $primaryKey="id_contact";

    public $timestamps=false;

    protected $fillable = ['nombre', 'email', 'telefono', 'asunto', 'mensaje'];

    protected $guarded = [

    ];

}
