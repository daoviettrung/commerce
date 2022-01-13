<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slide.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slide = new Slide();
        $id = Str::random(15);
        $slide->id = $id;
        $slide->name = $request->name_slide;
        $slide->description = $request->description_slide;
        if ($request->hasFile('image_slide')) {
            $file = $request->file('image_slide');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/slide', $filename);
            $slide->image = $filename;
        }
        $slide->save();
        return redirect('slide/create')->with('success', 'Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slide = Slide::find($id);
        if ($request->hasFile('image_slide')) {
            $path = 'assets/uploads/slide/' . $slide->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image_slide');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/slide', $filename);
            $slide->image = $filename;
        }
        $slide->name = $request->name_slide;
        $slide->description = $request->description_slide;
        $slide->update();
        return redirect('slide')->with('status', 'Updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
        if ($slide->image) {
            $path = 'assets/uploads/slide/' . $slide->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $slide->delete();
        return redirect('slide')->with('status', 'Deleted success');
    }
}
