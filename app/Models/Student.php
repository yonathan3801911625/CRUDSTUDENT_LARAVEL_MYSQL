<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Student extends Model
{
    use HasFactory;

    //Segun documentacion esta linea de codigo solo se utiliza cuando en BD se coloque un nombre diferente a id porque id funciona por defecto.
    protected $primaryKey= 'id_student';

    protected $appends = ['email_hashed'];

    protected function emailHashed(): Attribute
    {
        return Attribute::make(
            get: fn () => md5(strtolower(trim($this->email))),
        );
    }

    public function grades()
    {
        return $this->belongsToMany(Grade::class)->withPivot('grade_student', 'created_at','updated_at');
    }
}
