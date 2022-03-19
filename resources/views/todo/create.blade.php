<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Create data todolist</title>
</head>

<body>
    <div class="container mt-3">
        <br>
        <h2 id="ftd">Tambah Todo</h2>
        <hr>
        <br>
        @if (isset($todo))
            <form action="{{ url('todo/store-todolist/' . $todo->id) }}" enctype="multipart/form-data" method="POST">
        @endif
        <form action="{{ url('todo/store-todolist') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <strong>Table</strong> Form
                </div>
                <div class="card-body card-block">
                    <div class="form-group"><label class="form-control-label"><strong>Name:</strong></label>
                        <input type="text" name="name" placeholder="Please input your name" class="form-control"
                            value="{{ isset($todo) ? $todo->name : old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group"><label class="form-control-label"><strong>Age:</strong></label>
                        <input type="number" name="age" placeholder="Please input your age" class="form-control"
                            value="{{ isset($todo) ? $todo->age : old('age') }}">
                        @error('age')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group"><label class="form-control-label"><strong>Gender:</strong></label>
                        <input type="text" name="gender" placeholder="Please input your gender" class="form-control"
                            value="{{ isset($todo) ? $todo->gender : old('age') }}">
                        @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group"><label class="form-control-label"><strong>Address:</strong></label>
                        <textarea type="text" name="address" placeholder="Please input your address" class="form-control"
                            >{{ isset($todo) ? $todo->address : old('address') }}</textarea>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Anda sudah benar ?')">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <a href="{{ url('/todo') }}" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i>
                        Back</a>
                </div>
            </div>

        </form>
    </div>
</body>

</html>
