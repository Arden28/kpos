<?php

namespace Modules\User\Http\Controllers;

use Modules\User\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Modules\Upload\Entities\Upload;
use Modules\User\Emails\Employees\WelcomeEmail;
use Modules\User\Http\Requests\Employees\StoreEmployeeRequest;
use Modules\User\Http\Requests\Employees\UpdateEmployeeRequest;
use Modules\User\Interfaces\EmployeeInterface;

class UsersController extends Controller
{

    protected $employeeRepository;

    public function __construct(EmployeeInterface $employeeRepository){

        $this->employeeRepository = $employeeRepository;

    }

    // public function dashboard(){
    //     return view('user::dashboard');
    // }

    public function index(UsersDataTable $dataTable) {
        abort_if(Gate::denies('access_user_management'), 403);

        return $dataTable->render('user::users.index');
    }


    public function create() {
        abort_if(Gate::denies('access_user_management'), 403);

        return view('user::users.create');
    }


    public function store(StoreEmployeeRequest $request) {
        abort_if(Gate::denies('access_user_management'), 403);

        $company = Auth::user()->currentCompany;
        $this->employeeRepository->createEmployee($request->validated(), $company);

        // Mail::to($request->email)->send(new WelcomeEmail($request->name));

        toast("Nouvel Employé Ajouté ! Au poste de  '$request->role' !", 'success');

        return redirect()->route('users.index');
    }


    public function edit(User $user) {
        abort_if(Gate::denies('access_user_management'), 403);

        return view('user::users.edit', compact('user'));
    }


    public function update(UpdateEmployeeRequest $request, User $user) {
        abort_if(Gate::denies('access_user_management'), 403);

        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
        ]);

        // $user->save();

        $user->syncRoles($request->role);

        if ($request->image) {
            $tempFile = Upload::where('folder', $request->image)->first();

            if ($user->getFirstMedia('avatars')) {
                $user->getFirstMedia('avatars')->delete();
            }

            if ($tempFile) {
                $user->addMedia(Storage::path('public/temp/' . $request->image . '/' . $tempFile->filename))->toMediaCollection('avatars');

                Storage::deleteDirectory('public/temp/' . $request->image);
                $tempFile->delete();
            }
        }

        // toast("Le compte à bien été modifié '$request->role' Role!", 'info');
        toast("Le compte à bien été modifié", 'info');

        return redirect()->route('users.index');
    }


    public function destroy(User $user) {
        abort_if(Gate::denies('access_user_management'), 403);

        $user->delete();

        toast('L\'employé à été supprimé !', 'warning');

        // return redirect()->route('users.index');
        return redirect()->back();
    }
}
