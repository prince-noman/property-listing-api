<?php

namespace App\Models;

use App\Models\PropertyCharacteristic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'broker_id', 
        'address', 
        'listing_type', 
        'city', 
        'zip_code', 
        'description', 
        'build_year'
    ];

    public function characteristic(){
        return $this->hasOne(PropertyCharacteristic::class);
    }
}