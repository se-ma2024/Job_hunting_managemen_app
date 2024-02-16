<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\company;

class company_controller extends Controller
{
    public function index()
    {
        $companies = DB::select('select * from companies');
        return view('index', ['companies' => $companies]);
    }

    public function createCompany()
    {
        return view("createCompany");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'company_size' => 'required|string|max:255',
            'strengths' => 'nullable|string',
            'benefits_package' => 'nullable|string',
            'selection_status' => 'required|string|max:255',
            'reason_for_applying' => 'nullable|string',
            'memo' => 'nullable|string',
        ]);

        $company = Company::addCompany($request->all());
        return redirect()->route('index')->with('success', '企業が追加されました。');
    }

    public function detail(string $id)
    {
        $company = Company::showDetail($id);
        return view('detail', ['company' => $company]);
    }

    public function edit(string $id)
    {
        $company = Company::showDetail($id);
        return view('edit', ['company' => $company]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'company_size' => 'required|string|max:255',
            'strengths' => 'nullable|string',
            'benefits_package' => 'nullable|string',
            'selection_status' => 'required|string|max:255',
            'reason_for_applying' => 'nullable|string',
            'memo' => 'nullable|string',
        ]);
        $company = Company::findOrFail($id);
        $company->updateCompany($request->all());
        return redirect()->route('detail', ['id' => $company->id])->with('success', '企業情報が更新されました');
    }

    public function delete(string $id)
    {
        company::deleteCompany($id);
        return redirect()->route('index')->with('success', '企業が削除されました。');
    }
}
