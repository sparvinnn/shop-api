<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
        'giv_id',
        'name',
        'phones',
        'county',
        'city',
        'address',
        'postal_code',
        'fax'
    ];

    public function county(){
        return $this->belongsTo(County::class, 'county');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city');
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}
