<?php

namespace App\Http\Controllers;

use App\Application\Requests\Website\Contact\AddRequestContact;
use App\Area;
use App\Blog;
use App\House;
use App\Image;
use App\Mail\ContactUs;
use App\Message;
use Illuminate\Http\Request;
use App\About;
use App\Setting;
use App\ContactMessage;
use Alert;
use Illuminate\Support\Facades\Redirect;
use Validator;
//use Auth;
use DB;
use Session;

session_start();

use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::select('address', 'phone', 'email', 'details')
            ->get();
        $area = Area::select('area_name', 'area_id')
            ->get();
//        dd($area);
        return view('index', ['about' => $about, 'area' => $area]);
    }

    public function contactUsView()
    {
        $about = About::select('address', 'phone', 'email', 'details')
            ->get();
        return view('contact', ['about' => $about]);
    }

    public function sendEmail(Request $request)
    {
//        dd($request);
        Mail::to('myEmail@gmail.com')->send(new ContactUs($request));
        alert()->success("your message has been sent", "success");
        return redirect()->back();
    }

    public function messages()
    {
        $messages = Message::select()
            ->join('user', 'notes.user_id', '=', 'user.user_id')
            ->get();
//        dd($messages);
        return view('messages', ['messages' => $messages]);
    }

    function checklogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ]);

        $email = $request->email;
        $password = $request->password;
        $result = DB::table('user')->
        where('email', $email)->
        where('password', $password)->first();
//        dd($result);
        if ($result) {
            Session::put('name', $result->email);
            Session::put('password', $result->password);
            Session::put('user_id', $result->user_id);
            return Redirect::to('/');
        } else {
            Session::put('error', 'البريد الألكتروني أو اسم المسخدم خطأ');
            return Redirect::to('/login');
        }
    }

    public function addHousePage()
    {
        if (!empty(Session::get('name')) and !empty(Session::get('password'))) {

            $area = Area::select('area_name', 'area_id')
                ->get();
            $options = $area->pluck('area_name', 'area_id')->toArray();
//            dd($options);
//            $all_company_info =  DB::table('tbl_company')->get();
//            $manage_company = view('pages.layout_content')->with('all_company_info',$all_company_info);
            return view('addHouse', ['options' => $options]);
        } else {
            return Redirect::to('/login');
        }

    }


    public function logout()
    {

        if (!empty(Session::get('name')) and !empty(Session::get('password'))) {
            Session::flush();
            return Redirect::to('/login');
        } else {
            return Redirect::to('/login');
        }
    }


    public function saveHouse(Request $request)
    {
        $input = $request->all();
//        dd($input);


//        if (!isset($input['blog_slider'])) {
//            $input['blog_slider']='0';
//        }
//
       $id = House::insertGetId(
            ['size' => $input['size'],
                'user_id'=> Session::get('user_id'),
                'num_of_rooms' => $input['num_of_rooms'],
                'floor' => $input['floor'],
                'address' => $input['address'],
                'cladding_level' => $input['cladding_level'],
                'price' => $input['price'],
                'area_id' => (int)$input['area'],
                'details' => $input['details']]);

        if (isset($input['image_url'])) {
            foreach ($input['image_url'] as $key => $value) {
               $image = $this->upload($value);
                Image::insert(
                    ['image' => $image,
                        'house_id' => $id]);
            }
        } else {
            $input['image_url'] = '';
        }
        return back();

    }

    public function upload($file)
    {
        $extension = $file->getClientOriginalExtension();
        $sha1 = sha1($file->getClientOriginalName());
        $filename = date('Y-m-d') . "_" . $sha1 . "." . $extension;
        $path = public_path('img/');
        $file->move($path, $filename);
        return 'img/' . $filename;

    }

    public function allHouses()
    {
        $allHouses = House::select()
            ->where('status', '0')
//            ->join('images', 'house.house_id', '=', 'images.house_id')
//            ->distinct('house_id')
            ->get();

        foreach ($allHouses as $key => $value) {
            $image = Image::select()
                ->where('house_id', $value->house_id)
                ->first();
            $value->image = $image->image;
        }
//        dd($allHouses);
        return view('allHouses', ['allHouses' => $allHouses]);
    }


    public function search(Request $request){


        $text = $request->input('text_search');
        $allHouses = House::where('size' , 'like' , '%'.$text.'%')
            ->where('status', '0')
            ->orWhere('num_of_rooms' , 'like' , '%'.$text.'%')
            ->orWhere('floor' , 'like' , '%'.$text.'%')
            ->orWhere('address' , 'like' , '%'.$text.'%')
            ->orWhere('cladding_level' , 'like' , '%'.$text.'%')
            ->orWhere('price' , 'like' , '%'.$text.'%')
            ->orWhere('details' , 'like' , '%'.$text.'%')
            ->get();

        foreach ($allHouses as $key => $value) {
            $image = Image::select()
                ->where('house_id', $value->house_id)
                ->first();
            $value->image = $image->image;
        }
        return view('allHouses', ['allHouses' => $allHouses]);
    }


    public function viewHouse($house_id)
    {

        $viewHouse = House::select()
            ->where('status', '0')
            ->where('house.house_id', $house_id)
            ->join('images', 'house.house_id', '=', 'images.house_id')
//            ->distinct('house_id')
            ->get();
//        dd($viewHouse);


//        $viewHouse = House::select()
//            ->where('house_id', $house_id)
//            ->get();
        return view('viewHouse', ['viewHouse' => $viewHouse]);
    }

    public function buy(Request $request)
    {


//        dd($request);
        if (!empty(Session::get('name')) and !empty(Session::get('password'))) {

            $house['status'] = '1' ;
            House::where('house_id', $request->house_id)
                ->update($house);


            return Redirect::to('allHouses');
        } else {
            return Redirect::to('/login');
        }

    }

}
