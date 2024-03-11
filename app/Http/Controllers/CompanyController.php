<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\company;
use Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $userCompanies = Auth::user()->companies;
        return view('index', ['companies' => $userCompanies]);
    }

    public function createCompany()
    {
        return view("createCompany");
    }

    public function addCompanyDetail(Request $request)
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
        $company = Auth::user()->companies()->create($request->all());
        return redirect()->route('index')->with('success', '企業が追加されました。');
    }

    public function detailCompany(string $id)
    {
        $company = Company::findOrFail($id);
        return view('detailCompany', ['company' => $company]);
    }

    public function editCompany(string $id)
    {
        $company = Company::findOrFail($id);
        return view('editCompany', ['company' => $company]);
    }

    public function updateCompany(Request $request, string $id)
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
        $company->update($request->all());
        return redirect()->route('detailCompany', ['id' => $company->id])->with('success', '企業情報が更新されました');
    }

    public function delete(string $id)
    {
        Company::findOrFail($id)->delete();
        return redirect()->route('index')->with('success', '企業が削除されました。');
    }
}