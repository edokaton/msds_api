<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportData extends Model
{
    protected $table = 'report_pengguna';

    protected $fillable = [
        'id_pengguna', 'content',
    ];

    public function pengguna()
    {
        return $this->belongsTo('App\Pengguna', 'id_pengguna');
    }

    public function msds()
    {
        return $this->belongsTo('App\Msds', 'msds_id');
    }
}
