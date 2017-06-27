<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportData extends Model
{
    protected $table = 'report_pengguna';

    protected $fillable = [
        'id_pengguna', 'content',
    ];

    public function foreignKeyPengguna()
    {
        return $this->belongsTo('App\Pengguna', 'id_pengguna');
    }
}
