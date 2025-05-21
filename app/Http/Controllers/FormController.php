<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\form_data;
class FormController extends Controller
{
   

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'remarks' => 'nullable|string|max:1000',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $photoPath = $request->file('photo')->store('uploads', 'public');
 form_data::create([
        'name' => $validated['name'],
        'remarks' => $validated['remarks'] ?? null,
        'photo' => $photoPath,
    ]);
        return back()->with('success', 'Form submitted successfully!')
                     ->with('image', $photoPath);
    }

}
