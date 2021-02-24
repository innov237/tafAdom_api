<?php

namespace App\Models;

use App\Models\categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class service extends Model
{
    use HasFactory;

    protected $appends = ['logo_icon' , 'logo_image'];
    protected $hidden = ['icon', 'image'];

    public function getLogoIconAttribute(){

    	if ("default.jpeg" == $this->icon)
    		return route('images.show', [  'default', 'user_avatar.jpg']);
    	else
    		return route('images.show', [ 'icons', $this->icon]);
    }

    public function getLogoImageAttribute(){

    	if ("default.jpeg" == $this->image)
    		return route('images.show', [  'default', 'user_avatar.jpg']);
    	else
    		return route('images.show', [ 'images', $this->image]);
    }

    public function categorie()
    {
        return $this->belongsTo(categorie::class);
    }
}
