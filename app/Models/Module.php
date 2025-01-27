<?php

namespace App\Models;

use App\Models\Site;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];

    public function websites(){
        return $this->belongsToMany(Site::class, 'site_has_modules');
    }
}
