<?php

namespace Modules\User\Repositories;

use App\Models\CompanyUser;
use App\Models\User;
use App\Traits\CompanySession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Modules\Upload\Entities\Upload;
use Modules\User\Interfaces\EmployeeInterface;
use Modules\User\Notifications\Employees\AccountCreatedNotification;

class EmployeeRepository implements EmployeeInterface{

    use CompanySession;

    public function getAllEmployees($model){

        return $model->newQuery()
            ->with(['roles' => function ($query) {
                $query->select('name')->get();
            }])
            ->where('company_id', Auth::user()->currentCompany->id)
            ->where('id', '!=', auth()->id());
    }

    public function createEmployee($request){

        $user = User::create([
            'name'     => $request['name'],
            'email'    => $request['email'],
            'phone'    => $request['phone'],
            'password' => Hash::make($request['password']),
            'is_active' => $request['is_active'],

        ]);

        $user->assignRole($request['role']);

        $company_user = CompanyUser::create([
            'user_id'     => $user->id,
            'company_id'    => Auth::user()->currentCompany->id,
            'role'    => $request['role'],
        ]);

        $user->notify(new AccountCreatedNotification($user));

        // if ($request->has('image')) {
        if ($request['image']) {
            $tempFile = Upload::where('folder', $request['image'])->first();

            if ($tempFile) {
                $user->addMedia(Storage::path('public/temp/' . $request['image'] . '/' . $tempFile->filename))->toMediaCollection('avatars');

                Storage::deleteDirectory('public/temp/' . $request['image']);
                $tempFile->delete();
            }
        }

    }

    public function editEmployee($request, $employee){

        $employee->update([
            'name'     => $request['name'],
            'email'    => $request['email'],
            'phone'    => $request['phone'],
            'is_active' => $request['is_active']
        ]);

        $employee->syncRoles($request['role']);

        if ($request['image']) {
            $tempFile = Upload::where('folder', $request['image'])->first();

            if ($employee->getFirstMedia('avatars')) {
                $employee->getFirstMedia('avatars')->delete();
            }

            if ($tempFile) {
                $employee->addMedia(Storage::path('public/temp/' . $request['image'] . '/' . $tempFile->filename))->toMediaCollection('avatars');

                Storage::deleteDirectory('public/temp/' . $request['image']);
                $tempFile->delete();
            }
        }

    }
}
