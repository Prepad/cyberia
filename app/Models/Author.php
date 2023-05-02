<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'books';
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
