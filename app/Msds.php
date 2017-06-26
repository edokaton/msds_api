<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Msds extends Model
{
    protected $table = 'msds';

    protected $fillable = [
        'username', 'password',
    ];

    public function savedmsds()
    {
        return $this->hasMany('App\MsdsPengguna');
    }
}
