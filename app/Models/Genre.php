<?php

namespace App\Models;

use App\Traits\ModelWithLogger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property-read int $id
 * @property string $name
 */
class Genre extends Model
{
    use HasFactory;
    use ModelWithLogger;

    protected $table = 'genres';
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    protected $guarded = [
        'id',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
