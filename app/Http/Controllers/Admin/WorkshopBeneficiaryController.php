<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workshop;
use App\Models\WorkshopBeneficiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkshopBeneficiaryController extends Controller
{
    public function store(Request $request, Workshop $workshop)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'future_aspiration' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('workshops/beneficiaries', 'public');
        }

        if (!isset($validated['order'])) {
            $validated['order'] = $workshop->beneficiaries()->max('order') + 1 ?? 0;
        }

        $validated['workshop_id'] = $workshop->id;

        $beneficiary = WorkshopBeneficiary::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Beneficiary added successfully!',
            'beneficiary' => $beneficiary,
        ]);
    }

    public function update(Request $request, Workshop $workshop, WorkshopBeneficiary $beneficiary)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'future_aspiration' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($beneficiary->image) {
                Storage::disk('public')->delete($beneficiary->image);
            }
            $validated['image'] = $request->file('image')->store('workshops/beneficiaries', 'public');
        }

        $beneficiary->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Beneficiary updated successfully!',
            'beneficiary' => $beneficiary,
        ]);
    }

    public function destroy(Workshop $workshop, WorkshopBeneficiary $beneficiary)
    {
        if ($beneficiary->image) {
            Storage::disk('public')->delete($beneficiary->image);
        }

        $beneficiary->delete();

        return response()->json([
            'success' => true,
            'message' => 'Beneficiary deleted successfully!',
        ]);
    }
}
