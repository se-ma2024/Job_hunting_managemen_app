<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\company;
use Auth; // 認証クラスのインポート

class CompanyController extends Controller
{
    // 企業情報の一覧を表示するメソッド
    public function index()
    {
        // ログインユーザーに関連付けられた企業情報を取得
        $userCompanies = Auth::user()->companies;
        return view('index', ['companies' => $userCompanies]);
    }

    // 企業情報の作成画面を表示するメソッド
    public function createCompany()
    {
        return view("createCompany");
    }

    // 企業情報を新規作成するメソッド
    public function addCompanyDetail(Request $request)
    {
        // 入力データのバリデーション
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

        // ログインユーザーに関連付けられた企業情報を作成
        $company = Auth::user()->companies()->create($request->all());
        return redirect()->route('index')->with('success', '企業が追加されました。');
    }

    // 企業情報の詳細を表示するメソッド
    public function detailCompany(string $id)
    {
        // 指定された企業情報を取得
        $company = Company::findOrFail($id);
        return view('detailCompany', ['company' => $company]);
    }

    // 企業情報の編集画面を表示するメソッド
    public function editCompany(string $id)
    {
        // 指定された企業情報を取得
        $company = Company::findOrFail($id);
        return view('editCompany', ['company' => $company]);
    }

    // 企業情報を更新するメソッド
    public function updateCompany(Request $request, string $id)
    {
        // 入力データのバリデーション
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
        
        // 指定された企業情報を更新
        $company = Company::findOrFail($id);
        $company->update($request->all());
        return redirect()->route('detailCompany', ['id' => $company->id])->with('success', '企業情報が更新されました');
    }

    // 企業情報を削除するメソッド
    public function delete(string $id)
    {
        // 指定された企業情報を削除
        Company::findOrFail($id)->delete();
        return redirect()->route('index')->with('success', '企業が削除されました。');
    }
}