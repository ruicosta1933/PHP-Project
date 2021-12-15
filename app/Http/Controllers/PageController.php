<?php

namespace App\Http\Controllers;

use App\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      //  $page=DB::table('home')->get(); ['page'=>$page ]
        return view ('page.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page=DB::table('home')->get();
        return view ('page.home', ['page'=>$page ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param \Illuminate\Http\UploadedFile $photo
     * @param string $folder
     * @return string
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $title = $request->title;
        $text = $request->text;

        $home = DB::table('home')->where ('id', $id)->get();
        if($request->hasFile('banner') and isset($request->file)) {
            $photo = $request->file('banner');
            $folder = 'photos';
            $imageName = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = public_path('../../images/'.$folder);
            $photo->move($destinationPath, $imageName);
            $home->image=$imageName;
            DB::table('home')
                ->update(
                    ['banner' => $imageName]
                );
        }
       DB::table('home')
            ->update(
                [ 'title' => $title, 'text' => $text]
            );

       return view('page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
