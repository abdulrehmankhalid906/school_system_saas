<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $site = Site::with('updatedBy')->first();
        return view('site.set_site',[
            'site' => $site
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $current_id = $request->id;

        if($current_id > 0){
            $site = Site::find($current_id);
            $data = $request->all();
            $data['contacts'] = json_encode($request->contacts);
            $data['socials_links'] = json_encode($request->socials_links);
            $data['updated_by'] = auth()->user()->id;

            if ($request->hasFile('backend_logo')) {
                $co_img = $request->file('backend_logo');
                $fileName = time() . '-' . $co_img->getClientOriginalName();
                $co_img->storeAs('public/images/', $fileName);
                $data['backend_logo'] = $fileName;
            }

            $site->update($data);
            
            return redirect()->back()->with('success','Site Credentials has been updated!');
        }
        else
        {
            $data = $request->all();
            $data['contacts'] = json_encode($request->contacts);
            $data['socials_links'] = json_encode($request->socials_links);
            $data['updated_by'] = auth()->user()->id;
    
            if ($request->hasFile('backend_logo')) {
                $co_img = $request->file('backend_logo');
                $fileName = time() . '-' . $co_img->getClientOriginalName();
                $co_img->storeAs('public/images/', $fileName);
                $data['backend_logo'] = $fileName;
            }
            Site::create($data);
        }
        
        return redirect()->back()->with('success','Site Credentials has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
