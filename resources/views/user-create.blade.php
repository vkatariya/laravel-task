<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mudurunu Task Create</title>
    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>


    {{-- <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data"> --}}
        {{-- @csrf
        <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
            <div class="custom-file text-left">
                <input type="file" name="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
        <button class="btn btn-primary">Import data</button>
        <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a>
    </form> --}}

    <div class="cotainer mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Mudurunu Laravel Task</h3>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                                    autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email_address" class="form-control"
                                    name="email" autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control"
                                    name="password">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Mobile" id="mobile" class="form-control" name="mobile">
                                @if ($errors->has('mobile'))
                                <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="State" id="states" class="form-control" name="states">
                                @if ($errors->has('states'))
                                <span class="text-danger">{{ $errors->first('states') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <textarea type="text" placeholder="Paragraph" id="paragraph" class="form-control"
                                    name="paragraph"></textarea>
                                @if ($errors->has('paragraph'))
                                <span class="text-danger">{{ $errors->first('paragraph') }}</span>
                                @endif
                            </div>


                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>

</html>