<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tuntutan extends Model
{
    // Maklumat connection database MySQL
    protected $connection = 'mysqldbrawatan';
    
    // Maklumat nama table
    protected $table = 'tblertuntutan';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employeeno',
        'ertuntutantarikhrawat',
        'individu_id',
        'entiti_id',
        'ertuntutannoresit',
        'ertuntutanamaun',
        'idpenggunamasuk',
        'tkhmasamasuk',
        'idpenggunakmskini'
    ];
    
}
