<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Slider;

class SliderController extends Controller
{
     public function view(){
         $data['alldata'] = Slider::all();
         return view('backend.slider.view-slider',$data);
     }
     public function add(){
        return view('backend.slider.add-slider');
   }

   public function store(Request $request){
            $this->validate($request,[
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'sort_desc' => 'required',
                'long_desc' => 'required'

            ]);

            $data = new Slider();
            $img = $request->file('image');
            if($img){
                $filename = date('YmdHi').$img->getClientOriginalName();
                $img->move(public_path('upload/slider_image'),$filename);
                $data['image'] =$filename;
            }
            $data->sort_desc = $request->sort_desc;
            $data->long_desc = $request->long_desc;
            $data->save();
            return redirect()->route('slider.view')->with('message','save info successfully');

    }

    public function edit($id){
         $editdata =Slider::find($id);
         return view('backend.slider.add-slider',compact('editdata'));
    }

    public function update(Request $request,$id){
                $this->validate($request,[
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                    'sort_desc' => 'required',
                    'long_desc' => 'required'

                ]);

                $data=Slider::find($id);
                $img = $request->file('image');
                if($img){
                    $filename = date('YmdHi').$img->getClientOriginalName();
                    $img->move(public_path('upload/slider_image'),$filename);
                    if(file_exists('public/upload/slider_image/'.$data->image) AND !empty($data->image)){
                        unlink('public/upload/slider_image/'.$data->image);
                   }
                    $data['image'] =$filename;
                }
                $data->sort_desc = $request->sort_desc;
                $data->long_desc = $request->long_desc;
                $data->save();
            return redirect()->route('slider.view')->with('message','update info successfully');

     }

     public function delete($id){
         $data = Slider::find($id);
         if(file_exists('public/upload/slider_image/'.$data->image) AND !empty($data->image)){
            unlink('public/upload/slider_image/'.$data->image);
          }
         $data->delete();
         return redirect()->route('slider.view')->with('message','Delete Data successfully');

     }
}
