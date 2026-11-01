<?php

namespace Tests\Feature;

use App\Models\Enquiry;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    public function test_guest_is_redirected_from_admin_dashboard_to_login(): void
    {
        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_login_with_valid_credentials(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@bylinebridge.com'],
            [
                'name' => 'Agency Administrator',
                'password' => Hash::make('admin123'),
            ]
        );

        $response = $this->post(route('admin.login.submit'), [
            'email' => 'admin@bylinebridge.com',
            'password' => 'admin123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($admin);
    }

    public function test_authenticated_admin_can_view_dashboard(): void
    {
        $admin = User::where('email', 'admin@bylinebridge.com')->first();
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
        $admin = User::where('email', 'admin@bylinebridge.com')->first();
        if (! $admin) {
            $admin = User::factory()->create();
        }

        $payload = [
            'title' => 'Executive Podcast Tours',
            'slug' => 'executive-podcast-tours',
            'tagline' => 'High-ranking business podcast placements',
            'badge' => 'New Service',
            'short_description' => 'Guest appearances on top 1% technology and venture podcasts.',
            'full_description' => '<p>Guaranteed bookings on targeted industry shows.</p>',
            'features_text' => "Speaker one-sheet preparation\nTargeted host pitching\nPre-interview briefing",
            'display_order' => 5,
            'is_active' => 1,
            'is_featured' => 0,
        ];

        $response = $this->actingAs($admin)->post(route('admin.services.store'), $payload);

        $response->assertRedirect(route('admin.services.index'));
        $this->assertDatabaseHas('services', [
            'slug' => 'executive-podcast-tours',
            'title' => 'Executive Podcast Tours',
        ]);
    }

    public function test_admin_can_update_enquiry_status_and_add_notes(): void
    {
        $admin = User::where('email', 'admin@bylinebridge.com')->first();
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
        $admin = User::where('email', 'admin@bylinebridge.com')->first();
        if (! $admin) {
            $admin = User::factory()->create();
        }

        $settingsResponse = $this->actingAs($admin)->post(route('admin.settings.update'), [
            'settings' => [
                'site_name' => 'Byline Bridge Agency',
                'contact_email' => 'press@bylinebridge.com',
            ],
        ]);

        $settingsResponse->assertSessionHas('success');
        $this->assertDatabaseHas('site_settings', [
            'key' => 'site_name',
            'value' => 'Byline Bridge Agency',
        ]);
    }
}
