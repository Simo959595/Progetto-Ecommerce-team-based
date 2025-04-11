<?php

namespace App\Models;

use App\Models\Ad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name'];


   public function ads(): HasMany
    {
   return $this->hasMany(Ad::class);
    }

}
