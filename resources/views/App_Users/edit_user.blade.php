

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

                            <form  method="post" action="{{ route('Edit.User') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="<?= $Users->id?>" name="id">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Email</label>
      <input type="email" value="<?= $Users->email?>" name="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
 
  </div>
  
  <div class="form-group">
 
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputAddress">Name</label>
    <input type="text" value="<?= $Users->name?>" name="name" class="form-control" id="inputAddress"  required>
    </div>
    <div class="form-group col-md-6">
    <label for="example-date-input" class="form-control-label">Date</label>
   
        <input class="form-control" value="<?= $Users->birth_date?>" name="birth_date" type="date"  id="example-date-input" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputCity">phone</label>
      <input type="number" name="phone" value="<?= $Users->phone?>" class="form-control">
    </div>


  </div>
</br>
<!--
  <div class="form-row">
  <div class="form-group col-md-6">
    <div class="form-group" >
    <label for="inputCity">Old Image</label>
</br>
    <img class="card-img-top" src="<?= asset('images/'.$Users->image) ?>" alt="Card image cap"  style="height: 100px; width: 150px;">
   
  </div>
    </div>
 
  
 
  </div>
  <div class="form-group">
  <div class="custom-file">

        <input type="file" name="image" class="custom-file-input" id="customFileLang" lang="en">
        <label class="custom-file-label" for="customFileLang">Select file</label>
    </div>
  </div>
-->
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