<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'keterangan', 'harga', 'foto_sampul'];
    protected $primaryKey = 'id'; 
    public $incrementing = false;
    protected $keyType = 'string';

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
