<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantSetting extends Model
{
    use HasFactory;

    protected $table = 'restaurant_settings';

    protected $fillable = [
        'restaurant_name',
        'logo',
        'address',
        'phone',
        'email',
        'opening_time',
        'closing_time',
        'description',
    ];
}
