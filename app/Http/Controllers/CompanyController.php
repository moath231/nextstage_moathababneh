<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::latest()->paginate(10);
        return view('company',compact('companies'));
    }

    public function create()
    {
        return view('admin.company.index');
    }

    public function store(CompanyRequest $request)
    {
        $com = new Company;
        if (request()->file('logo')) {
            $logo = $request->file('logo');
            $filename = uniqid() . '.' . $logo->getClientOriginalExtension();
            $path = $logo->storeAs('public/images/', $filename);

            $path = str_replace('public', 'storage', $path);

            $com->logo = $path;
        }
        $com->name = $request->name;
        $com->email = $request->email;
        $com->website = $request->website;
        $com->save();
        return redirect()->back()->with('success','added sccessfully');
    }

    public function show(Company $company)
    {
        //
    }

    public function edit(Company $company, $id)
    {
        $company = Company::findOrFail($id);
        return view('admin.company.edit',compact('company'));
    }

    public function update(Request $request, Company $company, $id)
    {
        $com = Company::findOrFail($id);
        $com->name = $request->name;        
        if (request()->file('logo')) {
            $logo = $request->file('logo');
            $filename = uniqid() . '.' . $logo->getClientOriginalExtension();
            $path = $logo->storeAs('public/images/', $filename);
            $path = str_replace('public', 'storage', $path);
            $com->logo = $path;
        }
        $com->email = $request->email;
        $com->website = $request->website;

        $com->update();
        $com->save();

        return redirect()
            ->back()
            ->with('success', 'update sccessfully');
    }

    public function destroy(Company $company ,$id)
    {
        $employee = Company::findOrFail($id);
        $employee->delete();

        return redirect()
            ->back()
            ->with('destroy', 'delete sccessfully');
    }
}
