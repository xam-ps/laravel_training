<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['firstname, lastname'];

    protected $hidden = ['created_at', 'updated_at'];

    use HasFactory;

    public function getFullNameAttribute() {
        return $this->firstname.' '.$this->lastname;
    }

    public function books() {
        return $this->hasMany(Book::class);
    }
}
