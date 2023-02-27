<?php

namespace Modules\User\Http\Controllers;

use Modules\User\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Modules\Upload\Entities\Upload;
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

        $this->employeeRepository->createEmployee($request->validated());

        toast("User Created & Assigned '$request->role' Role!", 'success');

        return redirect()->route('users.index');
    }


    public function edit(User $user) {
        abort_if(Gate::denies('access_user_management'), 403);

        return view('user::users.edit', compact('user'));
    }


    public function update(UpdateEmployeeRequest $request, User $employee) {
        abort_if(Gate::denies('access_user_management'), 403);

        //EditEmployee
        $this->employeeRepository->editEmployee($request->validated(), $employee);

        toast("Employee Updated & Assigned '$request->role' Role!", 'info');

        return redirect()->route('users.index');
    }


    public function destroy(User $user) {
        abort_if(Gate::denies('access_user_management'), 403);

        $user->delete();

        toast('User Deleted!', 'warning');

        return redirect()->route('users.index');
    }
}