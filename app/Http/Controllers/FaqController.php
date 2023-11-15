<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function indexUser()
    {
        $faqs = Faq::all();
        
        return view('faq.index-user', compact('faqs'));
    }

    public function index(Request $request)
    {
        $faqs = Faq::where('question', 'like', "%{$request->search}%")
            ->orWhere('answer', 'like', "%{$request->search}%")->get();
        return view('faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        Faq::create($request->all());

        return redirect()->route('faq.index')
            ->with('success', 'Faq created successfully.');
    }

    public function show(Faq $faq)
    {
        return view('faq.show', compact('faq'));
    }

    public function edit(Faq $faq)
    {
        return view('faq.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq->update($request->all());

        return redirect()->route('faq.index')
            ->with('success', 'Faq updated successfully');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('faq.index')
            ->with('success', 'Faq deleted successfully');
    }
    
}
