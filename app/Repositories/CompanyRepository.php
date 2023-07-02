<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository{
    public function company_data(){
        // return [
        //     1 => ['name' => 'Company 1'],
        //     2 => ['name' => 'Company 2'],
        //     3 => ['name' => 'Company 3']
        // ];
        $data = [];
        $companies = Company::select('id', 'name')->orderby('name', 'asc')->get();
        foreach($companies as $company){
            $data[$company->id] = $company->name."(".$company->contacts()->count().")";
        }
        return $data;
    }
}

?>