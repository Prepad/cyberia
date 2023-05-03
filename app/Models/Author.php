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
    use HasFactory, ModelWithLogger;

    protected $table = 'authors';

    protected $fillable =[
        'name',
    ];

    protected $guarded = [
        'id',
    ];

    protected $casts =[
        'crated_at' => 'datetime:d.m.Y',
        'updated_at' => 'datetime:d.m.Y',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
