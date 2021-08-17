<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rover extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'rover';

    protected $fillable = ['x', 'y', 'face'];

    //protected $with = 'plateau';

    public function plateau(): BelongsTo
    {
        return $this->belongsTo(Plateau::class, 'plateau_id', 'id');
    }
}
