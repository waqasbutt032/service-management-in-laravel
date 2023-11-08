<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subproduct;


class SubproductController extends Controller
{
    public function index() {
        return view('subproducts.category', [
            'subproducts' => Subproduct::get()
        ]);
    }

    public function create() {
        return view('subproducts.create');
    }

    public function store(Request $request) {

        // validate data
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        // push to database
        $subproduct = new Subproduct;
        $subproduct->name = $request->name;
        $subproduct->description = $request->description;
        $subproduct->save();

        return back()->withSuccess('Sub-Product added successfully');
    }

    public function edit($id) {
        $subproduct = Subproduct::where('id', $id)->first();
        return view('subproducts.edit', ['subproduct' => $subproduct]);
    }

    public function update(Request $request, $id) {

        // validate data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $subproduct = Subproduct::where('id', $id)->first();

        $subproduct->name = $request->name;
        $subproduct->description = $request->description;

        $subproduct->save();

        return back()->withSuccess('Sub-Product updated successfully');
    }

    public function destroy($id) {
        $subproduct = Subproduct::where('id', $id)->first();
        $subproduct->delete();
        return back()->withSuccess('Sub-Product deleted successfully');
    }
}
