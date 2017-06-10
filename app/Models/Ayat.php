<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ayat extends Model
{
    public $timestamps = false;

    public function translations()
    {
        return $this->hasMany(AyatTranslation::class);
    }

    public function translation($translation_id)
    {
        return $this->translations()->whereId($translation_id)->firstOrFail();
    }
}
