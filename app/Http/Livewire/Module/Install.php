<?php

namespace App\Http\Livewire\Module;

use App\Models\InstalledModule;
use App\Models\Module;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Install extends Component
{
    public $team;

    public $module;

    public function install(Module $module){
        $team = Team::find(Auth::user()->team->id)->first();

        $this->team = $team;

        // Check if the module is already installed
        if ($module->isInstalledBy($team)) {

            toast("L'application '{$module->name}' est déjà installée.", 'info');

            return redirect()->back();
        }

        // Install the module
        $installedModule = new InstalledModule([
            'team_id' => $team->id,
            'module_slug' => $module->slug,
        ]);
        $installedModule->save();

        // if ($team->currentTeam) {
        //     $installedModule->team_id = $team->currentTeam->id;
        // }

        // $installedModule->save();

        // Redirect back to the modules page with a success message
        return redirect()->route('dashboard')
            ->with('success', "L'application '{$module->name}' installée avec succès.");
    }

    public function render()
    {
        $modules = Module::all();

        $team = Team::find(Auth::user()->team->id);

        return view('livewire.module.install', compact('modules', 'team'));
    }
}
