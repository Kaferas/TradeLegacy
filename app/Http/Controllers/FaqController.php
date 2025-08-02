<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FaqController extends Controller
{
    /**
     * Display a listing of the FAQs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $faqs = Faq::orderBy('position', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.faqs.index', compact('faqs'));
    }

    public function indexPublished()
    {
        $faqs = Faq::published()
            ->orderBy('position', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('front.list', compact('faqs'));
    }

    /**
     * Show the form for creating a new FAQ.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = $this->getUniqueCategories();
        return view('admin.faqs.create', compact('categories'));
    }

    /**
     * Store a newly created FAQ in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $this->validateFaq($request);

        // Set position to the end if not specified
        if (!isset($validated['position'])) {
            $lastPosition = Faq::max('position') ?? 0;
            $validated['position'] = $lastPosition + 1;
        }

        Faq::create($validated);

        return redirect()->route('faqs.index')
            ->with('success', 'FAQ created successfully.');
    }

    /**
     * Display the specified FAQ.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\View\View
     */
    public function show(Faq $faq)
    {
        return view('admin.faqs.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified FAQ.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\View\View
     */
    public function edit(Faq $faq)
    {
        $categories = $this->getUniqueCategories();
        return view('admin.faqs.edit', compact('faq', 'categories'));
    }

    /**
     * Update the specified FAQ in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Faq $faq)
    {
        $validated = $this->validateFaq($request);

        $faq->update($validated);

        return redirect()->route('faqs.index')
            ->with('success', 'FAQ updated successfully.');
    }

    /**
     * Remove the specified FAQ from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('faqs.index')
            ->with('success', 'FAQ deleted successfully.');
    }

    /**
     * Update the positions of multiple FAQs.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePositions(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'positions' => 'required|array',
            'positions.*.id' => 'required|exists:faqs,id',
            'positions.*.position' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        foreach ($request->positions as $position) {
            Faq::find($position['id'])->update(['position' => $position['position']]);
        }

        return response()->json(['message' => 'Positions updated successfully.']);
    }

    /**
     * Toggle the published status of a FAQ.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\RedirectResponse
     */
    public function togglePublished(Faq $faq)
    {
        $faq->update(['is_published' => !$faq->is_published]);

        $status = $faq->is_published ? 'published' : 'unpublished';

        return redirect()->back()
            ->with('success', "FAQ {$status} successfully.");
    }

    /**
     * Get a list of all unique categories.
     *
     * @return \Illuminate\Support\Collection
     */
    private function getUniqueCategories()
    {
        return Faq::distinct('category')
            ->whereNotNull('category')
            ->pluck('category')
            ->sort();
    }

    /**
     * Validate the FAQ data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    private function validateFaq(Request $request)
    {
        return $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'is_published' => 'boolean',
            'position' => 'nullable|integer|min:0',
        ]);
    }
}
