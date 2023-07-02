<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    //Index
    public function index(CompanyRepository $company)
    {
        // $curr = Auth::user();
        // $contacts = $this -> getContacts();
        // $companies =json_decode(json_encode( $this -> getCompanies()));
        // $companies =json_decode(json_encode($company->company_data()));
        // $contacts = Contact::all();
        $contacts = Contact::where(function ($query) {
            if ($companyId = request()->query("company_id")) {
                $query->where("company_id", $companyId);
            }
        })->where(function ($query) {
            if ($search = request()->query('search')) {
                $query->where("first_name", "LIKE", "%{$search}%");
                $query->orWhere("last_name", "LIKE", "%{$search}%");
                $query->orWhere("email", "LIKE", "%{$search}%");
            }
        })->orderby('id', 'desc')->paginate(7);
        $companies = $company->company_data();
        return view('contacts.index', ['contacts' => $contacts, 'companies' => $companies]);
    }

    //Create
    public function create()
    {
        $companies = Company::pluck('name', 'id');
        $contact = new Contact();
        return view('contacts.create', compact('companies', 'contact'));
    }

    //Show
    public function show($id)
    {
        // $contacts = $this -> getContacts();


        // $contact = $contacts[$id];
        $contact = Contact::findOrFail($id);
        // abort_if(!isset($contacts),404);
        return view('contacts.show')->with('contact', $contact);
    }

    // protected function getContacts(){
    //     return [
    //         1 => ['firstname' => 'Sok', 'lastname' => 'Dara', 'email'=>'dara@abc.com','phone'=>'092 293 234','address'=>'Phnom Penh', 'company'=>'ABC'],
    //         2 => ['firstname' => 'Sok', 'lastname' => 'Pisey', 'email'=>'pisey@abc.com','phone'=>'092 234 123','address'=>'Phnom Penh', 'company'=>'ABC'],
    //         3 => ['firstname' => 'Chan', 'lastname' => 'Ratha', 'email'=>'ratha@xyz.com','phone'=>'092 234 233','address'=>'Phnom Penh', 'company'=>'XYZ'],
    //         4 => ['firstname' => 'Kos', 'lastname' => 'Borey', 'email'=>'borey@mno.com','phone'=>'092 234 343','address'=>'Phnom Penh', 'company'=>'MNO'],
    //     ];
    // }
    // protected function getCompanies(){
    //     return [
    //         1 => ['name' => 'Company 1'],
    //         2 => ['name' => 'Company 2'],
    //     ];
    // }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'company_id' => 'required|exists:companies,id'
        ]);
        Contact::create($request->all());
        $message = "Contact has been added successfully";
        return redirect()->route('contacts.index')->with('message', $message);
    }
    // Edit
    public function edit($id)
    {
        $companies = Company::pluck('name', 'id');
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('companies', 'contact'));
    }
    // Update
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'company_id' => 'required|exists:companies,id'
        ]);
        $contact->update($request->all());
        $message = "Contact has been updated successfully";
        return redirect()->route('contacts.index')->with('message', $message);
    }
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('message', 'Contact has been removed successfully');
    }
}
