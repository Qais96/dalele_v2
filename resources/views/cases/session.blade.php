

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
                                <h3 class="mb-0">Case Discription</h3>
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

                            <form  method="post" action="{{ route('Edit.Case.Consultant') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="<?= $Case->id?>" name="id">
                            <input type="hidden" value="<?= $Case->patient_Fk?>" name="patient_Fk">
                            <div class="form-row">
    <div class="form-group col-md-12">
    <label for="exampleFormControlTextarea1">Discription</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly style="background:white;"><?= $Case->summary ?></textarea>
    </div>
  
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <label for="exampleFormControlSelect1">Consultant</label>
    <select name="consalutant_Fk" class="form-control" id="exampleFormControlSelect1">
    <option></option>
      <?php    foreach($Consultants as $con){

       ?>
          
      <option value="<?= $con->id?>" <?php if($con->id == $Case->consalutant_Fk){echo'selected';} ?>><?=$con->name ?></option>
      <?php }?>
    </select>
    </div>
 
  </div>
  
  <div class="form-group">
 
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
    <div class="form-group">
        <label for="example-date-input" class="form-control-label">Date</label>
        <?php if(empty($Case->first_session)){$Date="";}else{ $Date =date("Y-m-d", strtotime($Case->first_session)); }?>
        <input class="form-control" value="<?= $Date  ?>" type="date"  id="example-date-input" name="date">
    </div>


    </div>

    <div class="form-group col-md-6">
    <div class="form-group">

        <?php if(empty($Case->first_session)){$Time="";}else{ $Time =date("h:i:s", strtotime($Case->first_session));} ?>
        <label for="example-time-input" class="form-control-label">Time</label>
        <input class="form-control" type="time" value="<?= $Time  ?>" id="example-time-input" name="time">

        
    </div>


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