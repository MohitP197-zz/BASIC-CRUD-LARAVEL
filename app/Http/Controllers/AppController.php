<?php

namespace App\Http\Controllers;

use App\News;
use App\UserAccounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    protected $data=[];

    public function __construct()
    {
        $this->data['title']='My project';
    }

    public function index(){

        /*userData=>UserAccounts::all();
        $userData=UserAccounts::orderBy('id', 'desc')->get();*/
        $userData=UserAccounts::orderBy('id', 'desc')->paginate();//one time ma 5 records ko lagi..paginate use..teti choti nai paste garney
        //$newsData=News::all();
        return view('welcome',compact('userData'));
    }
    public function about(){
        $this->data['title']='About';
        return view('about', $this->data);
    }
    public function contact(){

        return view('contact', $this->data);
    }

    public function addUser(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->back();

        }
        if($request->isMethod('post')){
            $this->validate($request, [
                'username'=>'required|min:3|max:50',
                'email'=>'email',
                'password'=>'required|confirmed|min:6',
//                'image'=>'required|mimes:jpeg,jpg,gif,png',
            ]);
            $data['username']=$request->username;
            $data['email']=$request->email;
            $data['password']=bcrypt($request->password);
            if($request->hasFile('image'))
            {
                $image=$request->file('image');
                $ext=$image->getClientOriginalExtension();//extracts the extension of a file
                $imageName=str_random().'.'.$ext;     //randomly generates string value
                $uploadPath=public_path('lib/images');
                if(!$image->move($uploadPath, $imageName))
                {
                    return redirect()->back;
                }

                $data['image']=$imageName;//data pathauda image ko name jada
                
            }

            if(UserAccounts::create($data)){
                return redirect()->route('home')->with('success','Record is inserted');
            }


        }

    }

    public function deleteUser(Request $request)
    {
        $id = $request->user_id;
        if ($this->deleteImage($id) && UserAccounts::WHERE('id',$id)->delete($id))
        {
            return redirect()->route('home')->with('success','Record is deleted.');
        }
    }

    public function deleteImage($id)
    {
        $data=UserAccounts::findOrFail($id);
        $imageName=$data->image;
        $imageDeletePath=public_path('lib/images/'.$imageName);
        
        if(file_exists($imageDeletePath))
        {
            return unlink($imageDeletePath);
        }
        return true;
    }

    public function editUser(Request $request)
    {
        $id=$request->user_id;
        $user_data=UserAccounts::findOrFail($id);
        return view ('edit_user', compact('user_data'));
    }




    public function editAction(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:3|max:50',
            'email' => 'email',
            //'image' => 'mimes:jpeg,jpg,png,gif',

        ]);

        $id = $request->user_id;
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $ext=$image->getClientOriginalExtension();//extracts the extension of a file
            $imageName=str_random() . '.' . $ext;     //randomly generates string value
            $uploadPath=public_path('lib/images');
            if($this->deleteImage($id) && $image->move($uploadPath, $imageName)){
                $data['image']=$imageName;
            }
            //$data['image']=$imageName;//data pathauda image ko name jada

        }
        if(UserAccounts::where('id', $id)->update($data))
        {
            return redirect()->route('home')->with('success', 'Record is edited');
        }

    }

}
