<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $document_type = Documenttype::orderBy('document_type_name', 'asc')->get();

        return view('document_type.document_type', [
            'document_type' => $document_type
        ]);
    }

    public function getDocumentTypes()
    {
        $documentTypes = Documenttype::orderBy('document_type_name', 'asc')->get();
        return response()->json($documentTypes);
    }

    public function create()
    {
        return view('document_type.document_type-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'document_type_name' => 'required',
            'document_type_status' => 'required',


        ]);
        $document_type = DocumentType::create($request->all());

        Alert::success('Success', 'Document Type has been saved !');
        return redirect('/document_type');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($document_type_id)
    {
        $document_type = DocumentType::findOrFail($document_type_id);

        return view('document_type.document_type-edit', [
            'document_type' => $document_type,
        ]);
    }

    public function update(Request $request, $document_type_id)
    {
        $validated = $request->validate([
            'document_type_name' => 'required',
            'document_type_status' => 'required',


        ]);
        $document_type = DocumentType::findOrFail($document_type_id);
        $document_type->update($validated);

        Alert::info('Success', 'Ddocument Type has been updated !');
        return redirect('/document_type');
    }
    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($document_type_id)
    {
        try {
            $document_type = DocumentType::findOrFail($document_type_id);

            $document_type->delete();

            Alert::error('Success', 'Document Type has been deleted !');
            return redirect('/document_type');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Document Type  deleted,!');
            return redirect('/document_type');
        }
    }
}
