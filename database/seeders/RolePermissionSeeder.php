<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        $admin = Role::create(['name' => 'admin']);
        $cs = Role::create(['name' => 'customer_service']);
        $customer = Role::create(['name' => 'customer']);

        // Admin Permissions
        $adminPermissions = [
            'view_dashboard',
            'manage_users',
            'manage_admin',
            'manage_cs',
            'manage_customers',
            'manage_restaurant',
            'manage_tables',
            'manage_categories',
            'manage_menus',
            'manage_reservations',
            'manage_orders',
            'view_reports',
            'export_pdf',
            'export_excel',
        ];

        foreach ($adminPermissions as $permission) {
            Permission::create(['name' => $permission]);
            $admin->givePermissionTo($permission);
        }

        // CS Permissions
        $csPermissions = [
            'view_cs_dashboard',
            'manage_reservations',
            'manage_check_in',
            'manage_orders',
            'manage_complaints',
            'view_notifications',
        ];

        foreach ($csPermissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
            $cs->givePermissionTo($permission);
        }

        // Customer Permissions
        $customerPermissions = [
            'view_customer_dashboard',
            'make_reservation',
            'manage_own_reservations',
            'order_menu',
            'manage_own_orders',
            'submit_review',
            'submit_complaint',
            'view_own_notifications',
        ];

        foreach ($customerPermissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
            $customer->givePermissionTo($permission);
        }
    }
}
