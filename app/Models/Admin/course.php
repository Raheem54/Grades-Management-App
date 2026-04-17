<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'max_degree'
    ];
    public function students(){
        return $this->BelongsToMany(User::class)
        ->withPivot('grade')
        ->withTimestamps();
    }
}
