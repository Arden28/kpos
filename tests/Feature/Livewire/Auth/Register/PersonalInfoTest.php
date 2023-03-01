<?php

namespace Tests\Feature\Livewire\Auth\Register;

use App\Http\Livewire\Auth\Register\PersonalInfo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PersonalInfoTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(PersonalInfo::class);

        $component->assertStatus(200);
    }
}
