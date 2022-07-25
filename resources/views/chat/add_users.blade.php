
@extends('layouts.app')

@section('content')
    @include('layouts.headers.guest')
    
    <div class="container-fluid mt--7">
    @if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
        <div class="row">
        
       
        </div>
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Page visits</h3>
                            </div>
                      
                        </div>
                    </div>
                    </br>
  
                    <div class="container-fluid">

                    @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                        <div class="row">

                            <div class="col">

                            <form  method="post" action="{{ route('Add.User') }}" enctype="multipart/form-data">
                            @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password" required>
    </div>
  </div>



  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputAddress">Name</label>
    <input type="text" name="name" class="form-control" id="inputAddress" placeholder="Name" required>
    </div>
    <div class="form-group col-md-6">
    <label for="example-date-input" class="form-control-label">birth date   </label>
        <input class="form-control" name="birth_date" type="date"  id="example-date-input" required>
    </div>
  </div>



  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputCity">Bio</label>
      <input type="text" name="bio" class="form-control" id="inputCity">
    </div>


  </div>
  <div class="form-group">
  <div class="custom-file">

        <input  type="file" name="image" class="custom-file-input" id="customFileLang" lang="en">
        <label class="custom-file-label" for="customFileLang">Select file</label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Add</button>
</form>
</br>
</br>
</br>

                            </div>
                        </div>



                    </div>

                </div>
            </div>
     
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush