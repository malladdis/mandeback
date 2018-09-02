<?php

namespace App\Api\V1\Controllers;

use App\DatePeriodGenerator;
use Dingo\Api\Http\Request;

class DatePeriodGeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DatePeriodGenerator  $datePeriodGenerator
     * @return \Illuminate\Http\Response
     */
    public function show($frequency)
    {

        switch ($frequency){
            case 'quarter':
               return $this->generateQuarter();
                break;
            case "biannual":
                return $this->generateBiAnnual();
                break;
            case "annual":
                return  $this->generateAnnual();
                break;
            case "monthly":
                return $this->generateMonthly();
                break;


        }
    }

    public function generateQuarter($year){
        $response="";

        $dateTime=new \DateTime($year);
        $newDate = ($dateTime === null) ? new DateTime() : clone $dateTime;
        $month = $newDate->format('n') ;
        if ($month < 4) {
            $response="Q1 ".$newDate->format('Y');
        } elseif ($month > 3 && $month < 7) {
            $response="Q2 ".$newDate->format('Y');
        } elseif ($month > 6 && $month < 10) {
            $response="Q3 ".$newDate->format('Y');
        } elseif ($month > 9) {
            $response="Q4 ".$newDate->format('Y');
        }

        return $response;
    }

    public function generateBiAnnual(){
        $curMonth = date("m", time());
        $curQuarter = ceil($curMonth/2);
        if($curQuarter<=6){
            $current=array();
            $currentValue="H1 ".date('Y');
            array_push($current,$currentValue);
            return response()->json(['stat'=>true,'message'=>'retrieve','data'=>$current]);
        }else{
            $current=array();
            $currentValue="H2 ".date('Y');
            array_push($current,$currentValue);
            return response()->json(['stat'=>true,'message'=>'retrieve','data'=>$current]);
        }

    }

    public function generateAnnual($year){
        $response="";
        $dateTime=new \DateTime($year);
        $newDate = ($dateTime === null) ? new DateTime() : clone $dateTime;
        return $newDate->format('Y');

    }

    public function generateMonthly($year){
        $dateTime=new \DateTime($year);
        $newDate = ($dateTime === null) ? new DateTime() : clone $dateTime;
        return $newDate->format('n') ;

    }

    public function past($year,$frequency){
        switch ($frequency){
            case 'quarter':
                return $this->generatePastQuarter($year);
                break;
            case "biannual":
                echo $this->generateBiAnnual($year);
                break;
            case "annual":
                echo  $this->generateAnnual($year);
                break;
            case "monthly":
                echo $this->generateMonthly($year);
                break;
        }
    }

    public function generatePastQuarter($year){
        $response="";
        $responseJSON=array();
        $dateTime=new \DateTime($year);
        $newDate = ($dateTime === null) ? new DateTime() : clone $dateTime;
        $month = $newDate->format('n') ;
        if ($month < 4) {
            $response="Q1 ".$newDate->format('Y');
            $responseJSON=array();
        } elseif ($month > 3 && $month < 7) {
            $response="Q2 ".$newDate->format('Y');
            array_push($responseJSON,"Q1 ".$newDate->format('Y'));
        } elseif ($month > 6 && $month < 10) {
            array_push($responseJSON,"Q1 ".$newDate->format('Y'));
            array_push($responseJSON,"Q2 ".$newDate->format('Y'));

        } elseif ($month > 9) {
            array_push($responseJSON,"Q1 ".$newDate->format('Y'));
            array_push($responseJSON,"Q2 ".$newDate->format('Y'));
            array_push($responseJSON,"Q3 ".$newDate->format('Y'));
        }
        return $responseJSON;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DatePeriodGenerator  $datePeriodGenerator
     * @return \Illuminate\Http\Response
     */
    public function edit(DatePeriodGenerator $datePeriodGenerator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DatePeriodGenerator  $datePeriodGenerator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DatePeriodGenerator $datePeriodGenerator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DatePeriodGenerator  $datePeriodGenerator
     * @return \Illuminate\Http\Response
     */
    public function destroy(DatePeriodGenerator $datePeriodGenerator)
    {
        //
    }
}
