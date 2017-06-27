<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Msds extends Model
{
    protected $table = 'msds';

    protected $fillable = [
        'symbol_url', 'nama', 'content',
    ];

    public function savedmsds()
    {
        return $this->hasMany('App\MsdsPengguna');
    }
}
