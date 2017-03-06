<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Provider ;

class ProviderUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers= Provider::all() ;

        return view('user.providers.index')->with('providers',$providers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.providers.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $providerFirstName=$request->input('providerFirstName');
        $providerMiddleName=$request->input('providerMiddleName');
        $providerLastName=$request->input('providerLastName');
        $providerMobile=$request->input('providerMobile');
        $providerPhoneJob=$request->input('providerPhoneJob');
        $providerPhoneHome=$request->input('providerPhoneHome');
        $providerAddress=$request->input('providerAddress');
        $providerCity=$request->input('providerCity');
        $providerNational=$request->input('providerNational');

        $new_provider = New provider ;

        $new_provider->providerFirstName=$providerFirstName;
        $new_provider->providerMiddleName=$providerMiddleName;
        $new_provider->providerLastName=$providerLastName;
        $new_provider->providerMobile=$providerMobile;
        $new_provider->providerPhoneJob=$providerPhoneJob;
        $new_provider->providerPhoneHome=$providerPhoneHome;
        $new_provider->providerAddress=$providerAddress;
        $new_provider->providerCity=$providerCity;
        $new_provider->providerNational=$providerNational;
        $new_provider->save();

        return redirect('/user/providers') ; 
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
    public function edit($id  , Provider $provider)
    {
        $provider = $provider->find($id);

        return view('user.providers.edit')->with('provider',$provider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id , Provider $provider)
    {
        $providerFirstName=$request->input('providerFirstName');
        $providerMiddleName=$request->input('providerMiddleName');
        $providerLastName=$request->input('providerLastName');
        $providerMobile=$request->input('providerMobile');
        $providerPhoneJob=$request->input('providerPhoneJob');
        $providerPhoneHome=$request->input('providerPhoneHome');
        $providerAddress=$request->input('providerAddress');
        $providerCity=$request->input('providerCity');
        $providerNational=$request->input('providerNational');

        $provider = provider::find($id) ;
          
         $provider->providerFirstName=$providerFirstName;
         $provider->providerMiddleName=$providerMiddleName;
         $provider->providerLastName=$providerLastName;
         $provider->providerMobile=$providerMobile;
         $provider->providerPhoneJob=$providerPhoneJob;
         $provider->providerPhoneHome=$providerPhoneHome;
         $provider->providerAddress=$providerAddress;
         $provider->providerCity=$providerCity;
         $provider->providerNational=$providerNational;
         $provider->save();

         return redirect('/user/providers'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Provider $provider)
    {
        Provider::destroy($id) ;
        return redirect('/user/providers'); 
    }
}
