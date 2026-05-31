<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'file_path', 'alt_text', 'caption', 'is_public'])]
class Media extends Model
{
    protected function casts(): array
    {
        return [
            'is_public' => 'boolean',
        ];
    }
}
