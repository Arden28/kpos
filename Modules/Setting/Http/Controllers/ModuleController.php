<?php

namespace Modules\Setting\Http\Controllers;

use App\Models\InstalledModule;
use App\Models\Module;
use App\Models\Team;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    public function install(Module $module){
        $team = Team::find(Auth::user()->team->id)->first();

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
            ->with('success', "L'application '{$module->name}' installée avec brio.");
    
    }
    
    public function uninstall(Module $module){
        $team = Team::find(Auth::user()->team->id)->first();

        // Check if the module is installed
        $installedModule = InstalledModule::where('team_id', $team->id)
            ->where('module_slug', $module->slug)
            ->first();

        if (!$installedModule) {
            return redirect()->back()
                ->with('error', "L'application '{$module->name}' n'est pas installée !.");
        }

        // Uninstall the module
        $installedModule->delete();

        // Redirect back to the modules page with a success message
        return redirect()->route('dashboard')
            ->with('success', "L'application '{$module->name}' a été désinstallée !.");
    }
    
}
