<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Alert;

class BlogController extends Controller
{
    public function list(){
        $blogData=Blog::select('id','title','description','image','writer')
        ->orderBy('id','desc')
        ->paginate(3);
        return view('list',compact('blogData'));
    }

    //create blog
    public function create(Request $request){
        $this->ValidationCheck($request);
        $data=$this->RequestBlogData($request);

     
        
        if($request->hasFile('image')){
            
            $imageName=uniqid().':aungpyae:'.$request->file('image')->getClientOriginalName();
            
            $request->file('image')->move(public_path().'/blogImages/',$imageName);
            $data['image']=$imageName;

            

        } 
        Blog::create($data);
        Alert::success('Blog created ', 'Blog Created successfully');

        return back();
        
    }

    //delete
    public function delete($id){
        $data=Blog::find($id);
        $oldImage=$data->image;

    if(file_exists(public_path().'/blogImages/'.$oldImage)){
       unlink(public_path().'/blogImages/'.$oldImage);
    }
    Blog::where('id',$id)->delete();
    Alert::success('Blog deleted ', 'Blog deleted successfully');

    return back();
    }


    //updatePage
    public function updatePage($id){
        $updateData=Blog::find($id);
        return view('updatePage',compact('updateData'));
    }
    //updateBlogData
    public function updateBlog($id,Request $request){
        $data=Blog::find($id);
        
    }
        
    
    
    

    //Private

    //validation check
    private function ValidationCheck(Request $request){
         
        $validationRule=[
            'title'=>'required|max:20|min:3',
            'description'=>'required',
            'writer'=>'required|min:2',
            'image'=>'required',
        ];
        $validationMessage=[
            'title.required'=>'Please enter title',
            'title.max'=>'Title must be less than 20 characters',
            'title.min'=>'Title must be at least 3 characters',
            'description.required'=>'Please enter description',
            'writer.required'=>'Please enter writer name',
            'writer.min'=>'Writer name must be at least 2 characters',
            'image.required'=>'Please upload an image',
        ];
        $request->validate($validationRule,$validationMessage);
        

    }

    //request blog data
    private function RequestBlogData(Request $request){
        return[
            'title'=>$request->title,
            'description'=>$request->description,
            'writer'=>$request->writer
        ];
    }
}
