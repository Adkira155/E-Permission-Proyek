<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSchool extends Model
{
    // sebenarnya nama file ini ingin diberi nama "Class.php" tapi Class.php di jaga oleh laravel
    use HasFactory;
    protected $table = 'class';
    protected $guarded = [
        'id_kelas',
        'created_at',
        'updated_at'
    ];

    public function major()
    {
        return $this->belongsTo(Major::class, 'jurusan', 'id');
    }

    public function waliKelas()
    {
        return $this->belongsTo(Teacher::class, 'wali_kelas', 'user_id');
    }
}
