<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Item
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $name
 * @property string|null $description
 * @property int $price
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Item onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Item whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Item withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Item withoutTrashed()
 * @mixin \Eloquent
 */
class Item extends Model
{
    use SoftDeletes;

    /**
     * Model MySQL table name
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price'
    ];
}
