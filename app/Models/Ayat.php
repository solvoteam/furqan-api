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

    public function translation($translation_id = 1)
    {
        return $this->hasOne(AyatTranslation::class)->where('translation_id', $translation_id);
    }
}
