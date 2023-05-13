<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'loc_country';

    /**
     * Get the comments for the blog post.
     */
    public function states(): HasMany
    {
        return $this->hasMany(State::class, "country_id", "country_id");
    }
}
