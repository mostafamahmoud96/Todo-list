<?php

namespace Tests\Feature;

use App\Models\TaskGroup;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class GroupTaskTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_read_all_the_groups()
    {
        $user = Auth::loginUsingId(User::factory()->create()->id);

        $this->actingAs($user);
        $task_group = TaskGroup::factory()->create();

        $response = $this->get('user/taskGroup');

        $response->assertSee($task_group->name);
    }

    public function test_a_user_can_read_single_task_group()
    {
        //Given we have task in the database
        $user = Auth::loginUsingId(User::factory()->create()->id);

        $this->actingAs($user);
        $task_group = TaskGroup::factory()->create();
        $response = $this->get('user/taskGroup/' . $task_group->id);
        $response->assertOk($task_group->name);
    }

    /** @test */
    public function authenticated_users_can_create_a_new_task_group()
    {
        $user = Auth::loginUsingId(User::factory()->create()->id);
        $this->actingAs($user);
        $task_group = TaskGroup::factory()->make();
        $this->post('user/taskGroup/', $task_group->toArray());
        $this->assertEquals(1, TaskGroup::all()->count());
    }
    /** @test */
    public function unauthenticated_users_cannot_create_a_new_task_group()
    {
        $task_group = TaskGroup::factory()->create();
        $this->post('user/taskGroup/', $task_group->toArray())
            ->assertRedirect('/login');
    }

    /** @test */

    public function a_task_group_requires_a_name()
    {
        $user = Auth::loginUsingId(User::factory()->create()->id);

        $task_group = TaskGroup::factory()->make(['name' => null]);


        $this->post('user/taskGroup', $task_group->toArray())
            ->assertSessionHasErrors('name');
    }

  

}