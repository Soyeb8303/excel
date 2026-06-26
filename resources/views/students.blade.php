<!DOCTYPE html>
<html>
<head>

<title>Student Management</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<h2>Pls Soyeb Ahamad Add Student</h2>

@if(session('success'))
<div class="alert alert-success" id="alert-message">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger" id="alert-message">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('students.store') }}" method="POST">

@csrf

<div class="mb-3">

<label>Name</label>

<input type="text" name="name" class="form-control">

</div>

<div class="mb-3">

<label>Email</label>

<input type="email" name="email" class="form-control">

</div>

<div class="mb-3">

<label>Contact</label>

<input type="text" name="contact" class="form-control">

</div>

<div class="mb-3">

<label>Course</label>

<input type="text" name="course" class="form-control">

</div>

<button class="btn btn-primary">
Save
</button>

<!-- <a href="{{ route('students.export') }}" class="btn btn-success">
Download Excel
</a> -->

</form>



<form action="{{ route('students.import') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="row mb-3">

        <div class="col-md-6">
            <input type="file"
                   name="file"
                   class="form-control"
                   required>
        </div>

        <div class="col-md-3">
            <button class="btn btn-warning">
                Import Excel
            </button>
        </div>

        <div class="col-md-3">
            <a href="{{ route('students.export') }}"
               class="btn btn-success">
                Download Excel
            </a>
        </div>

    </div>

</form>


<hr>

<table class="table table-bordered mt-4">

<thead>

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Contact</th>
<th>Course</th>

</tr>

</thead>

<tbody>

@foreach($students as $student)

<tr>

<td>{{ $student->id }}</td>

<td>{{ $student->name }}</td>

<td>{{ $student->email }}</td>

<td>{{ $student->contact }}</td>

<td>{{ $student->course }}</td>

</tr>

@endforeach

</tbody>

</table>

</div>




<script>
document.addEventListener("DOMContentLoaded", function () {

    const alertBox = document.getElementById("alert-message");

    if (alertBox) {
        setTimeout(function () {
            alertBox.style.display = "none";
        }, 3000); // 3000 ms = 3 seconds
    }

});
</script>

</body>
</html>