<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use View;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Hash;
use Redirect;
use Auth;
use Session;
use App\Model\species;
use App\Model\phylum;
use App\Model\classes;
use App\Model\family;
use App\Model\genus;

class SpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home');
    }

     public function species()
    {
        return View::make('species');
    }


public function species_index()
    {
       $species = species::all();

        return View::make('species_index',array('species' => $species));
    }

    public function species_create()
    {
        return View::make('species_create');
    }

    public function species_create_process()
    {
         $rules = array(
            'species_name' => 'required',
            'phylum' => 'required',
            'class' => 'required',
            'family' => 'required',
            'genus' => 'required',
            'common_name' => 'required',
            'size' => 'required',
            'habitat' => 'required',
            'life_history' => 'required',
            );

        $validator = Validator::make(Input::all(),$rules);

        if($validator -> fails()){

            $messages = $validator->messages();
            
            return Redirect::to('species_create')
            -> withErrors($validator)
            ->withInput (Input::except(''));
        }
        else
        {
            $add = new species;
            $add->species_name = Input::get('species_name');
            $add->phylum = Input::get('phylum');
            $add->class = Input::get('class');
            $add->family = Input::get('family');
            $add->genus = Input::get('genus');
            $add->common_name = Input::get('common_name');
            $add->size = Input::get('size');
            $add->habitat = Input::get('habitat');
            $add->life_history = Input::get('life_history');
            

            $add->save();

            Session::flash('message','Successfully created species!');
            return Redirect::to('species_create');

        }
    }

    public function species_show($id)
    {
        $species = species::find($id);

        return View::make('species_show',array('species'=>$species));
    }

    public function species_edit($id)
    {
        $species = species::find($id);
         return View::make('species_edit',array('species'=>$species));
    }

    public function species_edit_process($id)
    {
            $rules_edit = array(
             'species_name' => 'required',
            'phylum' => 'required',
            'class' => 'required',
            'family' => 'required',
            'genus' => 'required',
            'common_name' => 'required',
            'size' => 'required',
            'habitat' => 'required',
            'life_history' => 'required',
            );

         $validator = Validator::make(Input::all(),$rules_edit);

        if($validator -> fails()){

            $messages = $validator->messages();
            
            return Redirect::to('species_edit/'.$id)
            -> withErrors($validator);
        }
        else
        {
            $species = species::find($id);
            $edit->species_name = Input::get('species_name');
            $edit->phylum = Input::get('phylum');
            $edit->class = Input::get('class');
            $edit->family = Input::get('family');
            $edit->genus = Input::get('genus');
            $edit->common_name = Input::get('common_name');
            $edit->size = Input::get('size');
            $edit->habitat = Input::get('habitat');
            $edit->life_history = Input::get('life_history');
            
            Session::flash('message','Successfully Updated Species Info!');
            return Redirect::to('species_index');
        }
    }

    public function species_delete()
    { 
        $species = species::where('id',$id)->delete();

        Session::flash('message','Successfully deleted Species!');
        return Redirect::to('species_index');
    }

    public function species_scientific_name()
    {
        $species = species::all();
        return View::make('species_scientific_name',array('species' => $species));
    }

    public function species_display_info($id)
    {
        $species = species::find($id);
        return View::make('species_display_info',array('species' => $species));
    }

    public function species_classification_display_species($classification)
    {
        $classification_species = DB::table('species')->where('phylum',$classification)->orWhere('class', $classification)->orWhere('family', $classification)->orWhere('genus', $classification)->get();
        
        return View::make('species_classification_display_species',array('classification_species' => $classification_species, 'classification' => $classification));
    }

    public function species_classification()
    {
        $phylum_dropdown = species::all()->unique('phylum');
        $class_dropdown = species::all()->unique('class');
        $family_dropdown = species::all()->unique('family');
        $genus_dropdown = species::all()->unique('genus');

        return View::make('species_classification',array('phylum_dropdown' => $phylum_dropdown, 'class_dropdown' => $class_dropdown, 'family_dropdown' => $family_dropdown, 'genus_dropdown' => $genus_dropdown));
    }

    public function species_dropdown_display_species()
    {
        $phylum = Input::get('phylum');
        $class = Input::get('class');
        $family = Input::get('family');
        $genus = Input::get('genus');

        $classification_species = DB::table('species')->where('phylum',$phylum)->where('class', $class)->where('family', $family)->where('genus', $genus)->get();
        
        return View::make('species_dropdown_display_species',array('classification_species' => $classification_species));
    }

     public function statistics_classification()
    {
        $phylum = phylum::all();
        $class = classes::all();
        $family = family::all();
        $genus = genus::all();

        $phylum_count = species::select(DB::raw('count(*) as order_count, phylum'))
                    ->groupBy('phylum')
                    ->get();

        $class_count = species::select(DB::raw('count(*) as order_count, class'))
                    ->groupBy('class')
                    ->get();

        return View::make('statistics_classification',array('phylum' => $phylum, 'class' => $class, 'family' => $family, 'genus' => $genus, 'phylum_count' => $phylum_count, 'class_count' => $class_count));
    }

}
