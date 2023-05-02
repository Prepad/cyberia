<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelWithLogger;

/**
 * @property-read int $id
 * @property string $name
 */
class Author extends Model
{
    use HasFactory;
    use ModelWithLogger;

    protected $table = 'authors';
    public $timestamps = false;

    protected $fillable =[
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
