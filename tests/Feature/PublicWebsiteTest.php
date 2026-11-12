<?php

namespace Tests\Feature;

use App\Models\CaseStudy;
use App\Models\Service;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicWebsiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_homepage_renders_successfully(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee('Veyora Media');
        $response->assertSee('We Turn Your Story Into');
    }

    public function test_about_page_renders_successfully(): void
    {
        $response = $this->get(route('about'));

        $response->assertStatus(200);
        $response->assertSee('Our Story');
        $response->assertSee('Media Placement Built for');
    }

    public function test_services_page_renders_successfully(): void
    {
        $response = $this->get(route('services'));

        $response->assertStatus(200);
        $response->assertSee('Services Built to Get You');
    }

    public function test_service_detail_page_renders_successfully(): void
    {
        $service = Service::first();
        if ($service) {
            $response = $this->get(route('services.detail', $service->slug));
            $response->assertStatus(200);
            $response->assertSee($service->title);
        }
    }

    public function test_case_studies_page_renders_successfully(): void
    {
        $response = $this->get(route('case-studies'));

        $response->assertStatus(200);
        $response->assertSee('PR Case Studies');
    }

    public function test_case_study_detail_page_renders_successfully(): void
    {
        $case = CaseStudy::first();
        if ($case) {
            $response = $this->get(route('case-studies.detail', $case->slug));
            $response->assertStatus(200);
            $response->assertSee($case->client_name);
        }
    }

    public function test_testimonials_page_renders_successfully(): void
    {
        $response = $this->get(route('testimonials'));

        $response->assertStatus(200);
        $response->assertSee('Hear It From Our');
    }

    public function test_faq_page_renders_successfully(): void
    {
        $response = $this->get(route('faq'));

        $response->assertStatus(200);
        $response->assertSee('Frequently Asked');
    }

    public function test_contact_page_renders_successfully(): void
    {
        $response = $this->get(route('contact'));

        $response->assertStatus(200);
        $response->assertSee('Placement Quote');
    }

    public function test_enquiry_form_submission_stores_record(): void
    {
        $service = Service::first();

        $payload = [
            'name' => 'Testing Founder',
            'email' => 'founder@testenterprise.com',
            'phone' => '+1 555-0199',
            'company' => 'Test Enterprise Inc',
            'website' => 'https://testenterprise.com',
            'service_id' => $service?->id,
            'target_publication' => 'Forbes & Bloomberg',
            'budget_range' => '$5,000 - $10,000',
            'message' => 'Preparing for our international launch and series A funding announcement next quarter.',
        ];

        $response = $this->from(route('contact'))->post(route('contact.submit'), $payload);

        $response->assertRedirect(route('contact'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('enquiries', [
            'email' => 'founder@testenterprise.com',
            'name' => 'Testing Founder',
            'status' => 'new',
        ]);
    }
}
