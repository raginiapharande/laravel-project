<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>
<div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-md-12">
            <h1>Student Lists</h1><br>
            <div> <a class="btn btn-primary"  href="{{url('xmldata')}}">Import XML Data </a></div><br>
            <div> <a class="btn btn-primary"  href="{{url('addstudent')}}">Add Student </a></div><br>
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
            @endif
            <table style="width:100%"  border-collapse: collapse; border="1px">
            <tr>
                <th>Id</th> 
                <th>Name</th>
                <th>Lastname</th>
                <th>Phone</th>
                <th> Edit| Delete</th>
                
            </tr>
            @php
                $i=1;
            @endphp
            @foreach($data as $row)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->lastname}}</td>
                <td>{{$row->phone}}</td>
                <td><a  href="{{url('editstudent/'.$row->id)}}">Edit </a> | <a  href="{{url('deletestudent/'.$row->id)}}">Delete </a></td>
            </tr>
            @endforeach
            </table>

        </div>
    </div>

</div>
</body>
</html>