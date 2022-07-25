

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
                                <h3 class="mb-0">Case Report</h3>
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

                            <form  method="post" action="{{ route('Edit.Case.Report') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="<?php if(!empty($Report->report)){echo $Report->id; }?>" name="id">
                            <input type="hidden" value="<?= $patient_Fk?>" name="patient_Fk">
                            <input type="hidden" value="<?= $consalutant_Fk?>" name="consalutant_Fk">
                            <div class="form-row">
    <div class="form-group col-md-12">
    <label for="exampleFormControlTextarea1">Discription</label>
    <textarea name="report" class="form-control" id="exampleFormControlTextarea1" rows="3"  style="background:white;"><?php if(!empty($Report->report)){echo $Report->report;}  ?></textarea>
    </div>
  
  </div>



</br>


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