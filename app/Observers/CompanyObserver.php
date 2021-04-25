<?php

namespace App\Observers;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyObserver
{
    /**
     * Handle the Company "created" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function created(Company $company)
    {
        //
    }

    /**
     * Handle the Company "updated" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function updated(Company $company)
    {
        //
    }

    /**
     * Handle the Company "deleted" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function deleted(Company $company)
    {
        //unlink logo
        if ($company->logo) {
            //delete directory with files for this company
            Storage::deleteDirectory($company->getStoragePath());
        }
    }

    /**
     * Handle the Company "restored" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function restored(Company $company)
    {
        //
    }

    /**
     * Handle the Company "force deleted" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function forceDeleted(Company $company)
    {
        //
    }
}
