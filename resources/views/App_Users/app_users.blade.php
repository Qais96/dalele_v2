
@extends('layouts.app')

@section('content')
    @include('layouts.headers.guest')
    <div class="test">
    <div class="container-fluid mt--7">
        <div class="row">
        
       
        </div>
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow" style="padding-left: 20px;
    padding-right: 20px;">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Patient</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{route('View.Add.User')}}" class="btn btn-sm btn-primary">Add Patient</a>
                            </div>
                        </div>
                    </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
  
                <th>Name</th>
                <th>birth date</th>
                <th>email</th>
                <th>bio</th>
                <th>type</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

 
        <?php if(!empty($Users)){
                 foreach($Users as $User){
                 ?>
                                <tr>
                           
                                    <td>
                                        <?= $User->name?>
                                    </td>
                                    <td>
                                        <?= $User->birth_date?>
                                    </td>
                                    <td>
                                        <?= $User->email?>
                                    </td>
                                   <!-- <td>    <img class="card-img-top" src="<?= asset('images/'.$User->image) ?>" alt="Card image cap"  style="height: 100px; width: 150px;  border-radius: 50%">
                                    </td>-->
                                    <td>
                                        <?= $User->bio?>
                                    </td>
                                    <td>
                                        <?= $User->type?>
                                    </td>
                                    <td>
                                    <button  onclick="window.location.href='<?= route('View.Edit.User',['id'=> $User->id])?>'" class="btn btn-icon btn-info" type="button">
	<span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
</button>

<button onclick="ConfirmDelete(<?= $User->id?>,'patint')"   data-url="<?= route('Delete.User',['id'=> $User->id])?>" class="btn btn-icon btn-danger DleteBtn" type="button">
        <span class="btn-inner--icon"><i class=" ni ni-fat-remove"></i></span>
    </button>   
                            
                                    </td>
                                    
                                </tr> 
                                <?php }}?>
        </tbody>
        <tfoot>
            <tr>
            <th>Name</th>
                <th>birth date</th>
                <th>email</th>
                <th>bio</th>
                <th>type</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
    </br> 
                </div>
            </div>
     
        </div>
        </div>
                 </br>
                 </br>
                 </br>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('assets') }}/js/dalele/User.js"></script>
@endpush