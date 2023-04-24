<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Team;

class Module extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'icon',
        'name',
        'slug',
        'short_name',
        'description',
        'enabled'
    ];


    public function teams()
    {
        return $this->belongsToMany(Team::class, 'installed_modules', 'module_slug', 'team_id');
    }


    public function install(Team $team)
    {
        if (!$this->enabled) {
            throw new \RuntimeException("Cannot install disabled module.");
        }

        $team->modules()->attach($this->slug);
        InstalledModule::create([
            'team_id'   => $team->id,
        ]);
    }

    public function uninstall(Team $team)
    {
        $team->modules()->detach($this->slug);
    }

    public function isInstalledBy(Team $team)
    {
        return InstalledModule::where('team_id', $team->id)
            ->where('module_slug', $this->slug)
            ->exists();
    }

    // public function isInstalledBy(Team $team)
    // {
    //     return $this->teams()->exists();
    // }
}
