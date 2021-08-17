<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plateau extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'plateau';

    protected $fillable = ['x', 'y'];

    //protected $with = ['rovers'];

    public function rovers(): HasMany
    {
        return $this->hasMany(Rover::class);
    }
}
