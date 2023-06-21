<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Vcard;
use App\Models\VcardContact;
use App\Models\VcardMedia;
use App\Models\VcardBank;
use App\Models\VcardAddress;
use App\Models\VcardNotes;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\User;

class VcardController extends Controller
{

    /**
     * Display a listing of the resource.
    */
    public function index(){

            $cards = Vcard::all();

            if(Auth::check() && Auth::user()->role == 0){$cards = Vcard::where('user_id', Auth::user()->id)->get();}

            if(Auth::check() && Auth::user()->role == 0 && count($cards) == 1) { foreach($cards as $card){ return redirect()->route('vcard.show', $card->slug); } } else{ return view('products.vcard.index', ['cards' => $cards]); }  

            return view('products.vcard.index', ['cards' => $cards]);
    }

    /**
     * Show the form for creating a new resource.
    */

    public function create(){

        if(Auth::check()){
            return view('products.vcard.create');
        }else
        {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
    **/
    public function store(Request $request)
    {
        $request->validate([
            'image' =>       'required | mimes:jpg,png,jpeg | max:2048',
            'name' =>        'required | string',
            'companyname' => 'nullable | string',
            'companywork' => 'nullable | string',
        ]);

        $slug =  Str::slug(Str::before(Auth::user()->email, '@') . ' ' . $request->name , '_');

        $ImageName = Str::slug($request->name , '_');
        $newImageName = Str::random(). '_' . $ImageName . '.' . $request->image->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('images/vcard',$request->image,$newImageName);

        Vcard::create([
            'user_id' =>  auth()->user()->id,
            'slug' => $slug,
            'image' => $newImageName,
            'name' => $request->name,
            'company_name' => $request->company_name,
            'company_work' => $request->company_work,
        ]);

        return redirect()->route('vcard.edit', $slug);
    }

    /**
     * Display a listing of the resource.
    */
    public function show(string $slug){
        
        $cards = Vcard::where('slug', $slug)->firstOrFail();

        if(Auth::check() && Auth::user()->role == 0){$cards = Vcard::where('slug', $slug)->where('user_id',Auth::user()->id)->firstOrFail();}

        return view('products.vcard.show',  ['cards' => $cards]);
        
    }


    /**
     * Show the form for editing the specified resource.
    */
    public function edit(string $slug)
    {
        if(Auth::check()){
            if(Auth::user()->role == 1){$vcard = vcard::where('slug', $slug)->firstOrFail();}
            else{
                $vcard = Vcard::where('slug', $slug)->where('user_id',Auth::user()->id)->firstOrFail();
            }
                return view('products.vcard.edit',  ['vcards' => $vcard]);
        }else{
            return redirect()->back();
        }
    }

        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {

        if($request->has('name')){
            $request->validate([
                'name' =>                       'required | string',
                'companyname' =>                'nullable | string',
                'companywork' =>                'nullable | string',
                'country' =>                    'nullable | string',
                'state' =>                      'nullable | string',
                'districtanhometown' =>         'nullable | string',
                'address1' =>                   'nullable | string',
                'address2' =>                   'nullable | string',
                'AboutUsTitle' =>               'nullable | string',
                'AboutUsdescription' =>         'nullable | string',
            ]);
    
            if($request->image){
                $exist = Storage::disk('public')->exists("images/vcard/{$request->oldimage}");
                if($exist){
                    Storage::disk('public')->delete("images/vcard/{$request->oldimage}");
                }
    
                $ImageName = Str::slug($request->name , '_');
                $newImageName = Str::random(). '_' . $ImageName . '.' . $request->image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('images/vcard',$request->image,$newImageName);
                $request->image = $newImageName;
            }

            if(!$request->image){

                $request->image = $request->oldimage;
            }
    
            Vcard::where('slug', $slug)->update([
                'user_id' =>  auth()->user()->id,
                'slug' => $slug,
                'image' => $request->image,
                'name' => $request->name,
                'company_name' => $request->company_name,
                'company_work' => $request->company_work,
            ]);

            return redirect()->route('vcard.index');
        }
        
        $vcard_id = vcard::where('slug',$slug)->first();


        if($request->has('contact_name')){
            VcardContact::where('vcard_id', $vcard_id['id'])->create([
                'vcard_id' =>  $vcard_id['id'],
                'contact_name' => $request->contact_name,
                'country' => $request->phone_contact,
                'contact' => $request->phone_value,
            ]);
        }

        if($request->has('media_name')){
            VcardMedia::where('vcard_id', $vcard_id['id'])->create([
                'vcard_id' =>  $vcard_id['id'],
                'media_name' => $request->media_name,
                'media_link' => $request->media_link,
            ]);
        }

        if($request->has('bank')){
            VcardBank::where('vcard_id', $vcard_id['id'])->create([
                'vcard_id' =>  $vcard_id['id'],
                'bank' => $request->bank,
                'bank_name' => $request->bank_name,
                'bank_iban' => $request->bank_iban,
            ]);
        }

        if($request->has('address')){
            VcardAddress::where('vcard_id', $vcard_id['id'])->create([
                'vcard_id' => $vcard_id['id'],
                'country'  => $request->country,
                'province' => $request->state,
                'district' => $request->districtanhometown,
                'address1' => $request->address1,
                'address2' => $request->address2,
            ]);
        }

        if($request->has('title')){
            VcardNotes::where('vcard_id', $vcard_id['id'])->create([
                'vcard_id' => $vcard_id['id'],
                'title'  => $request->title,
                'description' => $request->description,
            ]);
        }

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
    */
    public function destroy(Request $request, string $id)
    {
        // dd($request->all());

        if($request->value == 'contact'){
            VcardContact::where('id',$id)->delete();
        }elseif($request->value == 'media'){
            VcardMedia::where('id',$id)->delete();
        }elseif($request->value == 'bank'){
            VcardBank::where('id',$id)->delete();
        }elseif($request->value == 'address'){
            VcardAddress::where('id',$id)->delete();
        }elseif($request->value == 'note'){
            VcardNotes::where('id',$id)->delete();
        }
        
        if($request->vcard == 'vcard'){
            Vcard::where('id',$id)->delete();

            return redirect()->route('vcard.index');
        }

        return redirect()->back();
    }
}
