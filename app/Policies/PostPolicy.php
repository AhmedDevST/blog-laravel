<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Allow users with 'Admin' or 'Editor' roles to create posts
        return $user->hasRole('Admin') || $user->hasRole('Editor');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        // Allow users with 'Admin' role or the post creator to update the post
        return $user->hasRole('Admin') || ($user->id === $post->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        // Check if the user has the 'Admin' role
        return $user->hasRole('Admin');
    }
    public function restore(User $user, Post $post): bool
    {
        // Allow only the post creator or 'Admin' to restore posts
        return $user->hasRole('Admin') || $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        // Allow only 'Admin' to permanently delete posts
        return $user->hasRole('Admin');
    }
}
