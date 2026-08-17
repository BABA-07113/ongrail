<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\RateLimiter;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_loads(): void
    {
        $this->get(route('admin.login'))
            ->assertOk()
            ->assertSee('Bon retour')
            ->assertSee('logoRailLong.png');
    }

    public function test_authenticated_user_is_redirected_from_login(): void
    {
        $user = User::factory()->create(['role' => 'admin']);

        $this->actingAs($user)
            ->get(route('admin.login'))
            ->assertRedirect(route('admin.dashboard'));
    }

    public function test_user_can_login_with_valid_credentials(): void
    {
        User::factory()->create([
            'email' => 'admin@ongrail.org',
            'password' => 'admin123',
            'role' => 'admin',
            'is_active' => true,
        ]);

        $this->post(route('admin.login'), [
            'email' => 'admin@ongrail.org',
            'password' => 'admin123',
        ])->assertRedirect(route('admin.dashboard'));

        $this->assertAuthenticated();
    }

    public function test_inactive_user_cannot_login(): void
    {
        User::factory()->create([
            'email' => 'inactive@ongrail.org',
            'password' => 'admin123',
            'role' => 'admin',
            'is_active' => false,
        ]);

        $this->post(route('admin.login'), [
            'email' => 'inactive@ongrail.org',
            'password' => 'admin123',
        ])->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_login_is_rate_limited(): void
    {
        RateLimiter::clear('admin@ongrail.org|127.0.0.1');

        for ($i = 0; $i < 5; $i++) {
            $this->post(route('admin.login'), [
                'email' => 'admin@ongrail.org',
                'password' => 'wrong-password',
            ]);
        }

        $this->post(route('admin.login'), [
            'email' => 'admin@ongrail.org',
            'password' => 'wrong-password',
        ])->assertSessionHasErrors('email');
    }

    public function test_forgot_password_page_loads(): void
    {
        $this->get(route('admin.password.request'))->assertOk()->assertSee('Mot de passe oublié');
    }

    public function test_send_reset_link_flashes_status(): void
    {
        User::factory()->create(['email' => 'admin@ongrail.org']);

        $this->post(route('admin.password.email'), ['email' => 'admin@ongrail.org'])
            ->assertSessionHas('status');
    }

    public function test_reset_page_loads(): void
    {
        $this->get(route('admin.password.reset', ['token' => 'abc', 'email' => 'admin@ongrail.org']))
            ->assertOk()
            ->assertSee('Choisissez un nouveau mot de passe');
    }

    public function test_non_admin_cannot_access_user_management(): void
    {
        $redacteur = User::factory()->create(['role' => 'redacteur']);

        $this->actingAs($redacteur)
            ->get(route('admin.utilisateurs.index'))
            ->assertForbidden();
    }

    public function test_non_admin_cannot_access_settings(): void
    {
        $redacteur = User::factory()->create(['role' => 'redacteur']);

        $this->actingAs($redacteur)
            ->get(route('admin.parametres.index'))
            ->assertForbidden();
    }

    public function test_admin_can_access_user_management(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)
            ->get(route('admin.utilisateurs.index'))
            ->assertOk();
    }

    public function test_non_super_admin_cannot_assign_super_admin_role(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)
            ->post(route('admin.utilisateurs.store'), [
                'name' => 'Nouveau',
                'email' => 'nouveau@ongrail.org',
                'password' => 'password123',
                'password_confirmation' => 'password123',
                'role' => 'super_admin',
                'is_active' => '1',
            ])->assertSessionHasErrors('role');
    }

    public function test_super_admin_cannot_delete_himself(): void
    {
        $superAdmin = User::factory()->create(['role' => 'super_admin']);

        $response = $this->actingAs($superAdmin)
            ->delete(route('admin.utilisateurs.destroy', $superAdmin));

        fwrite(STDERR, "\nSTATUS: " . $response->getStatusCode() . "\n");
        fwrite(STDERR, "SESSION: " . json_encode(session()->all()) . "\n");
        fwrite(STDERR, "HEADERS: " . json_encode($response->headers->all()) . "\n");

        $response->assertSessionHas('error');

        $this->assertDatabaseHas('users', ['id' => $superAdmin->id]);
    }

    public function test_setting_update_ignores_unknown_keys(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)
            ->post(route('admin.parametres.update'), [
                'site_name' => 'RAIL Bénin v2',
                'evil_key' => 'injected',
            ])->assertSessionHas('success');

        $this->assertDatabaseHas('settings', ['key' => 'site_name', 'value' => 'RAIL Bénin v2']);
        $this->assertDatabaseMissing('settings', ['key' => 'evil_key']);
    }
}
