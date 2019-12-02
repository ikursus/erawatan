<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // Maklumat connection database untuk table tblpengguna
    protected $connection = 'mysqldbrujukan';

    // Maklumat nama table yang model User ini perlu hubungi
    protected $table = 'payrollfamaofficer';

    // Relationship kepada table tblpengguna
    public function pengguna()
    {
        return $this->belongsTo(User::class, 'icno', 'penggunanokp');
    }
}
