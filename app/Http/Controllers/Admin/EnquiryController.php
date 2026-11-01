<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\EnquiryNote;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EnquiryController extends Controller
{
    public function index(Request $request): View
    {
        $query = Enquiry::with('service')->latest();

        if ($search = $request->query('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('company', 'like', "%{$search}%");
            });
        }

        if ($status = $request->query('status')) {
            $query->where('status', $status);
        }

        if ($date = $request->query('date')) {
            $query->whereDate('created_at', $date);
        }

        $enquiries = $query->paginate(15)->withQueryString();
        $counts = [
            'all' => Enquiry::count(),
            'new' => Enquiry::where('status', 'new')->count(),
            'contacted' => Enquiry::where('status', 'contacted')->count(),
            'in_progress' => Enquiry::where('status', 'in_progress')->count(),
            'converted' => Enquiry::where('status', 'converted')->count(),
            'closed' => Enquiry::where('status', 'closed')->count(),
        ];

        return view('admin.enquiries.index', compact('enquiries', 'counts'));
    }

    public function show(Enquiry $enquiry): View
    {
        $enquiry->load(['service', 'notes.author']);

        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function updateStatus(Request $request, Enquiry $enquiry): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:new,contacted,in_progress,converted,closed'],
        ]);

        $oldStatus = $enquiry->status;
        $enquiry->update(['status' => $validated['status']]);

        // Add automated note recording the change
        EnquiryNote::create([
            'enquiry_id' => $enquiry->id,
            'user_id' => Auth::id(),
            'note' => "Status changed from '{$oldStatus}' to '{$validated['status']}'.",
        ]);

        return back()->with('success', 'Enquiry status updated to '.ucfirst(str_replace('_', ' ', $validated['status'])).'.');
    }

    public function addNote(Request $request, Enquiry $enquiry): RedirectResponse
    {
        $validated = $request->validate([
            'note' => ['required', 'string', 'max:2000'],
        ]);

        EnquiryNote::create([
            'enquiry_id' => $enquiry->id,
            'user_id' => Auth::id(),
            'note' => $validated['note'],
        ]);

        return back()->with('success', 'Internal note added.');
    }

    public function destroy(Enquiry $enquiry): RedirectResponse
    {
        $enquiry->delete();

        return redirect()->route('admin.enquiries.index')->with('success', 'Enquiry deleted successfully.');
    }
}
