<?php

namespace App\Policies;

use App\User,App\Book;
use Illuminate\Auth\Access\HandlesAuthorization;
use Session;

class BookPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the book.
     *
     * @param  App\User  $user
     * @param  App\Book  $book
     * @return mixed
     */
    public function view(User $user, Book $book)
    {
        //
    }

    /**
     * Determine whether the user can create books.
     *
     * @param  App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        if (Auth::guest()){
            Session::flash('message','Failed action,unauthorized user');
            return redirect('/library');
        }

        else
        {
            return true;
        } 
    }

    /**
     * Determine whether the user can update the book.
     *
     * @param  App\User  $user
     * @param  App\Book  $book
     * @return mixed
     */
    public function update(User $user,Book $book)
    {
        
        return $user->id === $book->user_id || $user->isAdmin;

    }

    /**
     * Determine whether the user can delete the book.
     *
     * @param  App\User  $user
     * @param  App\Book  $book
     * @return mixed
     */
    public function delete(User $user,Book $book)
    {
        //
        return $user->id === $book->user_id ||$user->isAdmin;
    }
}
