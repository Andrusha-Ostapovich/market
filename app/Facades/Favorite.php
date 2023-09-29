<?php

namespace App\Facades;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Favorite
{
    public function toggle(Model $model)
    {

        $user = Auth::user();
        $modelType = strtolower(class_basename($model));

        $isFavorite = $user->favorites()->where([
            'model_id' => $model->id,

        ])->exists();

        if ($isFavorite) {
            $user->favorites()->where([
                'model_id' => $model->id,
            ])->delete();
        } else {
            $user->favorites()->create([
                'model_id' => $model->id,
                'model_type' => $modelType,
            ]);
        }

        return !$isFavorite;
    }

    public function isFavorite(Model $model)
    {
        $modelType = strtolower(class_basename($model));
        $user = Auth::user();

        return $user->favorites()->where([
            'model_id' => $model->id,
            'model_type' => $modelType,
        ])->exists();
    }
}
