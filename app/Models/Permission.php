<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permission';
    protected $guarded = [
        'id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_siswa', 'id');
    }
}
