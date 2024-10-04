<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-md-12">
            <h2>Add Student</h2>
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
            @endif

    <form method="post" action="{{url('savestudent')}}">
        @csrf
        <div class="col-md-6">
            <label for="form-lebel">Name</label> 
            <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{old('name')}}">
            @error('name')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="form-lebel">Last Name</label> 
            <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name"  value="{{old('lastname')}}">
            @error('lastname')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="form-lebel">Phone</label> 
            <input type="text" class="form-control" name="phone" placeholder="Enter Phone"  value="{{old('phone')}}">
            @error('phone')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror
        </div><br>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-danger" href="{{url('students')}} ">Back </a>
    </form>
        </div>
    </div>

</div>
</body>
</html>