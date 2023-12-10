<?php

use App\Http\Controllers\AlphabetSearchController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookAuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookCopyController;
use App\Http\Controllers\BookGenreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanCartController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]); //Authentication routes, only verified users are able to get the Auth middleware

Route::middleware(['auth', 'verified'])
    ->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home'); //Route for the homepage
    Route::post('search', SearchController::class)->name('search'); // Route for the search enginge

    Route::get('alphabetsearch/{letter}', AlphabetSearchController::class)->name('alphabetsearch'); // Alphabetsearch route

    Route::get('notify/{id}', [LoanController::class, 'store'])->name('notify'); //Notification route

    //Dashboard routes
    Route::get('dashboard/{slug}', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard/edit/{slug}', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::post('dashboard/update/{user}', [DashboardController::class, 'update'])->name('dashboard.update');

    //Routes to showcase all the existing objects in a view named index
    Route::get('books', [BookController::class, 'index'])->name('books.index');
    Route::get('genres', [GenreController::class, 'index'])->name('genres.index');
    Route::get('authors', [AuthorController::class, 'index'])->name('authors.index');

    //Routes to showcase elements of a book
    Route::get('book/{slug}', [BookController::class, 'show'])->name('book.show');
    Route::get('books/genre/{slug}', [BookGenreController::class, 'index'])->name('book.genre');
    Route::get('books/author/{slug}', [BookAuthorController::class, 'index'])->name('book.author');

        Route::group([
            'prefix' => 'wishlist',
            'as' => 'wishlist',
        ], function () {
            Route::get('index', [WishlistController::class, 'index'])->name('.index');
            Route::post('store/{id}/{slug}', [WishlistController::class, 'store'])->name('.store');
            Route::get('destroy/{id}', [WishlistController::class, 'destroy'])->name('.destroy');
        });

        Route::group([
            'prefix' => 'loans',
            'as' => 'loans',
        ], function () {
            Route::get('cart', [LoanCartController::class, 'index'])->name('.cart');
            Route::post('store/{id}', [LoanController::class, 'store'])->name('.store');
            Route::get('show/{id}', [LoanController::class, 'show'])->name('.show');

            Route::post('cart/store/{id}/{slug}', [LoanCartController::class, 'store'])->name('.cart.store');
            Route::get('cart/destroy/{id}', [LoanCartController::class, 'destroy'])->name('.cart.destroy');
        });

        //Route that has been grouped with an added middleware for admins
        Route::group([
            'middleware' => 'admin',
            'prefix' => 'admin',
            'as' => 'admin',
        ], function () {

            Route::group([
                'prefix' => 'book',
                'as' => '.book',
            ], function () {
                Route::get('create', [BookController::class, 'create'])->name('.create');
                Route::get('edit/{book:id}', [BookController::class, 'edit'])->name('.edit');
                Route::post('store', [BookController::class, 'store'])->name('.store');
                Route::post('update/{id}', [BookController::class, 'update'])->name('.update');
                Route::get('destroy/{book:id}', [BookController::class, 'destroy'])->name('.destroy');
            });

            Route::group([
                'prefix' => 'author',
                'as' => '.author',
            ], function () {
                Route::get('create', [AuthorController::class, 'create'])->name('.create');
                Route::get('edit/{id}', [AuthorController::class, 'edit'])->name('.edit');
                Route::post('store', [AuthorController::class, 'store'])->name('.store');
                Route::post('update/{id}', [AuthorController::class, 'update'])->name('.update');
                Route::get('destroy/{author:id}', [AuthorController::class, 'destroy'])->name('.destroy');
            });

            Route::group([
                'prefix' => 'genre',
                'as' => '.genre',
            ], function () {
                Route::get('create', [GenreController::class, 'create'])->name('.create');
                Route::get('edit/{id}', [GenreController::class, 'edit'])->name('.edit');
                Route::post('store', [GenreController::class, 'store'])->name('.store');
                Route::post('update/{id}', [GenreController::class, 'update'])->name('.update');
                Route::get('destroy/{id}', [GenreController::class, 'destroy'])->name('.destroy');
            });

            Route::group([
                'prefix' => 'book_copies',
                'as' => '.book_copies'
            ], function () {
                Route::get('/', [BookCopyController::class, 'index'])->name('.index');
                Route::get('store/{id}', [BookCopyController::class, 'store'])->name('.store');
                Route::get('destroy/{id}', [BookCopyController::class, 'destroy'])->name('.destroy');
            });

            Route::group([
                'prefix' => 'loans',
                'as' => '.loans'
            ], function () {
                Route::get('', [\App\Http\Controllers\Admin\LoanController::class, 'index'])->name('.index');
                Route::get('store/{id}', [BookCopyController::class, 'store'])->name('.store');
                Route::get('update/{loan:id}', [\App\Http\Controllers\Admin\LoanController::class, 'update'])->name('.update');
                Route::get('destroy/{id}', [BookCopyController::class, 'destroy'])->name('.destroy');
            });
        });
});

