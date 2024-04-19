<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// show users

Artisan::command('show-users', function () {
    dd(User::all());
})->purpose('-- add admin');

// admin

Artisan::command('add-admin', function () {
    if (User::create([
        'name' => 'System Administrator',
        // 'role' => 'admin',
        'email' => 'systemadmin@gmail.com',
        'password' => Hash::make('adminadmin')
    ])) {
        $this->comment('Admin Added Successfully.');
    }
})->purpose('-- add admin');

// add-staff

Artisan::command('add-staff', function () {
    if (User::create([
        'name' => 'Staff',
        'role' => 'staff',
        'email' => 'staff@gmail.com',
        'password' => Hash::make('staffstaff')
    ])) {
        $this->comment('Staff Added Successfully.');
    }
})->purpose('-- add staff');

// update user name

Artisan::command('update-name', function () {
    if (User::where('id', 1)->update(['name' => 'System Admin Updated'])) {
        $this->comment('Name Updated Successfully.');
    }
})->purpose('-- update user name');

// update user email

Artisan::command('update-email', function () {
    if (User::where('id', 1)->update(['email' => 'systemadminupdated@gmail.com'])) {
        $this->comment('Email Updated Successfully.');
    }
})->purpose('-- update user email');

// update user password

Artisan::command('change-password', function () {

    $oldpass = User::where('id', 1)->value('password');
    $oldpassInput = 'systemadmin2';
    $newpassInput = 'systemadmin';

    if (Hash::check($oldpassInput, $oldpass)) {
        if (User::where('id', 1)->update(['password' => Hash::make($newpassInput)])) {
            $this->comment('Password Updated Successfully.');
        }
    } else {
        $this->comment("Incorrect Password");
    }
})->purpose('-- update user password');

// delete user

Artisan::command('delete-user', function () {
    if (User::where('id', 1)->delete()) {
        $this->comment('User Deleted Successfully.');
    }
})->purpose('-- delete user');
