<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_read_all_the_tasks()
    {
        $user = Auth::loginUsingId(User::factory()->create()->id);

        $this->actingAs($user);
        $task = Task::factory()->create(['user_id'=>Auth::id()]);

        $response = $this->get('user/task');

        $response->assertSee($task->name);
    }

    public function test_a_user_can_read_single_task()
    {
        //Given we have task in the database
        $user = Auth::loginUsingId(User::factory()->create()->id);

        $this->actingAs($user);
        $task = Task::factory()->create();
        $response = $this->get('user/task/' . $task->id);
        $response->assertOk($task->name);
    }

    /** @test */
    public function authenticated_users_can_create_a_new_task()
    {
        $user = Auth::loginUsingId(User::factory()->create()->id);
        $this->actingAs($user);
        $task = Task::factory()->make();
        $this->post('user/task/', $task->toArray());
        $this->assertEquals(1, Task::all()->count());
    }
    /** @test */
    public function unauthenticated_users_cannot_create_a_new_task()
    {
        $task = Task::factory()->create();
        $this->post('user/task/', $task->toArray())
            ->assertRedirect('/login');
    }


    /** @test */

    public function a_task_requires_a_name()
    {
        $user = Auth::loginUsingId(User::factory()->create()->id);

        $task = Task::factory()->make(['name' => null]);


        $this->post('user/task', $task->toArray())
            ->assertSessionHasErrors('name');
    }
    /** @test */
    public function a_task_requires_a_description()
    {
        $user = Auth::loginUsingId(User::factory()->create()->id);

        $task = Task::factory()->make(['description' => null]);


        $this->post('user/task', $task->toArray())
            ->assertSessionHasErrors('description');
    }

    /** @test */
    public function authorized_user_can_update_the_task()
    {

        $user = Auth::loginUsingId(User::factory()->create()->id);
        $this->actingAs($user);
        $task = Task::factory()->create(['user_id' => Auth::id(), 'id' => 1]);

        $task->name = "Updated name";
        $this->put('/user/task/' . $task->id, $task->toArray());
        $this->assertDatabaseHas('tasks', ['id' => $task->id, 'name' => 'Updated name']);
    }
    /** @test */
    public function authorized_user_can_delete_the_task()
    {

        $user = Auth::loginUsingId(User::factory()->create()->id);
        $this->actingAs($user);
        $task = Task::factory()->create(['user_id' => Auth::id(), 'id' => 1]);

        $this->delete('user/task/' . $task->id);
        // dd(Task::all());
        $this->assertDatabaseHas('tasks', ['id' => $task->id]);
    }
}