<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $model_type
 * @property int $model_id
 * @property string $field
 * @property string $old
 * @property string $new
 */
class Log extends Model
{
    protected $fillable = [
        'field',
        'old',
        'new',
        'operation',
    ];
    use HasFactory;
}
