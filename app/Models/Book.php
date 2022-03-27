<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name, author'];

    protected $hidden = ['created_at', 'updated_at'];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    use HasFactory;
}
