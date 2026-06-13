<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TableController extends Controller
{
    public function index(): View
    {
        $tables = Table::paginate(15);
        return view('admin.tables.index', compact('tables'));
    }

    public function create(): View
    {
        return view('admin.tables.create');
    }

    public function store($request): RedirectResponse
    {
        $validated = $request->validate([
            'table_number' => 'required|unique:tables|integer',
            'capacity' => 'required|integer|min:1',
            'location' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Table::create(array_merge($validated, ['status' => 'available']));

        return redirect()->route('admin.tables.index')
            ->with('success', 'Table created successfully');
    }

    public function edit(Table $table): View
    {
        return view('admin.tables.edit', compact('table'));
    }

    public function update($request, Table $table): RedirectResponse
    {
        $validated = $request->validate([
            'table_number' => 'required|unique:tables,table_number,' . $table->id . '|integer',
            'capacity' => 'required|integer|min:1',
            'location' => 'required|string',
            'status' => 'required|in:available,reserved,occupied',
            'description' => 'nullable|string',
        ]);

        $table->update($validated);

        return redirect()->route('admin.tables.index')
            ->with('success', 'Table updated successfully');
    }

    public function destroy(Table $table): RedirectResponse
    {
        $table->delete();
        return redirect()->route('admin.tables.index')
            ->with('success', 'Table deleted successfully');
    }
}
