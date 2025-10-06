<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Partner extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'partners';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'bank_account_number',
        'address',
        'skills',
        'status',
    ];
}
