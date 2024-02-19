<?php

namespace App\Http\Controllers;


use App\Models\Faculty;
use App\Models\Documents;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use League\CommonMark\Node\Block\Document;

class DocumentController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $document = Documents::orderBy('document_name', 'asc')->get();
        $documenttypes = Documenttype::orderBy('document_type_name', 'asc')->get();

        return view('document.document', [
            'document' => $document,
            'documenttypes' => $documenttypes
        ]);


    }
    public function hrdocument  ()
    {
        $document = Documents::orderBy('document_name', 'asc')->get();
        $documenttypes = Documenttype::orderBy('document_type_name', 'asc')->get();
        return view('document.hrdocument', [
            'document' => $document,
            'documenttypes' => $documenttypes
        ]);
    }



    public function create()
    {
        return view('document.document-add');
    }

    /**
     * Store a newly created resource in storage.
     */



     public function store(Request $request)
     {
         $user = auth()->user();
         $fullname = $user->first_name . ' ' . $user->last_name;

         $validated = $request->validate([
             'document_name' => 'required',
             'document_type' => 'required',
         ]);

         $validated['document_status'] = 'Pending';
         $validated['document_owner'] = $fullname;

         $file = $request->file('document_name'); // Retrieve the file properly
         $file_name = time().'.'.$file->getClientOriginalExtension();
         $file->move('assets', $file_name); // Move the file
         $validated['document_name'] = $file_name;
         $validated['email_owner'] = auth()->user()->email ;
          // Store file name instead of file itself

         $document = Documents::create($validated);

         Alert::success('Success', 'Document has been saved!');
         return redirect('/document');
     }
    /**
     * Display the specified resource.
     */
    public function show(string $employee_id)
    {
        //
    }

    public function edit($document_id)
    {
        $document = Documents::findOrFail($document_id);
        return view('document.document-edit', [
            'document' => $document,
        ]);
    }




    public function hrdocuments()
    {
        return view('document.document-hrdocument');
    }



    public function mydocument($email)
{
    $document = Documents::where('email_owner', $email)->get();

    return view('document.document', [
        'document' => $document,
    ]);
}



    public function approved($document_id)
    {
        $document = Documents::findOrFail($document_id);
        return view('document.document-approved', [
            'document' => $document,
        ]);
    }

    public function faculty_edit($document_id)
    {
        $document = Documents::findOrFail($document_id);
        return view('document.document-faculty-edit', [
            'document' => $document,
        ]);
    }


    public function disapproved($document_id)
    {
        $document = Documents::findOrFail($document_id);
        return view('document.document-disapproved', [
            'document' => $document,
        ]);
    }


    public function download(Request $request,$document_name){

        return response()->download(public_path('assets/'.$document_name));
    }





    public function approved_now(Request $request, string $document_id)
    {

        $validated = $request->validate([
            'document_description'=> 'required',
            'document_type' => 'required',

        ]);

        // Retrieve the document by ID
        $document = Documents::findOrFail($document_id);

        // Check if a new document file is uploaded


        // Update other document attributes
        $document->document_description = $request->input('document_description');
        $document->document_type = $request->input('document_type');
        $document->document_status = 'Approved';
        $user = auth()->user();
        $fullname = $user->first_name . ' ' . $user->last_name;
        $document->document_owner = $fullname ;

        // Save the changes
        $document->save();

        Alert::info('Success', 'Document has been approved!');
        return redirect('/hmo/dashboard');
    }

    public function disapproved_now(Request $request, string $document_id)
    {
        $validated = $request->validate([
            'document_description'=> 'required',
            'document_type' => 'required',
        ]);

        // Retrieve the document by ID
        $document = Documents::findOrFail($document_id);

        // Check if a new document file is uploaded


        // Update other document attributes
        $document->document_description = $request->input('document_description');
        $document->document_type = $request->input('document_type');
        $document->document_status = 'Disapproved';
        $user = auth()->user();
        $fullname = $user->first_name . ' ' . $user->last_name;
        $document->document_owner = $fullname ;

        // Save the changes
        $document->save();

        Alert::info('Success', 'Document has been disapproved!');
        return redirect('/hmo/dashboard');
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $document_id)
    {
        $fullname = auth()->user()->first_name . ' ' . auth()->user()->last_name; // Use space instead of dot
        $validated = $request->validate([
            'document_name' => 'required',
            'document_description', // You missed the '=>' symbol here
            'document_type' => 'required',
            'document_status' => 'required',
            // Remove 'document_owner' from here, since it's set directly below
        ]);

        // Retrieve the document by ID
        $document = Documents::findOrFail($document_id);

        // Check if a new document file is uploaded
        if ($request->hasFile('document_name')) {
            $file = $request->file('document_name');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('assets', $file_name);
            $document->document_name = $file_name; // Update the document file name
        }

        // Update other document attributes
        $document->document_description = $request->input('document_description');
        $document->document_type = $request->input('document_type');
        $document->document_owner = $fullname; // Set document owner directly
        $document->document_status = $request->input('document_status');

        // Save the changes
        $document->save();

        Alert::info('Success', 'Document has been updated!');
        return redirect('/hmo/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($document_id)
    {
        try {
            $faculty = Documents::findOrFail($document_id);

            $faculty->delete();

            Alert::error('Success', 'Documents has been deleted !');
            return redirect('/hmo/dashboard');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Documents deleted, Barang already used !');
            return redirect('/hmo/dashboard  ');
        }
    }
}