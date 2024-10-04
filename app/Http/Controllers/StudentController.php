<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index()
    {
        $data = Student::get();
       // return $data;   
       return view('students',compact('data'));
    }
    public function addstudent()
    {
        return view('addstudent');
    }

    public function savestudent(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'lastname'=>'required',
            'phone'=>'required',
        ]);
        $name=$request->name;
        $lastname=$request->lastname;
        $phone=$request->phone;
        $stu = new Student();
        $stu->name=$name;
        $stu->lastname=$lastname;
        $stu->phone=$phone;
        $stu->save();
        return redirect()->back()->with('success','Student Added Successfully');
    }
    public function editstudent($id){

        $data = Student::where('id',$id)->first();
        return view('editstudent',compact('data'));

    }

    public function updatestudent(Request $request){
        $request->validate([
            'name'=>'required',
            'lastname'=>'required',
            'phone'=>'required',
        ]);
        $id=$request->id;
        $name=$request->name;
        $lastname=$request->lastname;
        $phone=$request->phone;
        Student::where('id',$id)->update([
            'name'=>$name,
            'lastname'=>$lastname,
            'phone'=>$phone
        ]);
        return redirect()->back()->with('success','Student Updated Successfully');

    }
    public function deletestudent($id){
        Student::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Student Deleted Successfully');
 
    }
    
    public function xmldata(){
        return view('xmlstudents');
    }

    public function savexmldata(Request $req) {
        if (!empty($req->file('user_file'))) {
            $xmlDataString = file_get_contents($req->file('user_file'));
            $xmlObject = simplexml_load_string($xmlDataString);
            $json = json_encode($xmlObject);
            $phpDataArray = json_decode($json, true);
            if (count($phpDataArray['contact']) > 0) {
                $dataArray = array();
            }
            foreach ($phpDataArray['contact'] as $index => $data) {
                // check duplicate phone 
                $userDetails = Student::where(array('phone' => $data['phone']))->first();
                if (empty($userDetails)) {
                    $dataArray[] = [
                        "name" => $data['name'],
                        "lastName" => $data['lastName'],
                        "phone" => $data['phone']
                    ];
                }
            }
            Student::insert($dataArray);
        }

    }

}
