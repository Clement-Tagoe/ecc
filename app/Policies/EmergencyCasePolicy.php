<?php

namespace App\Policies;

use App\Models\EmergencyCase;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EmergencyCasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, EmergencyCase $emergencyCase): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EmergencyCase $emergencyCase): bool
    {
        return $user->id === $emergencyCase->user_id || $user->hasRole(['Administrator', 'Director', 'Senior Supervisor']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EmergencyCase $emergencyCase): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EmergencyCase $emergencyCase): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, EmergencyCase $emergencyCase): bool
    {
        return false;
    }
}
