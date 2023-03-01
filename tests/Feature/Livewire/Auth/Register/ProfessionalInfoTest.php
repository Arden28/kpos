<?php

namespace Tests\Feature\Livewire\Auth\Register;

use App\Http\Livewire\Auth\Register\ProfessionalInfo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProfessionalInfoTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ProfessionalInfo::class);

        $component->assertStatus(200);
    }
}
