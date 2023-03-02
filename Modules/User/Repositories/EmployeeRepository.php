<?php

namespace Modules\User\Repositories;

use App\Models\User;
use App\Traits\CompanySession;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Modules\Upload\Entities\Upload;
use Modules\User\Emails\Employees\WelcomeEmail;
use Modules\User\Interfaces\EmployeeInterface;

class EmployeeRepository implements EmployeeInterface{

    use CompanySession;

    public function getAllEmployees($model){

        return $model->newQuery()
            ->with(['roles' => function ($query) {
                $query->select('name')->get();
            }])
            ->where('company_id', $this->getCompanyCurrentSession())
            ->where('id', '!=', auth()->id());
    }

    public function createEmployee($request){

        $user = User::create([
            'name'     => $request['name'],
            'email'    => $request['email'],
            'phone'    => $request['phone'],
            'password' => Hash::make($request['password']),
            'is_active' => $request['is_active'],

            'company_id' => $this->getCompanyCurrentSession()
        ]);

        $user->assignRole($request['role']);


        Mail::to($user->email)->send(new WelcomeEmail($user->name));

        // if ($request->has('image')) {
        // if ($request['image']) {
        //     $tempFile = Upload::where('folder', $request['image'])->first();

        //     if ($tempFile) {
        //         $user->addMedia(Storage::path('public/temp/' . $request['image'] . '/' . $tempFile->filename))->toMediaCollection('avatars');

        //         Storage::deleteDirectory('public/temp/' . $request['image']);
        //         $tempFile->delete();
        //     }
        // }

    }

    public function editEmployee($request, $employee){

        $employee->update([
            'name'     => $request['name'],
            'email'    => $request['email'],
            'phone'    => $request['phone'],
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
