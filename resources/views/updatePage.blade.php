@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">

        <a href="{{route('listBlog')}}" class="btn btn-secondary col-2 mt-2">Go to List Page</a>
            <form action="{{route('updateBlog',$updateData->id)}}" method="post" enctype="multipart/form-data">
                @csrf
             <div class="row">
                    <div class="col-4 mt-5">
                     <img src="{{asset('blogImages/'.$updateData->image)}}" alt="" class="w-50 img-thumbnail rounded " id="outputImage">
                     <input type="file" name="image" id="" class="form-control mt-3 @error('image') is-invalid @enderror" onchange="previewImage(event)">
                 
                </div>
                <div class="col-6 mt-5">
                    <div>
                        <input type="text" value="{{ $updateData->title}}" name="title" id="" class="form-control @error('title') is-invalid @enderror mt-2">
                    </div>
                    <div>
                        <textarea name="description" id="" rows="10" class="form-control @error('description') is-invalid @enderror mt-2">{{ $updateData->description}}</textarea>
                    </div>
                    <div>
                        <input type="text" value="{{ $updateData->writer}}" name="writer" id="" class="form-control @error('writer') is-invalid @enderror mt-2">
                    </div>
                    <div>
                     <input type="submit" value="update" class="btn btn-success mt-3">
                    
                    </div>
                </div>
             </div>
            </form>
        </div>
    </div>
@endsection