<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::all();
        return view('images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('images.createAndEdit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request);
        // $request->validate([
        //     'logoName' => 'nullable|string|max:20',
        //     'logo' =>      'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'imageName' => 'required|string|max:20',
        //     'postImages' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        // ]);
        if ($request->has('logoUpload') == true) {
            $request->validate([
                'logoName' => 'required|string|max:20',
                'logo' =>      'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $logo =$request->logo;
            $newlogo =   time() . '_' .$logo->getClientOriginalName();
            $request->logo->storeAs('logo', $logo, 'public');
            $upload = new Image;
            $upload->logo = $newlogo;
            $upload->logoName = $request->logoName . rand(200, 1000);
            $upload->save();
        }
        if ($request->has('imageUpload') == true) {
            $request->validate([
                'imageName' => 'required|string|max:20',
                'postImages' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $postimages =   $request->postImages;
            $newpostimages =  time() . '_' . $postimages->getClientOriginalName();
            $request->postImages->storeAs('images', $postimages, 'public');
            $upload = new Image;
            $upload->postImages = $newpostimages;
            $upload->imageName = $request->imageName;
            $upload->save();
        }
        // $upload = new Image;
        // $upload->logo = isset($logo);
        // $upload->postImages = isset($postimages);
        // $upload->logoName = $request->logoName;
        // $upload->imageName = $request->imageName;


        return redirect()->route('images')->with([
            'message' => 'images added successfully!',
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        $image->delete();
        return redirect()->route("images");
    }
}
