<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $name
 */
class Author extends Model
{
    use HasFactory;

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
