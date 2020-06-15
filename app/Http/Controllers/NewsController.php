<?php

namespace App\Http\Controllers;

use App\News;
use DateTime;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news', compact('news'));
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
        $request->validate([
            'news_image' => 'mimes:jpg,png,jpeg,gif,pdf',
            'news_image_64' => '',
            'news_title' => 'required',
            'news_detail' => 'required',
            'news_create' => '',
            'news_status' => '',
        ]);

        $imageNews = time() . '.' . $request->news_image->extension();

        $request->news_image->move(public_path('images\news'), $imageNews);

        $news_image_64 = 'image_64';
        $news_status = 1;
        $news_create = auth()->user()->name;

        $news = new News([
            'news_image' => $imageNews,
            'news_image_64' => $news_image_64,
            'news_title' => $request->news_title,
            'news_detail' => $request->news_detail,
            'news_create' => $news_create,
            'news_status' => $news_status,
        ]);

        $news->save();
        return redirect()->back()->with('success', 'เพิ่ม ข่าว สำเร็จ!!');
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
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'news_image' => 'mimes:jpg,png,jpeg,gif,pdf',
            'news_image_64' => '',
            'news_title' => 'required',
            'news_detail' => 'required',
            'news_status' => '',
        ]);

        $imageNews = time() . '.' . $request->news_image->extension();

        $request->news_image->move(public_path('images'), $imageNews);

        $news_image_64 = 'image_64';
        $news_status = 1;
        $news_create = auth()->user()->name;

        $news = News::find($id);
        $news->news_image = $imageNews;
        $news->news_image_64 = $news_image_64;
        $news->news_title = $request->news_title;
        $news->news_detail = $request->news_detail;
        $news->news_status = $request->news_status;
        $news->news_create = $news_create;
        $news->news_status = $news_status;

        $news->save();
        return redirect()->back()->with('success', 'แก้ไข ประกาศข่าว สำเร็จ!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::find($id)->delete();
        return redirect()->back()->with('success', 'ลบ ข่าว สำเร็จ!!');
    }
}
