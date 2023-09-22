<?php

namespace App\Models;

use App\Models\Traits\HasStaticLists;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\SlugTrait;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory, SlugTrait, HasStaticLists;
    protected $guarded = ['id'];

    public static function templatesList(string $columnKey = null, string $indexKey = null): array
    {
        $status = [
            [
                'key' => 'home',
                'name' => 'Головна',
                'color' => '#1111',
            ],
            [
                'key' => 'contacts',
                'name' => 'Контакти',
                'color' => '#234',
            ],
            [
                'key' => 'about',
                'name' => 'Про нас',
                'color' => '#324',
            ],
        ];

        return self::staticListBuild($status, $columnKey, $indexKey);
    }
}