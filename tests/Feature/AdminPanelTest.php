<?php

namespace Tests\Feature;

use App\Models\Enquiry;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_guest_is_redirected_from_admin_dashboard_to_login(): void
    {
        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_login_with_valid_credentials(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@veyoramedia.com'],
            [
                'name' => 'Veyora Administrator',
                'password' => Hash::make('admin123'),
            ]
        );

        $response = $this->post(route('admin.login.submit'), [
            'email' => 'admin@veyoramedia.com',
            'password' => 'admin123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($admin);
    }

    public function test_authenticated_admin_can_view_dashboard(): void
    {
        $admin = User::where('email', 'admin@veyoramedia.com')->first();
        if (! $admin) {
            $admin = User::factory()->create();
        }

        $response = $this->actingAs($admin)->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $response->assertSee('Agency Operations & Overview');
        $response->assertSee('Recent Placement Inquiries');
    }

    public function test_admin_can_create_new_service(): void
    {
        $admin = User::where('email', 'admin@veyoramedia.com')->first();
        if (! $admin) {
            $admin = User::factory()->create();
        }

        $payload = [
            'title' => 'Executive Keynote Tours',
            'slug' => 'executive-keynote-tours',
            'tagline' => 'High-ranking business keynote placements',
            'badge' => 'New Service',
            'short_description' => 'Guest appearances on top 1% technology and venture stages.',
            'full_description' => '<p>Guaranteed bookings on targeted industry conferences.</p>',
            'features_text' => "Speaker one-sheet preparation\nTargeted host pitching\nPre-interview briefing",
            'display_order' => 7,
            'is_active' => 1,
            'is_featured' => 0,
        ];

        $response = $this->actingAs($admin)->post(route('admin.services.store'), $payload);

        $response->assertRedirect(route('admin.services.index'));
        $this->assertDatabaseHas('services', [
            'slug' => 'executive-keynote-tours',
            'title' => 'Executive Keynote Tours',
        ]);
    }

    public function test_admin_can_update_enquiry_status_and_add_notes(): void
    {
        $admin = User::where('email', 'admin@veyoramedia.com')->first();
        if (! $admin) {
            $admin = User::factory()->create();
        }

        $enquiry = Enquiry::first();
        if (! $enquiry) {
            $enquiry = Enquiry::create([
                'name' => 'Demo Lead',
                'email' => 'demolead@company.com',
                'message' => 'Need article placement.',
                'status' => 'new',
            ]);
        }

        // Test status update
        $statusResponse = $this->actingAs($admin)->post(route('admin.enquiries.status', $enquiry->id), [
            'status' => 'contacted',
        ]);
        $statusResponse->assertSessionHas('success');
        $this->assertDatabaseHas('enquiries', [
            'id' => $enquiry->id,
            'status' => 'contacted',
        ]);

        // Test adding note
        $noteResponse = $this->actingAs($admin)->post(route('admin.enquiries.notes', $enquiry->id), [
            'note' => 'Spoke with CEO via phone call. Scheduled follow-up next Tuesday.',
        ]);
        $noteResponse->assertSessionHas('success');
        $this->assertDatabaseHas('enquiry_notes', [
            'enquiry_id' => $enquiry->id,
            'note' => 'Spoke with CEO via phone call. Scheduled follow-up next Tuesday.',
        ]);
    }

    public function test_admin_can_update_page_content_and_settings(): void
    {
        $admin = User::where('email', 'admin@veyoramedia.com')->first();
        if (! $admin) {
            $admin = User::factory()->create();
        }

        $settingsResponse = $this->actingAs($admin)->post(route('admin.settings.update'), [
            'settings' => [
                'site_name' => 'Veyora Media Agency',
                'contact_email' => 'press@veyoramedia.com',
            ],
        ]);

        $settingsResponse->assertSessionHas('success');
        $this->assertDatabaseHas('site_settings', [
            'key' => 'site_name',
            'value' => 'Veyora Media Agency',
        ]);
    }
}
