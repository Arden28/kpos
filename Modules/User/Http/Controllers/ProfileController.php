<?php

namespace Modules\User\Http\Controllers;

use App\Models\User;
use Bpuig\Subby\Models\PlanSubscription;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Modules\Upload\Entities\Upload;
use Modules\User\Rules\MatchCurrentPassword;

class ProfileController extends Controller
{

    public function edit() {
        abort_if(Gate::denies('edit_own_profile'), 403);
        $subscription = subscribed(Auth::user()->team->id);
        return view('user::profile', compact('subscription'));
    }


    public function update(Request $request) {

        $user = User::find(auth()->user()->id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone' => 'required|numeric|unique:users,phone,' . auth()->id()
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email
        ]);

        if ($request->has('image')) {
            if ($request->has('image')) {
                $tempFile = Upload::where('folder', $request->image)->first();

                if ($user->getFirstMedia('avatars')) {
                    $user->getFirstMedia('avatars')->delete();
                }

                if ($tempFile) {
                    $user->addMedia(Storage::path('temp/' . $request->image . '/' . $tempFile->filename))->toMediaCollection('avatars');

                    Storage::deleteDirectory('temp/' . $request->image);
                    $tempFile->delete();
                }
            }
        }

        toast('Votre profil a été mis à jour!', 'success');

        return back();
    }

    public function updatePassword(Request $request) {

        $user = User::find(auth()->user()->id);

        $request->validate([
            'current_password'  => ['required', 'max:255', new MatchCurrentPassword()],
            'password' => 'required|min:8|max:255|confirmed'
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        toast('Votre mot de passe a été mis à jour!', 'success');

        return back();
    }
}
