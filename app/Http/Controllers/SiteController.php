<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $site = Site::with('updatedBy')->first();
        return view('site.set_site',[
            'site' => $site
        ]);
    }

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
}
