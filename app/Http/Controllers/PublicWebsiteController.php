<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use App\Models\Enquiry;
use App\Models\Faq;
use App\Models\PageContent;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicWebsiteController extends Controller
{
    /**
     * Homepage with all 13 editorial luxury sections.
     */
    public function home(): View
    {
        $services = Service::active()->orderBy('display_order')->take(6)->get();
        $caseStudies = CaseStudy::published()->where('is_featured', true)->take(3)->get();
        if ($caseStudies->isEmpty()) {
            $caseStudies = CaseStudy::published()->take(3)->get();
        }
        $testimonials = Testimonial::published()->where('is_featured', true)->take(4)->get();
        $faqs = Faq::published()->orderBy('display_order')->take(7)->get();

        // Dynamically manageable page content
        $heroBadge = PageContent::get('home', 'hero', 'badge', 'Trusted by growing brands across the US, UK & Canada');
        $heroHeadline = PageContent::get('home', 'hero', 'headline', 'We Turn Your Story Into Lasting Visibility');
        $heroSubtitle = PageContent::get('home', 'hero', 'subtitle', 'Veyora Media is a PR and content agency that helps brands get noticed. We write, pitch, and publish your story on trusted media platforms, so the right audience finds you and remembers you.');
        $heroCtaPrimary = PageContent::get('home', 'hero', 'cta_primary_text', 'Get Started ↗');
        $heroCtaLink = PageContent::get('home', 'hero', 'cta_primary_link', '#contact');

        $introEyebrow = PageContent::get('home', 'intro', 'eyebrow', 'Built for Growth');
        $introHeading = PageContent::get('home', 'intro', 'heading', 'A PR Partner Built for Growth');
        $introBody = PageContent::get('home', 'intro', 'body', 'We help growing brands secure the visibility they deserve through honest, transparent media placement.');

        $founderHeading = PageContent::get('home', 'founder', 'heading', 'Why Ambitious Brands Choose Veyora Media');
        $founderBody = PageContent::get('home', 'founder', 'body', 'A simple, transparent process built around your growth.');
        $founderName = PageContent::get('home', 'founder', 'author_name', 'Veyora Editorial Board');
        $founderTitle = PageContent::get('home', 'founder', 'author_title', 'Editorial Team, Veyora Media');

        $ctaHeading = PageContent::get('home', 'cta', 'heading', 'Ready to Put Your Brand in the Spotlight?');
        $ctaSubtitle = PageContent::get('home', 'cta', 'subtitle', 'Share your goals with us, and we’ll create a PR and content plan built around your story, your industry, and your audience.');

        return view('pages.home', compact(
            'services',
            'caseStudies',
            'testimonials',
            'faqs',
            'heroBadge',
            'heroHeadline',
            'heroSubtitle',
            'heroCtaPrimary',
            'heroCtaLink',
            'introEyebrow',
            'introHeading',
            'introBody',
            'founderHeading',
            'founderBody',
            'founderName',
            'founderTitle',
            'ctaHeading',
            'ctaSubtitle'
        ));
    }

    /**
     * About page with mission, founder philosophy, and standards.
     */
    public function about(): View
    {
        $founderHeading = PageContent::get('home', 'founder', 'heading', '"Traditional PR is broken. We built a publishing model based on transparency, rigorous writing, and real deliverables."');
        $founderBody = PageContent::get('home', 'founder', 'body', 'For decades, legacy PR agencies treated media coverage like an opaque mystery. At Byline Bridge, we operate like an elite editorial newsroom.');
        $testimonials = Testimonial::published()->take(3)->get();

        return view('pages.about', compact('founderHeading', 'founderBody', 'testimonials'));
    }

    /**
     * Services Overview page.
     */
    public function services(): View
    {
        $services = Service::active()->get();

        return view('pages.services', compact('services'));
    }

    /**
     * Individual Service detail page.
     */
    public function serviceDetail(string $slug): View
    {
        $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $otherServices = Service::active()->where('id', '!=', $service->id)->take(3)->get();
        $relatedCases = CaseStudy::published()->take(2)->get();

        return view('pages.service-detail', compact('service', 'otherServices', 'relatedCases'));
    }

    /**
     * Case studies directory with filtering and pagination.
     */
    public function caseStudies(Request $request): View
    {
        $query = CaseStudy::published();

        $selectedIndustry = $request->query('industry');
        if ($selectedIndustry) {
            $query->where('industry', $selectedIndustry);
        }

        $caseStudies = $query->paginate(6)->withQueryString();
        $industries = CaseStudy::published()->pluck('industry')->unique()->filter()->values();

        return view('pages.case-studies', compact('caseStudies', 'industries', 'selectedIndustry'));
    }

    /**
     * Individual Case study detail page.
     */
    public function caseStudyDetail(string $slug): View
    {
        $caseStudy = CaseStudy::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $relatedCases = CaseStudy::published()->where('id', '!=', $caseStudy->id)->take(2)->get();

        return view('pages.case-study-detail', compact('caseStudy', 'relatedCases'));
    }

    /**
     * Testimonials Wall.
     */
    public function testimonials(): View
    {
        $testimonials = Testimonial::published()->paginate(9);

        return view('pages.testimonials', compact('testimonials'));
    }

    /**
     * FAQ directory.
     */
    public function faq(): View
    {
        $faqs = Faq::published()->get()->groupBy('category');

        return view('pages.faq', compact('faqs'));
    }

    /**
     * Contact / Request a Quote page.
     */
    public function contact(Request $request): View
    {
        $services = Service::active()->get();
        $preselectedServiceId = $request->query('service');

        return view('pages.contact', compact('services', 'preselectedServiceId'));
    }

    /**
     * Submit contact form / enquiry.
     */
    public function submitEnquiry(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'company' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'max:255'],
            'service_id' => ['nullable', 'exists:services,id'],
            'service_name' => ['nullable', 'string', 'max:255'],
            'target_publication' => ['nullable', 'string', 'max:255'],
            'budget_range' => ['nullable', 'string', 'max:100'],
            'message' => ['required', 'string', 'min:5', 'max:5000'],
            'privacy_consent' => ['nullable'],
        ], [
            'message.min' => 'Please provide at least a brief summary of your brand and goals.',
        ]);

        $serviceName = $validated['service_name'] ?? null;
        if (! empty($validated['service_id'])) {
            $service = Service::find($validated['service_id']);
            $serviceName = $service?->title ?? $serviceName;
        }

        Enquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'company' => $validated['company'] ?? null,
            'website' => $validated['website'] ?? null,
            'service_id' => $validated['service_id'] ?? null,
            'service_name' => $serviceName,
            'target_publication' => $validated['target_publication'] ?? null,
            'budget_range' => $validated['budget_range'] ?? null,
            'message' => $validated['message'],
            'status' => 'new',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'Thank you! Your quote request has been received. Our team will review your brand details and reply with a tailored plan within 24 hours.');
    }

    /**
     * Privacy Policy page.
     */
    public function privacy(): View
    {
        return view('pages.privacy');
    }

    /**
     * Terms & Conditions page.
     */
    public function terms(): View
    {
        return view('pages.terms');
    }
}
