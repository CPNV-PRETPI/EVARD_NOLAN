<?php

namespace Tests\Feature;

use App\Models\Ingredient;
use App\Models\Planning;
use App\Models\Recipe;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlanningTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_planning_screen_can_be_rendered(): void
    {
        //Given
        //Authenticating user in order to access the planning
        $this->authenticate_user();

        //When
        $response = $this->get('/');

        //Then
        $response->assertStatus(200);
    }
    public function test_planned_meals_are_returned_when_accessing_planning_route(): void
    {
        //Given

        //Authenticating user in order to access the planning
        $this->authenticate_user();

        //Populating DB with a test planning
        $planning = $this->populate_planning();

        //When
        $response = $this->get('/');

        $response->assertStatus(200);


    }
    private function populate_planning()
    {
        $ingredients = Ingredient::factory()->count(3)->create();

        $recipe = Recipe::factory()->create();

        foreach($ingredients as $key=>$ingredient){
            $recipe->ingredients()->attach([
                $key=>[
                    'ingredient_id'=>$ingredient->id,
                    'quantity'=>random_int(10,1000)
                ]
            ]);
        }

        return Planning::factory()->count(10)->for($recipe)->create(['planned_for' => Carbon::parse('monday this week')->addDays(rand(0,7))]);
    }

    private function authenticate_user()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
    }

}
