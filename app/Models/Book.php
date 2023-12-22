<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Book extends Model
{
    use HasFactory, Searchable, Sluggable;


    protected $fillable = [
        'author_id',
        'genre_id',
        'title',
        'blurb',
        'image',
    ];

    //Sluggable method to make it possible for the title to be a slug
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    //Belongs To / One to Many relationship with Author objects
    public function author(): BelongsTo
    {
        return $this->BelongsTo(Author::class);
    }

    //Belongs To / One to Many relationship with Genre objects
    public function genre(): BelongsTo
    {
        return $this->BelongsTo(Genre::class);
    }

    //Return the path of an image by referencing the assets folder with the image name
    public function image()
    {
        return 'assets/' . $this->image;
//        return asset('storage/assets/images/' . $this->image);

    }
//    public function image()
//    {
//        return '/images/' . $this->image;
//    }


    //One To Many relationship with the BookCopy objects
    public function bookCopies(): HasMany
    {
        return $this->hasMany(BookCopy::class, 'book_id');
    }

    //Mutator to get the first available bookcopy
    public function firstAvailableBookCopyId()
    {
        //Add where clause for available
        return $this->bookCopies()->where('available', 1)->first()->id ?? false;
    }

    //Algolia method to make indexed for book objects in order to make them searchable
    public function searchableAs(): string
    {
        return 'books_index';
    }

    /*Algolia method that included the genre and author indexes together with book so that
        can look up a genre or author that is related to a book*/
//    public function toSearchableArray(): array
//    {
//        $array = $this->toArray();
//
//        $array['genre'] = $this->genre->title; //in the searchable array that has genre, it becomes the genre title
//        $array['author'] = $this->author->name; //in the searchable array that has genre, it becomes the author name
//
//        return $array;
//    }
}
