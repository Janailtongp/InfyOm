<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cidade
 * @package App\Models
 * @version April 6, 2020, 5:00 pm UTC
 *
 * @property string nome
 * @property string uf
 * @property integer n_habitantes
 */
class Cidade extends Model
{
    use SoftDeletes;

    public $table = 'cidades';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nome',
        'uf',
        'n_habitantes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'uf' => 'string',
        'n_habitantes' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required|string',
        'uf' => 'required|string|size:2',
        'n_habitantes' => 'required|numeric'
    ];

    
}
