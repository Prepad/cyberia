<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelWithLogger;

/**
 * @property-read int $id
 * @property string $name
 * @property string $type
 * @property int $author_id
 */
class Book extends Model
{
    use HasFactory, ModelWithLogger;

    protected $table = 'books';

    protected $fillable = [
        'name',
        'type',
        'author_id',
    ];

    protected $guarded = [
        'id',
    ];

    protected $casts =[
        'crated_at' => 'date',
        'updated_at' => 'date',
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
