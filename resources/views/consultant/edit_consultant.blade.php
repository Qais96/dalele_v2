

@extends('layouts.app')

@section('content')
    @include('layouts.headers.guest')
    
    <div class="container-fluid mt--7">
        <div class="row">
        
       
        </div>
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Edit Consultant</h3>
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

                            <form  method="post" action="{{ route('Edit.Consultant') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="<?= $Consalutants->id?>" name="id">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Email</label>
      <input type="email" value="<?= $Consalutants->email?>" name="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
 
  </div>
  
  <div class="form-group">
 
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputAddress">Name</label>
    <input type="text" value="<?= $Consalutants->name?>" name="name" class="form-control" id="inputAddress"  required>
    </div>
    <div class="form-group col-md-6">
    <label for="example-date-input" class="form-control-label">Date</label>
   
        <input class="form-control" value="<?= $Consalutants->birth_date?>" name="birth_date" type="date"  id="example-date-input" required>
    </div>
  </div>



  <button type="submit" class="btn btn-primary">Edit</button>
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