<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\Enquiry;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Admin dashboard with real database metrics.
     */
    public function index(): View
    {
        $totalEnquiries = Enquiry::count();
        $newEnquiries = Enquiry::where('status', 'new')->count();
        $activeServices = Service::where('is_active', true)->count();
        $publishedCaseStudies = CaseStudy::where('is_published', true)->count();
        $publishedTestimonials = Testimonial::where('is_published', true)->count();
        $totalFaqs = Faq::where('is_published', true)->count();

        $recentEnquiries = Enquiry::with('service')->latest()->take(6)->get();

        return view('admin.dashboard', compact(
            'totalEnquiries',
            'newEnquiries',
            'activeServices',
            'publishedCaseStudies',
            'publishedTestimonials',
            'totalFaqs',
            'recentEnquiries'
        ));
    }
}
