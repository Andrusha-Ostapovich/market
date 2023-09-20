<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\SlugTrait;
class StaticPage extends Model
{
    use HasFactory,SlugTrait;
    protected $guarded = ['id'];
}
