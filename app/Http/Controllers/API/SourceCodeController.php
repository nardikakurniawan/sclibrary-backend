<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SourceCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SourceCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sourceCode = SourceCode::all();

        return response()->json([
            'status' => 'success',
            'data'  => $sourceCode
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
            'name' => 'required|string|max:100|min:3',
            'image' => 'image',
            'description' => 'string',
            'link' => 'required|string',
            'version' => 'required|integer',
            'date' => 'required|date',
            'file_zip' => 'required|mimes:zip,rar',
            'file_ebook' => 'required|mimes:doc,docx,pdf,txt',
            'category_id' => 'required|integer',
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);     
        }

        if($request->file('image')) {
            $data['image'] = $request->file('image')->store('img-source-codes');
        }
        if($request->file('file_zip')) {
            $data['file_zip'] = $request->file('file_zip')->store('file-source-codes');
        }
        if($request->file('file_ebook')) {
            $data['file_ebook'] = $request->file('file_ebook')->store('ebooks');
        }

        $sourceCode = SourceCode::create($data);

        return response()->json([
            'status' => 'success',
            'data'  => $sourceCode
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
        $sourceCode = SourceCode::find($id);

        if(!$sourceCode) {
            return response()->json([
                'status' => 'error',
                'message' => 'Source Code not found'
            ], 404); 
        }

        return response()->json([
            'status' => 'success',
            'data'  => $sourceCode,
            'category'  => $sourceCode->category
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
            'name' => 'string|max:100|min:3',
            'image' => 'image',
            'description' => 'string',
            'link' => 'string',
            'version' => 'integer',
            'date' => 'date',
            'file_zip' => 'mimes:zip,rar',
            'file_ebook' => 'mimes:doc,docx,pdf,txt',
            'category_id' => 'integer',
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);     
        }

        if($request->file('image')) {
            $data['image'] = $request->file('image')->store('img-source-codes');
        }
        if($request->file('file_zip')) {
            $data['file_zip'] = $request->file('file_zip')->store('file-source-codes');
        }
        if($request->file('file_ebook')) {
            $data['file_ebook'] = $request->file('file_ebook')->store('ebooks');
        }

        $sourceCode = SourceCode::find($id);

        if(!$sourceCode) {
            return response()->json([
                'status' => 'error',
                'message' => 'source code not found'
            ], 404); 
        }

        $sourceCode->fill($data);
        $sourceCode->save();

        return response()->json([
            'status' => 'success',
            'data'  => $sourceCode
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
        $sourceCode = SourceCode::find($id);

        if(!$sourceCode) {
            return response()->json([
                'status' => 'error',
                'message' => 'source code not found'
            ], 404); 
        }

        $sourceCode->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'source code deleted'
        ]);
    }
}
