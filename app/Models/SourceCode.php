<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class SourceCode extends Model
{
    use HasApiTokens, HasFactory;

    protected $table = 'source_codes';

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s'
    ];

    protected $guarded = ['id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function videos() {
        return $this->hasMany(Video::class);
    }

    public function supportingDocuments() {
        return $this->hasMany(SupportingDocument::class);
    }
}
