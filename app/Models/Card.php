<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'names'         => 'array',
        'colors'        => 'array',
        'types'         => 'array',
        'supertypes'    => 'array',
        'subtypes'      => 'array',
        'rulings'       => 'array',
        'foreign_names' => 'array',
        'printings'     => 'array',
        'legalities'    => 'array'
    ];
}