<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UsersCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_login()
    {
        $this->get('/read')->assertRedirect('/login');
    }

    public function test_user_list_is_shown()
    {
        $admin = User::factory()->create();
        $other = User::factory()->create(['name' => 'Mario Rossi']);

        $this->actingAs($admin)->get('/read')
            ->assertOk()
            ->assertSee('Mario Rossi');
    }

    public function test_a_user_can_be_created_with_a_hashed_password()
    {
        $admin = User::factory()->create();

        $this->actingAs($admin)->post('/add-users', [
            'name' => 'Nuovo Utente',
            'email' => 'nuovo@example.com',
            'password' => 'password123',
        ])->assertRedirect(route('dashboard'));

        $user = User::where('email', 'nuovo@example.com')->firstOrFail();
        $this->assertTrue(Hash::check('password123', $user->password));
    }

    public function test_create_validates_input()
    {
        $admin = User::factory()->create();

        $this->actingAs($admin)->post('/add-users', [
            'name' => '',
            'email' => 'not-an-email',
            'password' => 'short',
        ])->assertSessionHasErrors(['name', 'email', 'password']);
    }

    public function test_update_keeps_password_when_left_blank()
    {
        $admin = User::factory()->create();
        $user = User::factory()->create();
        $oldHash = $user->password;

        $this->actingAs($admin)->post("/update/{$user->id}", [
            'name' => 'Nome Aggiornato',
            'email' => $user->email,
            'password' => '',
        ])->assertRedirect(route('dashboard'));

        $user->refresh();
        $this->assertSame('Nome Aggiornato', $user->name);
        $this->assertSame($oldHash, $user->password);
    }

    public function test_a_user_can_be_deleted()
    {
        $admin = User::factory()->create();
        $user = User::factory()->create();

        $this->actingAs($admin)->delete("/delete/{$user->id}")
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
