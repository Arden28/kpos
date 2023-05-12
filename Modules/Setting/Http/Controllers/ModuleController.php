<?php

namespace Modules\Setting\Http\Controllers;

use App\Models\InstalledModule;
use App\Models\Module;
use App\Models\Team;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\People\Entities\Supplier;
use Modules\People\Interfaces\SupplierInterface;
use Faker\Factory as Faker;

class ModuleController extends Controller
{

    protected $supplierRepository;

    public function __construct(SupplierInterface $supplierRepository){

        $this->supplierRepository = $supplierRepository;
    }


    public function install(Module $module){
        $team = Team::find(Auth::user()->team->id)->first();

        // Check if the module is already installed
        if ($module->isInstalledBy($team)) {

            toast("L'application {$module->name} est déjà installée.", 'info');

            return redirect()->back();
        }

        // Install the module
        $installedModule = new InstalledModule([
            'team_id' => Auth::user()->team->id,
            'module_slug' => $module->slug,
        ]);
        $installedModule->save();

        // if ($team->currentTeam) {
        //     $installedModule->team_id = $team->currentTeam->id;
        // }

        // $installedModule->save();

        // Redirect back to the modules page with a success message
            toast("L'application {$module->name} installée avec brio.", 'success');
        return redirect()->route('dashboard')
            ->with('success', "L'application {$module->name} installée avec brio.");

    }

    public function start(){
        return view('modules.install');
    }

    public function uninstall(Module $module){
        $team = Team::find(Auth::user()->team->id)->first();

        // Check if the module is installed
        $installedModule = InstalledModule::where('team_id', $team->id)
            ->where('module_slug', $module->slug)
            ->first();

        if (!$installedModule) {
            //toast alert
            toast("L'application {$module->name} n'est pas installée !.", 'warning');

            return redirect()->back()
                ->with('error', "L'application {$module->name} n'est pas installée !.");
        }

        // Uninstall the module
        $installedModule->delete();

        // Redirect back to the modules page with a success message
            toast("L'application {$module->name} a été désinstallée !.", 'error');
        return redirect()->route('dashboard')
            ->with('success', "L'application {$module->name} a été désinstallée !.");
    }

}
