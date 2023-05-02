<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $name
 * @property string $type
 * @property int $author_id
 */
class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'type',
        'author_id',
    ];

    protected $guarded = [
        'id',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
