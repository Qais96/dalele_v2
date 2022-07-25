
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
                                <h3 class="mb-0">Consultants</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{route('View.Add.Consultant')}}" class="btn btn-sm btn-primary">Add Consultant</a>
                            </div>
                        </div>
                    </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
  
                <th>Name</th>
                <th>birth date</th>
                <th>email</th>
                <th>type</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

 
        <?php if(!empty($Consultants)){
                 foreach($Consultants as $Consultant){
                 ?>
                                <tr>
                           
                                    <td>
                                        <?= $Consultant->name?>
                                    </td>
                                    <td>
                                        <?= $Consultant->birth_date?>
                                    </td>
                                    <td>
                                        <?= $Consultant->email?>
                                    </td>
                         
                        
                                    <td>
                                        <?= $Consultant->type?>
                                    </td>
                                    <td>
                                    <button  onclick="window.location.href='<?= route('View.Edit.Consultant',['id'=> $Consultant->id])?>'" class="btn btn-icon btn-info" type="button">
	<span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
</button>

<button onclick="ConfirmDelete(<?= $Consultant->id?>)" id="con_<?= $Consultant->id?>"  data-url="<?= route('Delete.Consultant',['id'=> $Consultant->id])?>" class="btn btn-icon btn-danger DleteBtn" type="button">
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
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('assets') }}/js/dalele/User.js"></script>
@endpush