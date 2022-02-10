<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Import & Export </title>
</head>

<body>
    <div class="container my-5">
        <h1 class="fs-5 fw-bold text-center">Import & Export CSV </h1>
        <div class="row">
            <div class="d-flex my-2">
                <a href="{{ route('sample') }}" class="btn btn-warning me-1">Sample Data Download</a>
                <a href="fileExport" class="btn btn-primary me-1">Export Data</a>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Import Data
                </button>
            </div>
            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (isset($errors) && $errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }}
                @endforeach
            </div>
            @endif

            @if (session()->has('failures'))

            <table class="table table-danger">
                <tr>
                    <th>Row</th>
                    <th>Attribute</th>
                    <th>Errors</th>
                    <th>Value</th>
                </tr>

                @foreach (session()->get('failures') as $validation)
                <tr>
                    <td>{{ $validation->row() }}</td>
                    <td>{{ $validation->attribute() }}</td>
                    <td>
                        <ul>
                            @foreach ($validation->errors() as $e)
                            <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        {{ $validation->values()[$validation->attribute()] }}
                    </td>
                </tr>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </table>

            @endif
            {{-- @if ($errors->any())

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Following errors exists in your Excel file
                <ol>
                    @foreach ($errors->all as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ol>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Paragraph</th>
                        <th scope="col">States</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i =0;
                    @endphp
                    @foreach ($users as $key => $item)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->password }}</td>
                        <td>{{ $item->mobile }}</td>
                        <td>{{ $item->paragraph }}</td>
                        <td>{{ $item->states }}</td>
                    </tr>

                    @endforeach

                    {{-- <tr colspan="6">No Record</tr> --}}

                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import CSV</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/fileImport" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="file" name="file" accept=".xslx,.xls,.csv" class="form-control">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>