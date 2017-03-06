<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB ;

use App\Employee ;

use App\User ;

use App\Career ;

use Datatables ;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    
       $employees = Employee::all();
         $careers=Career::lists('careerName', 'id');

       return view('admin.employees.index')->with('employees',$employees)
                                           ->with('careers', $careers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //$careers = \DB::table('careers')->lists('careerName', 'id');
        $careers=Career::lists('careerName', 'id');
        return view('admin.employees.index')->with('careers', $careers)->with('employees',$employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
      
        $career_id=$request->input('career_id');
        $employeeFirstName=$request->input('employeeFirstName');
        $employeeMiddleName=$request->input('employeeMiddleName');
        $employeeLastName=$request->input('employeeLastName');
        $employeeBrithday=$request->input('employeeBrithday');
        $employeeFrom=$request->input('employeeFrom');
        $employeeTo=$request->input('employeeTo');
        $employeeMobile=$request->input('employeeMobile');
        $employeePhoneHome=$request->input('employeePhoneHome');
        $employeePhoneJob=$request->input('employeePhoneJob');
        $employeeAddress=$request->input('employeeAddress');
        $employeeCity=$request->input('employeeCity');
        $employeeNational=$request->input('employeeNational');
        $employeeSalary=$request->input('employeeSalary');
       


       
        $new_employee = New Employee ;
       
        $new_employee->career_id=$career_id;
        $new_employee->employeeFirstName=$employeeFirstName;
        $new_employee->employeeMiddleName=$employeeMiddleName;
        $new_employee->employeeLastName=$employeeLastName;
        $new_employee->employeeBrithday=$employeeBrithday;
        $new_employee->employeeFrom=$employeeFrom;
        $new_employee->employeeTo=$employeeTo;
        $new_employee->employeeMobile=$employeeMobile;
        $new_employee->employeePhoneHome=$employeePhoneHome;
        $new_employee->employeePhoneJob=$employeePhoneJob;
        $new_employee->employeeAddress=$employeeAddress;
        $new_employee->employeeCity=$employeeCity;
        $new_employee->employeeNational=$employeeNational;
        $new_employee->employeeSalary=$employeeSalary;
       
        $new_employee->save();





        return redirect ('/adminpanel/employees') ;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       

      $orders= DB::table('orders')->join('employees','employees.id','=','orders.employee_id')
                              ->select('orders.id','orderNote','orderOutPayment','orderPayment','fromto','employee_id','orderDate'
                                ,'backMoney','getMoney')
                              ->where('orders.employee_id','=',$id)
                              ->get();

 $employees=DB::table('employees')
                        ->select('id','employeeFirstName','employeeLastName')
                        ->where('employees.id','=',$id)
                        ->get();

 

                                 $total = 0 ;
                                 $totalAllMoney=0;
                                 $totalGetMoney=0;
                        foreach( $orders as $order){

                          $totalGetMoney+= $order->getMoney ;  
             
                          $totalAllMoney+= $order->orderOutPayment ;  

                          $total  = $totalAllMoney-$totalGetMoney ;
                           
                        }

         return view('admin.employees.debt')->with('orders',$orders)->with('employees',$employees);

         //->with('moneyLimit',$moneyLimit);    

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id , Employee $employee)
    {
        $employee = $employee->find($id);
        $careers=Career::lists('careerName', 'id');

        return view('admin.employees.edit')->with('employee',$employee)->with('careers', $careers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id ,Employee $employee)
    {

        $career_id=$request->input('career_id');
        $employeeFirstName=$request->input('employeeFirstName');
        $employeeMiddleName=$request->input('employeeMiddleName');
        $employeeLastName=$request->input('employeeLastName');
        $employeeBrithday=$request->input('employeeBrithday');
        $employeeFrom=$request->input('employeeFrom');
        $employeeTo=$request->input('employeeTo');
        $employeeMobile=$request->input('employeeMobile');
        $employeePhoneHome=$request->input('employeePhoneHome');
        $employeePhoneJob=$request->input('employeePhoneJob');
        $employeeAddress=$request->input('employeeAddress');
        $employeeCity=$request->input('employeeCity');
        $employeeNational=$request->input('employeeNational');
        $employeeSalary=$request->input('employeeSalary');

        
          $employee = Employee::find($id) ;

         $employee->career_id=$career_id;
         $employee->employeeFirstName=$employeeFirstName;
         $employee->employeeMiddleName=$employeeMiddleName;
         $employee->employeeLastName=$employeeLastName;
         $employee->employeeBrithday=$employeeBrithday;
         $employee->employeeFrom=$employeeFrom;
         $employee->employeeTo=$employeeTo;
         $employee->employeeMobile=$employeeMobile;
         $employee->employeePhoneHome=$employeePhoneHome;
         $employee->employeePhoneJob=$employeePhoneJob;
         $employee->employeeAddress=$employeeAddress;
         $employee->employeeCity=$employeeCity;
         $employee->employeeNational=$employeeNational;
         $employee->employeeSalary=$employeeSalary;
         $employee->save() ;




         return redirect ('/adminpanel/employees');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Employee $employee)
    {
        $employee->find($id)->delete();

        return redirect('/adminpanel/employees');
    }

    public function printPreview()  
    {  
       

       $employees = Employee::all();

     
     
      return view ('admin.employees.print')->with('employees',$employees)  ;
    }  

  
    public function printDebtPreview($id)  
     
    {
         $orders= DB::table('orders')->join('employees','employees.id','=','orders.employee_id')
                              ->select('orders.id','orderNote','orderOutPayment','orderPayment','fromto','employee_id','orderDate'
                                ,'backMoney','getMoney')
                              ->where('orders.employee_id','=',$id)
                              ->get();

 $employees=DB::table('employees')
                        ->select('employeeFirstName','employeeLastName')
                        ->where('employees.id','=',$id)
                        ->get();

 

                                 $total = 0 ;
                                 $totalAllMoney=0;
                                 $totalGetMoney=0;
                        foreach( $orders as $order){

                          $totalGetMoney+= $order->getMoney ;  
             
                          $totalAllMoney+= $order->orderOutPayment ;  

                          $total  = $totalAllMoney-$totalGetMoney ;
                           
                        }


         return view('admin.employees.printdebt')->with('orders',$orders)->with('employees',$employees);
                                                 
    }



}

