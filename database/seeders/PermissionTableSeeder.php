<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

$permissions = [

    'News',
    'news list',
    'Add News',
    'Search',
    'Edit News',
    'Delete News',
    'Tags',
    'List of tags',
    'Add Tags',
    'Edit Tags',
    'Delete Tags',
    'Category',
    'List of category',
    'Add Category',
    'Edit category',
    'Delete category',
    'Add permission',
    'Edit permission',
    'Delete permission',
    'Show permission',
    'Users',
    'Add User',
    'Edit User',
    'Delete User',
    'Users Roles',
    'Users List',
    'Settings',
    'saved records',
    'Publish&Unpublish'

];



foreach ($permissions as $permission) {

Permission::create(['name' => $permission]);
}

    }
}
