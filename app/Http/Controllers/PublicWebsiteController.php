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
        $services = Service::active()->take(4)->get();
        $caseStudies = CaseStudy::published()->where('is_featured', true)->take(3)->get();
        if ($caseStudies->isEmpty()) {
            $caseStudies = CaseStudy::published()->take(3)->get();
        }
        $testimonials = Testimonial::published()->where('is_featured', true)->take(4)->get();
        $faqs = Faq::published()->take(6)->get();

        // Dynamically manageable page content
        $heroBadge = PageContent::get('home', 'hero', 'badge', 'The International Media Placement Agency');
        $heroHeadline = PageContent::get('home', 'hero', 'headline', 'Your name in the byline. Your story where buyers read.');
        $heroSubtitle = PageContent::get('home', 'hero', 'subtitle', 'We help founders, CEOs, and industry pioneers build enduring market credibility through professionally authored profiles, curated list rankings, and high-impact byline articles.');
        $heroCtaPrimary = PageContent::get('home', 'hero', 'cta_primary_text', 'Get Featured');
        $heroCtaLink = PageContent::get('home', 'hero', 'cta_primary_link', '/contact');

        $introEyebrow = PageContent::get('home', 'intro', 'eyebrow', 'Editorial Authority vs. Fleeting Ads');
        $introHeading = PageContent::get('home', 'intro', 'heading', 'In a world crowded with noise, true editorial credibility cannot be faked.');
        $introBody = PageContent::get('home', 'intro', 'body', 'Buyers, investors, and enterprise decision-makers ignore unsolicited sales emails and paid social ads. But when they find an in-depth article analyzing your company\'s achievements or an authoritative opinion piece under your byline in a reputable publication, skepticism evaporates.');

        $founderHeading = PageContent::get('home', 'founder', 'heading', '"Traditional PR is broken. We built a publishing model based on transparency, rigorous writing, and real deliverables."');
        $founderBody = PageContent::get('home', 'founder', 'body', 'For decades, legacy PR agencies treated media coverage like an opaque mystery—charging massive retainers while promising only "efforts." At Byline Bridge, we operate like an elite editorial newsroom. We pair founders with veteran journalists, craft stories worthy of respected publications, and ensure you approve every sentence before it goes live.');
        $founderName = PageContent::get('home', 'founder', 'author_name', 'Arthur Vance & Editorial Board');
        $founderTitle = PageContent::get('home', 'founder', 'author_title', 'Managing Director, Byline Bridge');

        $ctaHeading = PageContent::get('home', 'cta', 'heading', 'Your next breakthrough story deserves to be told.');
        $ctaSubtitle = PageContent::get('home', 'cta', 'subtitle', 'Schedule a confidential narrative consultation to discuss suitable media placements, publication availability, and strategic timing for your brand.');

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
            'website' => ['nullable', 'url', 'max:255'],
            'service_id' => ['nullable', 'exists:services,id'],
            'target_publication' => ['nullable', 'string', 'max:255'],
            'budget_range' => ['nullable', 'string', 'max:100'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            'privacy_consent' => ['required', 'accepted'],
        ], [
            'privacy_consent.accepted' => 'You must agree to our privacy policy before submitting your enquiry.',
            'message.min' => 'Please provide at least a brief summary of your background and goals (10+ characters).',
        ]);

        $serviceName = null;
        if (! empty($validated['service_id'])) {
            $service = Service::find($validated['service_id']);
            $serviceName = $service?->title;
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

        return redirect()->route('contact')->with('success', 'Thank you for reaching out. Your confidential media consultation request has been received. Our editorial team will review your profile and respond within 24 business hours.');
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
