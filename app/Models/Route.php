<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status'
    ];

    public function scopeActive($query)
    {
       return $query->where('status', 1);
    }

    public function representative(){
        return $this->belongsToMany(Representative::class, 'representative_route' , 'route_id', 'representative_id');
   }
}
