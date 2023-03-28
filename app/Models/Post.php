<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Uwla\Ltags\Contracts\Taggable as TaggableContract;
use Uwla\Ltags\Traits\Taggable;

class Post extends Model implements TaggableContract
{
    use HasFactory, Taggable;
}
