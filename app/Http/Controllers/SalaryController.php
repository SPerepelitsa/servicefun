<?php

namespace App\Http\Controllers;

use App\Salary;
use App\User;
use App\Month;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class SalaryController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {


        $salary_all = Salary::orderByDesc('month_id')->get();
       return view('salary.index')->with('salary_all', $salary_all);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $months = Month::all();

        $salary_users = User::select(['id', 'name'])->whereIn('id', [1, 3])->get();

        return view('salary.create')->with(compact('months','salary_users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'month_num' => 'required|integer',
            'user_id' => 'required|integer',
            'cashless_payment' => 'required|integer',
            'working_hours_sec' => 'required|integer',
            'assembling' => 'integer',
        ]);

        $salary = new Salary();
        $salary->month_num = $request->month_num;
        $salary->user_id = $request->user_id;
        $salary->cashless_payment = $request->cashless_payment;

        $wha = ($request->working_hours_sec)/3600 ; // wha - working hours amount. Converting working seconds to hours.
        $hour_rate = 42;
        $dep_index = 1.2; // dep_index - department index.
        $pers_index = 0.2; // $pers_index - personal index.
        $total_index = $dep_index + $pers_index;
        $working_hours = $wha * $total_index*$hour_rate;
        $salary->working_hours = $working_hours;

        $assembl_price = 75; // assembling prise for 1 unit.
        $assemling = ($request->assembling)*$assembl_price;
        $salary->assembling = $assemling;

        if( $request->user_id == 3){
            $wage_rate = 4000;
        }else{
            $wage_rate = 3200;
        }

        $wage = $wage_rate + $working_hours;
        $diff = $wage-($request->cashless_payment);

        $cash = $assemling + $diff;
        $salary->cash = $cash;
        
        $total = $cash + ($request->cashless_payment);
        $salary->total = $total;

        $salary->save();

        Session::flash('success', 'Зарплата расчитана успешно');

        return redirect()->route('home');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salary $salary
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $salary = Salary::find($id);
        return view()->route('salary.show')->with('salary', $salary);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salary $salary
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $salary) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Salary              $salary
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary $salary) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salary $salary
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary) {
        //
    }
}
