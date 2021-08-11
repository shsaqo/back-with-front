<?php

namespace App\Http\Controllers;

use App\Models\CodeScript;
use Illuminate\Http\Request;

class CodeScriptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = CodeScript::all();
        return view('admin.code-script.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.code-script.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = CodeScript::create($request->all());
        return redirect()->route('code-script.index')->with('ok', 'Կոդը Ստեղծված է');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CodeScript  $codeScript
     * @return \Illuminate\Http\Response
     */
    public function show(CodeScript $codeScript)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CodeScript  $codeScript
     * @return \Illuminate\Http\Response
     */
    public function edit(CodeScript $codeScript)
    {
        return view('admin.code-script.edit', ['item' => $codeScript]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CodeScript  $codeScript
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CodeScript $codeScript)
    {
        $codeScript->update($request->all());
        return redirect()->route('code-script.index')->with('ok', 'Փոփոխությունը կատարված է');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CodeScript  $codeScript
     * @return \Illuminate\Http\Response
     */
    public function destroy(CodeScript $codeScript)
    {
        $codeScript->delete();
        return redirect()->route('code-script.index')->with('ok', 'Կոդը Ջնջված է');
    }
}
