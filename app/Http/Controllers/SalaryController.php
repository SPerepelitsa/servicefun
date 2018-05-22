<?php

namespace App\Http\Controllers;

use App\Salary;
use App\User;
use App\Month;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class SalaryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaryAll = Salary::orderByDesc('month_id')->get();

        return view('salary.index')->with('salaryAll', $salaryAll);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $months = Month::all();

        $salaryUsers = User::select(['id', 'name'])->whereIn('email', ['roma@servicefun.com', 'admin@servicefun.com'])->get();

        return view('salary.create')->with(compact('months', 'salaryUsers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'month_id'          => 'required|integer',
            'user_id'           => 'required|integer',
            'working_hours_sec' => 'required|max:999999|integer',
            'assembling'        => 'required|integer',
        ]);

        $salary = new Salary();
        $salary->month_id = $request->month_id;
        $salary->user_id = $request->user_id;

        $workingHoursAmount = ($request->working_hours_sec) / 3600;
        $hourRate = 42;
        $departmentIndex = 1.2;
        $personalIndex = 0.2;
        $totalIndex = $departmentIndex + $personalIndex; // 1.4
        $workingHours = $workingHoursAmount * $totalIndex * $hourRate;
        $salary->working_hours = $workingHours;

        if ($request->assembling > 0) {
            $assemblingPrice = 75;
            $assembling = ($request->assembling) * $assemblingPrice;
        } else {
            $assembling = 0;
        }
        $salary->assembling = $assembling;

        if ($request->user_id == 3) {
            $wage_rate = 4000;
        } else {
            $wage_rate = 3200;
        }

        $wage = $wage_rate + $workingHours;
        $tax = 0.195; // 19.5% tax
        $cashlessPayment = $wage - ($wage * $tax);
        $salary->cashless_payment = $cashlessPayment;

        $total = $assembling + $cashlessPayment;
        $salary->total = $total;

        $salary->save();

        Session::flash('success', 'Зарплата расчитана успешно');

        return redirect()->route('salary.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salary $salary
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
    public function edit(Salary $salary)
    {
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
    public function update(Request $request, Salary $salary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salary $salary
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {
        //
    }
}
