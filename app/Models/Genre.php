<?php

namespace App\Models;

use App\Traits\ModelWithLogger;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property-read int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Genre extends Model
{
    use HasFactory, ModelWithLogger;

    protected $table = 'genres';

    protected $fillable = [
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
