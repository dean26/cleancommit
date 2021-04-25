<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Storage;
use ImageOptimizer;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('company.form', ['object' => new Company(), 'data' => $request->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStoreRequest $request)
    {
        $company = Company::create($request->all());

        //image upload
        $this->save_image($request, $company);

        return redirect(route('company.index'))->with('flash_notice', trans('Added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Company $company)
    {
        return view('company.show', ['object' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Company $company)
    {
        return view('company.form', ['object' => $company, 'data' => $request->all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request, Company $company)
    {
        $company->update($request->all());

        //image upload
        $this->save_image($request, $company);

        return redirect(route('company.index'))->with('flash_notice', trans('Updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Company $company)
    {
        $company->delete();

        $request->session()->flash('flash_notice', trans('Deleted'));

        return response()->json([
            'status' => 'OK',
            'redirect_to' => route('company.index')
        ]);
    }

    private function save_image(Request $request, Company $company)
    {
        if ($request->hasFile('logo')) {

            $company_path = $company->getStoragePath();

            //unlink old photo
            if ($company->logo) {
                Storage::delete($company->getFullStoragePath());
                $company->logo = null;
            }

            $file = $request->file('logo');

            $extension = $file->getClientOriginalExtension();
            $filename = substr(Helper::createSlug($file->getClientOriginalName()), 0, -3) . '.' . $extension;

            $path = $file->storeAs(
                $company_path, $filename
            );

            $company->logo = $filename;
            $company->save();

            //optimize image
            ImageOptimizer::optimize(Storage::disk('local')->path($path));

        }
    }
}
