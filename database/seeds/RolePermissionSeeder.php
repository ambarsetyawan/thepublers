<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
use App\Permission;


class RolePermissionSeeder extends Seeder
{

    public function run()
    {

        DB::table('permission_role')->truncate();
        DB::table('role_user')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();


        $editor = new Role();
        $editor->name = 'editor';
        $editor->display_name = 'Редактор'; // optional
        $editor->save();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'Начальник печатного цеха'; // optional
        $admin->save();

        $user = User::where('user_email', 'mailgrodno@gmail.com')->first();
        $user->attachRole($admin);


        $create_book = new Permission();
        $create_book->name = 'create_book';
        $create_book->save();

        $edit_book = new Permission();
        $edit_book->name = 'edit_book';
        $edit_book->save();

        $edit_comment = new Permission();
        $edit_comment->name = 'edit_comment';
        $edit_comment->save();

        $edit_user = new Permission();
        $edit_user->name = 'edit_user';
        $edit_user->save();

        $admin->attachPermissions(array($create_book, $edit_user, $edit_book, $edit_comment));
        $editor->attachPermissions(array($create_book));
    }
}
