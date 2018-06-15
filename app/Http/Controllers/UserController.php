<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use View;
use Validator;
use Illuminate\Support\Facades\Input;
use Hash;
use Redirect;
use Auth;
use Session;
use App\Model\users;
use App\Model\species;
use Charts;

class UserController extends Controller
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

     public function user()
    {
        return View::make('user');
    }

     public function landing_user()
    {
        return View::make('landing_user');
    }


    public function user_index()
    {
        $user = users::all();
        return View::make('user_index',array('user' => $user));
    }

    public function user_create()
    {
        return View::make('user_create');
    }

    public function user_create_process()
    {
         $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:users',///mksd dia email x kn sma dri table student
            'password' => 'required',
            'c_password' => 'required|same:password',//dy akn sma dgn password ats
            );

        $validator = Validator::make(Input::all(),$rules);

        if($validator -> fails()){

            $messages = $validator->messages();
            
            return Redirect::to('user_create')///nama dlm roteu
            -> withErrors($validator)
            ->withInput (Input::except('password','c_password'));
        }
        else
        {
            $add = new users;
            $add->name = Input::get('name');
            $add->email = Input::get('email');
            $add->password = Hash::make(Input::get('password'));

            $add->save();

            Session::flash('message','Successfully created user!');
            return Redirect::to('user_create');

        }
    }

    public function user_show()
    {
        $user = users::all();

        $selected_user = Input::get('selected_user');

        $show_selected_user = array();

        for ($i=0; $i < sizeof($selected_user); $i++)
        {
            $show_selected_user[$i] = '';
            $show_selected_user[$i] = users::find($selected_user[$i]);
        }

        return View::make('user_show',array('show_selected_user'=>$show_selected_user));
    }

    public function user_edit()
    {
        $user = users::all();

        $selected_user = Input::get('selected_user');

        $edit_selected_user = array();

        for ($i=0; $i < sizeof($selected_user); $i++)
        {
            $edit_selected_user[$i] = '';
            $edit_selected_user[$i] = users::find($selected_user[$i]);
        }

        
        return View::make('user_edit')->with(array('edit_selected_user'=>$edit_selected_user));
    }

    public function user_edit_process()
    {
        $user = users::all();
        $edit_selected_user = Input::get('edit_selected_user');
        $name = Input::get('name');
        $email = Input::get('email');
        $password = Input::get('password');
        $edit = array();

        for ($i=0; $i < sizeof($edit_selected_user); $i++)
        {
            $edit[$i] = '';
            $edit[$i] = users::find($edit_selected_user[$i]);
            $edit[$i]->name = $name[$i];
            $edit[$i]->email = $email[$i];
            $edit[$i]->password = Hash::make($password[$i]);

            $edit[$i]->save();
        }

        Session::flash('message','Successfully Update User!');
        return Redirect::to('user_index');
    }

    public function user_delete()
    {
        $selected_user = Input::get('selected_user');

        for ($i=0; $i < sizeof($selected_user); $i++)
        {
            $delete_selected_user[$i] = users::where('id',$selected_user[$i])->delete();
        }

        Session::flash('message','Successfully Delete user!');
        return Redirect::to('user_index');
    }

    public function graph()
    {
        $chart = Charts::database(species::all(), 'bar', 'highcharts')
            ->title('PHYLUM')
            ->elementLabel("Total")
            ->responsive(false)
            ->groupBy('phylum');

        $chart2 = Charts::database(species::all(), 'pie', 'highcharts')
            ->title('PHYLUM')
            ->elementLabel("Total")
            ->responsive(false)
            ->groupBy('phylum');

        return view('graph', ['chart' => $chart, 'chart2' => $chart2]);
    }

    public function graph_class()
    {
        $chart = Charts::database(species::all(), 'donut', 'highcharts')
            ->title('Class')
            ->elementLabel("Total")
            ->responsive(false)
            ->groupBy('class');

        return view('graph_class', ['chart' => $chart]);
    }

     public function graph_family()
    {
        $chart = Charts::database(species::all(), 'donut', 'highcharts')
            ->title('Family')
            ->elementLabel("Total")
            ->responsive(false)
            ->groupBy('family');

        return view('graph_class', ['chart' => $chart]);
    }

      public function graph_genus()
    {
        $chart = Charts::database(species::all(), 'donut', 'highcharts')
            ->title('Genus')
            ->elementLabel("Total")
            ->responsive(false)
            ->groupBy('genus');

        return view('graph_class', ['chart' => $chart]);
    }

      public function graph_size()
    {
        $chart = Charts::database(species::all(), 'donut', 'highcharts')
            ->title('Size')
            ->elementLabel("Total")
            ->responsive(false)
            ->groupBy('size');

        return view('graph_class', ['chart' => $chart]);
    }

    public function graph_habitat()
    {
        $chart = Charts::database(species::all(), 'area', 'highcharts')
            ->title('Habitat')
            ->elementLabel("Total")
            ->responsive(true)
            ->groupBy('habitat');

        return view('graph_class', ['chart' => $chart]);
    }
}
