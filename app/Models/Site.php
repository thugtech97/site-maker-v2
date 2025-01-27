<?php

namespace App\Models;

use App\Models\User;
use App\Models\Theme;
use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Site extends Model
{
    use HasFactory;

    protected $fillable = ['company', 'logo', 'contact_person', 'contact_number', 'email', 'website_name', 'project_type', 'url', 'theme_id', 'user_id', 'status', 'vacant_folder', 'port'];


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function modules(){
        return $this->belongsToMany(Module::class, 'site_has_modules');
    }

    public function theme(){
        return $this->belongsTo(Theme::class, 'theme_id');
    }

}
