<?php

namespace Tests\Feature\Livewire\Auth\Register;

use App\Http\Livewire\Auth\Register\Overview;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class OverviewTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Overview::class);

        $component->assertStatus(200);
    }
}
