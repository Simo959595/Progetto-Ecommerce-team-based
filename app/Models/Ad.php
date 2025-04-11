<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ad extends Model
{
    use Searchable;

    public function toSearchableArray()
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'category'=>$this->category,
        ];
    }

    protected $fillable = ['title','price','description','status','color','user_id', 'category_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisedCount()
    {
        return Ad::where('is_accepted', null)->count();
    }

    public function images(): HasMany{
        return $this->hasMany(Image::class);
    }

    public function wishlistedByUsers()
    {
        return $this->belongsToMany(User::class, 'wishlist')->withTimestamps();
    }
}
