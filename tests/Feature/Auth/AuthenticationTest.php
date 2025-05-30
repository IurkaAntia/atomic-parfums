<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }


    public function test_guest_wishlist_items_are_assigned_to_user_on_login()
    {
        // Simulate a product and wishlist entry with IP
        $product = \App\Models\Products::factory()->create();
        $guestIp = '127.0.0.77';

        \DB::table('wishlist')->insert([
            'product_id' => $product->id,
            'ip_address' => $guestIp,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create user and simulate login from same IP
        $user = User::factory()->create();

        // Set server IP to match guest IP
        $this->withServerVariables(['REMOTE_ADDR' => $guestIp])
             ->post('/login', [
                 'email' => $user->email,
                 'password' => 'password',
             ]);

        // Wishlist entry should now be linked to user
        $this->assertDatabaseHas('wishlist', [
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);

        $this->assertDatabaseMissing('wishlist', [
            'user_id' => null,
            'ip_address' => $guestIp,
            'product_id' => $product->id,
        ]);
    }



    public function test_users_can_authenticate_using_the_login_screen()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('home', absolute: false));
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_logout()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/login');
    }
}
