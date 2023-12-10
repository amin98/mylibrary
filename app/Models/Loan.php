<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'handed_in',
        'created_at'
    ];

//    public $timestamps = false;
//    public $incrementing = false;

    //Many to Many relationship with the BookCopy objects
    public function bookCopies(): BelongsToMany
    {
        return $this->belongsToMany(BookCopy::class, 'book_copy_loan')->withTimestamps();
    }

    //Belongs to relationship loansCart with a user object
    public function loansCart(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sessions');
    }

    //belongs to relationship with a user object
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Mutation to get the expired dat of a loan
    public function getExpiredAtAttribute()
    {
        return $this->created_at->addWeeks(6)->format('d-m-Y');
    }

    //Mutation in order to decide whether or not a loan has been expired
    public function getWeekBeforeAtAttribute()
    {
        $date = $this['created_at']->format('d-m-Y');

        $expiredDate = Carbon::parse($date)->addDay()->format('d-m-Y');

        return Carbon::parse($expiredDate)->subDay()->format('d-m-Y');
    }
}
