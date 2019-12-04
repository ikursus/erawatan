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

    // Relation kepada tblertuntutanstatus
    public function status()
    {
        return $this->hasMany(TuntutanStatus::class, 'ertuntutan_id');
    }

    // Relation kepada tblertuntutanstatus
    public function statusAkhir()
    {
        return $this->hasOne(TuntutanStatus::class, 'ertuntutan_id')
        ->orderBy('id', 'desc');
    }

    // Relation kepada tblrefentiti
    public function entiti()
    {
        return $this->belongsTo(Entiti::class, 'entiti_id', 'id');
    }

    // Relation kepada tblrefentiti
    public function individu()
    {
        return $this->belongsTo(Individu::class, 'individu_id', 'id');
    }

    // Relation kepada tblerdokumen
    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'ertuntutan_id');
    }
    
}
