<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Map old role values to new role_id
        $roles = DB::table('roles')->pluck('id', 'name')->all();
        $defaultRoleId = isset($roles['student']) ? $roles['student'] : (count($roles) ? array_values($roles)[0] : null);

        if (!$defaultRoleId) {
            throw new Exception('No valid roles found in roles table.');
        }

        $users = DB::table('users')->get();
        foreach ($users as $user) {
            $roleName = $user->role ?? 'student';
            $roleId = $roles[$roleName] ?? $defaultRoleId;
            DB::table('users')->where('id', $user->id)->update(['role_id' => $roleId]);
        }

        // Drop the old role column if it exists
        if (Schema::hasColumn('users', 'role')) {
            Schema::table('users', function ($table) {
                $table->dropColumn('role');
            });
        }
    }

    public function down(): void
    {
        // No rollback needed
    }
};
