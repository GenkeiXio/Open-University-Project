<?php

namespace App\Services;

use App\Models\ActivityLog;

class ActivityLogger
{
    public static function log(string $action, string $module, string $details = null): void
    {
        if (session()->has('admin_id')) {
            $actorId = session('admin_id');
            $actorName = session('admin_name');
            $actorRole = session('admin_role');
        } elseif (session()->has('student_id')) {
            $actorId = session('student_id');
            $actorName = session('student_name');
            $actorRole = 'student';
        } else {
            $actorId = 0;
            $actorName = 'System';
            $actorRole = 'system';
        }

        ActivityLog::create([
            'actor_id' => $actorId,
            'actor_name' => $actorName,
            'actor_role' => $actorRole,
            'module' => $module,
            'action' => $action,
            'details' => $details,
            'ip_address' => request()->ip(),
        ]);
    }
}