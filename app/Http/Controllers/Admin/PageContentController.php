<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageContentController extends Controller
{
    public function index(): View
    {
        $contents = PageContent::all()->groupBy('section');

        return view('admin.content.index', compact('contents'));
    }

    public function update(Request $request): RedirectResponse
    {
        $items = $request->input('content', []);

        foreach ($items as $id => $val) {
            $content = PageContent::find($id);
            if ($content) {
                PageContent::set($content->page, $content->section, $content->key, $val, $content->label, $content->type);
            }
        }

        return back()->with('success', 'Website page content updated successfully and changes are live.');
    }
}
