<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'telephone',
        'joined_date',
        'comments'
    ];

    public function routes(){
         return $this->belongsToMany(Route::class, 'representative_route' , 'representative_id', 'route_id')->active();
    }
}
