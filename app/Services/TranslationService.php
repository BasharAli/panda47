<?php

namespace App\Services;


use App\Models\Translation;
use Illuminate\Support\Facades\Cache;

class TranslationService
{
    public function getTranslations($locale)
    {
        $translations = Translation::where('locale', $locale)->get();
        $data = [];

        foreach ($translations as $translation) {
            $data[$translation->key] = $translation->value;
        }

        return $data;
    }
}
