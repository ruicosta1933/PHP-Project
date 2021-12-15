<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page=DB::table('about')->get();
        return view ('page.about', ['page'=>$page ]);
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
        //
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
        //
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

        $desc1 = $request->desc1;
        $desc2 = $request->desc2;
        $desc3 = $request->desc3;

        $about = DB::table('about')->where ('id', $id)->get();
        if($request->hasFile('banner') or $request->hasFile('img1') or $request->hasFile('img2') or $request->hasFile('img3') ) {
            $photo = $request->file('banner');
            $_img1 = $request->file('img1');
            $_img2 = $request->file('img2');
            $_img3 = $request->file('img3');
            $folder = 'photos';
            $destinationPath = public_path('../../images/'.$folder);
            if($photo!=null){
                $imageName = time() . '.' . $photo->getClientOriginalExtension();
                $photo->move($destinationPath, $imageName);
                $about->image=$imageName;
                DB::table('about')
                    ->update(
                        ['banner' => $imageName ]
                    );
            }
            if($_img1!=null){
                $img1 = time() . '.' . $_img1->getClientOriginalExtension();
                $_img1->move($destinationPath, $img1);
                $about->image=$img1;
                DB::table('about')
                    ->update(
                        ['img1' => $img1 ]
                    );
            }
            if($_img2!=null){
                $img2 = time() . '.' . $_img2->getClientOriginalExtension();
                $_img2->move($destinationPath, $img2);
                $about->image=$img2;
                DB::table('about')
                    ->update(
                        ['img2' => $img2 ]
                    );
            }
            if($_img3!=null){
                $img3 = time() . '.' . $_img3->getClientOriginalExtension();
                $_img3->move($destinationPath, $img3);
                $about->image=$img3;
                DB::table('about')
                    ->update(
                        ['img3' => $img3 ]
                    );
            }


        }

        DB::table('about')
            ->update(
                [ 'title' => $title, 'text' => $text, 'descricao1' => $desc1, 'descricao2' => $desc2,'descricao3' => $desc3]
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
