@extends('layout.master')

@section('content')
   <div class="container">
    <div class="row">
     <div class="col-4 mt-5">

                @session('createSuccess')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('createSuccess') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endsession
                 @session('deleteSuccess')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('deleteSuccess') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endsession
        




       <form action="{{ route('createBlog') }}" method="post" enctype="multipart/form-data" class="g-3">
        @csrf
             <div class="mb-3">
                <img src="" alt="" class="w-50 img-thumbnail rounded " id="outputImage">
                <input type="file" name="image" id="" class="form-control mt-3 @error('image') is-invalid @enderror" onchange="previewImage(event)">
                  @error('image')
                 <small class="text-danger invalid-feedback">{{ $message }}</small>
             @enderror
             </div>
           
           <div class="mb-3">
             <input type="text" name="title" id="" value="{{ old('title') }}" placeholder="Title" class="form-control @error('title') is-invalid @enderror">
              @error('title')
               <small class="text-danger invalid-feedback">{{ $message }}</small>
           @enderror
           </div>
          
           <div class="mb-3">
            <textarea name="description" id=""  placeholder="Description" rows="10"  class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description')
               <small class="text-danger invalid-feedback">{{ $message }}</small>
           @enderror
           </div>
           
           <div class="mb-3">
            <input type="text" name="writer" id="" value="{{ old('writer') }}" placeholder="Writer" class="form-control @error('writer') is-invalid @enderror">
            @error('writer')
               <small class="text-danger invalid-feedback">{{ $message }}</small>
           @enderror
           </div>
           <div class="mb-3">
            <input type="submit" value="Create" class="btn btn-success ">
           </div>
       
       </form>
     </div>

     <div class="col mt-3">
        <div>{{$blogData->links()}}</div>
         <div class="row"  >
             @foreach ($blogData as $item)
          <div class="col-4">
            <div class="card mt-3" style="width: 18rem;">
             <img src="{{asset('blogImages/'.$item->image)}}" class="card-img-top w-100 img-thumbnail p-2" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</h5>
                    <p class="card-text">{{ Str::words($item->description, 5, '...') }}</p>
                    <p class="card-text">{{$item->writer}}</p>
                    <a href="{{route('updatePage',$item->id)}}" class="btn btn-primary">Update</a>
                    <a href="{{route('deleteBlog',$item->id)}}" class="btn btn-danger">Delete</a>
                </div>
          </div>
          </div>
         @endforeach
         </div>
     </div>
    </div>
   </div>
@endsection 