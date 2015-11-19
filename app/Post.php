<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'titulo',
    	'conteudo'
    ];

    public function comentarios() {
    	return $this->hasMany('App\Comentarios');
    }

    public function tags() {
    	return $this->belongsToMany('App\Tag', 'posts_tags');
    }

    public function getTagListAttribute() {
        $tags = $this->tags()->lists('name')->all();
        return implode(", ", $tags);
    }
}
