<?php

namespace Tests\Feature\Livewire\Auth\Register;

use App\Http\Livewire\Auth\Register\SecurityInfo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SecurityInfoTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(SecurityInfo::class);

        $component->assertStatus(200);
    }
}
