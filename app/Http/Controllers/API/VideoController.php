<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();

        return response()->json([
            'status' => 'success',
            'data'  => $videos
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
            'source_code_id' => 'required|integer',
            'link' => 'required|string',
            'description' => 'string'
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);     
        }

        $video = Video::create($data);

        return response()->json([
            'status' => 'success',
            'data'  => $video
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
        $video = Video::find($id);

        if(!$video) {
            return response()->json([
                'status' => 'error',
                'message' => 'video not found'
            ], 404); 
        }

        return response()->json([
            'status' => 'success',
            'data'  => $video
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
            'source_code_id' => 'integer',
            'link' => 'string',
            'description' => 'string'
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);     
        }

        $video = Video::find($id);

        if(!$video) {
            return response()->json([
                'status' => 'error',
                'message' => 'video not found'
            ], 404); 
        }

        $video->fill($data);
        $video->save();

        return response()->json([
            'status' => 'success',
            'data'  => $video
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
        $video = Video::find($id);

        if(!$video) {
            return response()->json([
                'status' => 'error',
                'message' => 'video not found'
            ], 404); 
        }

        $video->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'video deleted'
        ]);
    }
}
