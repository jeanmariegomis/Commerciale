<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BonLivraison extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id_bl';
    protected $dates = ['deleted_at'];
}
