<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCopy extends Model
{
    use HasFactory;

    public $table = 'book_copies';

    protected $fillable = [
        'book_id',
        'available',
    ];

    //Belongs To relationship with the Book objects
    public function book()
    {
        return $this->BelongsTo(Book::class);
    }

    //Many to Many relationship with Loan objects.
    public function loans()
    {
        return $this->BelongsToMany(Loan::class, 'book_copy_loan')->withTimestamps();
    }


}
