<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $primaryKey = 'service_id';

    protected $fillable = [
        'service_image',
        'service_name',
        'service_description',
        'service_price',
        'stock',
        'location',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'service_id', 'service_id');
    }
}
