<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\company;

class company_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = DB::select('select * from companies');

        return view('index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create");
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // バリデーションのルールを設定
        $request->validate([
            'name' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'company_size' => 'required|string|max:255',
            'strengths' => 'nullable|string',
            'benefits_package' => 'nullable|string',
            'selection_status' => 'required|string|max:255',
            'memo' => 'nullable|string',
        ]);

        // Companyモデルを使用して新しい企業を追加
        $company = Company::addCompany($request->all());

        // ホームページにリダイレクトし、成功メッセージを表示
        return redirect()->route('index')->with('success', '企業が追加されました。');
    }

    /**
     * Display the specified resource.
     */
    public function detail(string $id)
    {
        //
        $company = Company::showDetail($id);
        return view('detail', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $company = Company::showDetail($id);
        return view('edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $company = Company::findOrFail($id);
        $company->updateCompany($request->all());
        return redirect()->route('detail', ['id' => $company->id])->with('success', '企業情報が更新されました');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
        company::deleteCompany($id);
        return redirect()->route('index')->with('success', '企業が削除されました。');

    }
}
