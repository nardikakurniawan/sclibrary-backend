<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SupportingDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SupportingDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supportingDocuments = SupportingDocument::all();

        return response()->json([
            'status' => 'success',
            'data'  => $supportingDocuments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'descriptions' => 'string',
            'file' => 'required|mimes:doc,docx,pdf,txt'
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);     
        }

        if($request->file('file')) {
            $data['file'] = $request->file('file')->store('documents');
        }

        $supportingDocument = SupportingDocument::create($data);

        return response()->json([
            'status' => 'success',
            'data'  => $supportingDocument
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supportingDocument = SupportingDocument::find($id);

        if(!$supportingDocument) {
            return response()->json([
                'status' => 'error',
                'message' => 'Document not found'
            ], 404); 
        }

        return response()->json([
            'status' => 'success',
            'data'  => $supportingDocument
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'string',
            'descriptions' => 'string',
            'file' => 'mimes:doc,docx,pdf,txt'
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);


        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);     
        }

        if($request->file('file')) {
            // if($request->oldImage) {
            //     Storage::delete($request->oldImage);
            // }
            $data['file'] = $request->file('file')->store('documents');
        }

        $supportingDocument = SupportingDocument::find($id);

        if(!$supportingDocument) {
            return response()->json([
                'status' => 'error',
                'message' => 'document not found'
            ], 404); 
        }

        $supportingDocument->fill($data);
        $supportingDocument->save();

        return response()->json([
            'status' => 'success',
            'data'  => $supportingDocument
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supportingDocument = SupportingDocument::find($id);

        if(!$supportingDocument) {
            return response()->json([
                'status' => 'error',
                'message' => 'Document not found'
            ], 404); 
        }

        $supportingDocument->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Document deleted'
        ]);
    }
}
