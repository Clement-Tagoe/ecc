<?php

namespace App\Policies;

use App\Models\CameraAudit;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CameraAuditPolicy
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
    public function view(User $user, CameraAudit $cameraAudit): bool
    {
        return $user->id === $cameraAudit->user_id || $user->hasRole(['Administrator', 'Director', 'Senior Supervisor']);
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
    public function update(User $user, CameraAudit $cameraAudit): bool
    {
        return $user->id === $cameraAudit->user_id || $user->hasRole(['Administrator', 'Director']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CameraAudit $cameraAudit): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CameraAudit $cameraAudit): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CameraAudit $cameraAudit): bool
    {
        return false;
    }
}
