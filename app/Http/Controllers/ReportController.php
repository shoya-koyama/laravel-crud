<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report; // Report モデルをインポート

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::where('user_id', auth()->id())->get();
        return view('reports.index', compact('reports'));
    }
    
    public function create()
    {
        return view('reports.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);
        
        $report = new Report();
        $report->user_id = auth()->id();
        $report->title = $request->title;
        $report->content = $request->content;
        $report->save();
        
        return redirect()->route('reports.index')->with('success', '報告書が作成されました。');
    }
        
    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('reports.show', compact('report'));
    }
    
    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return view('reports.edit', compact('report'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);
        
        $report = Report::findOrFail($id);
        $report->title = $request->title;
        $report->content = $request->content;
        $report->save();
        
        return redirect()->route('reports.index')->with('success', '報告書が更新されました。');
    }
    
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();
        return redirect()->route('reports.index')->with('success', '報告書が削除されました。');
    }

}
