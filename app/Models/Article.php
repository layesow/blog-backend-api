<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Categorie;
use App\Models\Commentaire;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'titre',
        'contenu',
        'user_id',
        'categorie_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tag');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

}
