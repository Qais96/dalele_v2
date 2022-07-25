
@extends('layouts.app')

@section('content')
  
 
        <?php          if(Auth::user()->type=="Admin"){?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
<div class="container-fluid">
<div class="header-body">

<div class="row">
<div class="col-xl-3 col-lg-6">
<div class="card card-stats mb-4 mb-xl-0">
<div class="card-body">
<div class="row">
<div class="col">
<h5 class="card-title text-uppercase text-muted mb-0">Pendding Cases</h5>
<span class="h2 font-weight-bold mb-0"><?=$Pendding ?></span>
</div>
<div class="col-auto">
<div class="icon icon-shape bg-danger text-white rounded-circle shadow">
<i class="fas fa-chart-bar"></i>
</div>
</div>
</div>
<p class="mt-3 mb-0 text-muted text-sm">

</p>
</div>
</div>
</div>
<div class="col-xl-3 col-lg-6">
<div class="card card-stats mb-4 mb-xl-0">
<div class="card-body">
<div class="row">
<div class="col">
<h5 class="card-title text-uppercase text-muted mb-0">Assigned Cases</h5>
<span class="h2 font-weight-bold mb-0"><?= $assigned ?></span>
</div>
<div class="col-auto">
<div class="icon icon-shape bg-warning text-white rounded-circle shadow">
<i class="fas fa-chart-pie"></i>
</div>
</div>
</div>
<p class="mt-3 mb-0 text-muted text-sm">

</p>
</div>
</div>
</div>
<div class="col-xl-3 col-lg-6">
<div class="card card-stats mb-4 mb-xl-0">
<div class="card-body">
<div class="row">
<div class="col">
<h5 class="card-title text-uppercase text-muted mb-0">Finished Cases</h5>
<span class="h2 font-weight-bold mb-0"><?= $finished?></span>
</div>
<div class="col-auto">
<div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
<i class="fas fa-users"></i>
</div>
</div>
</div>
<p class="mt-3 mb-0 text-muted text-sm">

</p>
</div>
</div>
</div>
<div class="col-xl-3 col-lg-6">
<div class="card card-stats mb-4 mb-xl-0">
<div class="card-body">
<div class="row">
<div class="col">
<h5 class="card-title text-uppercase text-muted mb-0">Total Cases</h5>
<span class="h2 font-weight-bold mb-0"><?= $total=$finished+$assigned+$Pendding  ?></span>
</div>
<div class="col-auto">
<div class="icon icon-shape bg-info text-white rounded-circle shadow">
<i class="fas fa-percent"></i>
</div>
</div>
</div>
<p class="mt-3 mb-0 text-muted text-sm">

</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row mt-5" >
            <div class="col-xl-12 mb-5 mb-xl-0" >
                <div class="card shadow" style="padding-left: 20px;
    padding-right: 20px;">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">New Pendding Cases</h3>
                            </div>
                       
                        </div>
                    </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            <th>Case number</th>
            <th>Sending Date</th>
                <th>Name</th>
                <th>type</th>
                <th>name consalutant</th>
                <th>first session</th>
                <th>Count Cases</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        
        <?php if(!empty($Cases)){
                 foreach($Cases as $Case){
                 ?>
                                <tr>
                                <td>
                                        <?= $Case->id?>
                                    </td>
                                    <td>
                                        <?= $Case->Created_at?>
                                    </td>
                                    <td>
                                        <?= $Case->name?>
                                    </td>
                              
                                    <td>
                                        <?php if($Case->status == 'pending'){
                                        $lable="badge badge-danger";
                                        }else if($Case->status == 'assigned'){
                                            $lable="badge badge-warning";
                                        } else if($Case->status == 'finished'){
                                            $lable="badge badge-success";
                                        }?>
                                    <span class="<?= $lable?>"><?= $Case->status?></span>   
                                    </td>
                                    <td>
                                        <?php if(empty($Case->name_consalutant)){echo'لم يتم تحديد مشرف';}else{echo $Case->name_consalutant ;}?>
                                    </td>
                                    <td>
                                        <?php if(empty($Case->first_session)){echo'لم يتم تحديد موعد للجلسة';}else{echo $Case->first_session ;}?>
                                    </td>
                                    <td>
                                        <?= $Case->Count?>
                                    </td>
                                    <td>
                                    <button  onclick="window.location.href='<?= route('Get.Case.Consultant',['id'=> $Case->id])?>'" class="btn btn-icon btn-info" type="button">
	<span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
</button>

<button onclick="ConfirmDelete()" data-id ="<?= $Case->id?>"  data-url="<?= route('Delete.Case.Consultant',['id'=> $Case->id])?>" class="btn btn-icon btn-danger DleteBtn" type="button">
        <span class="btn-inner--icon"><i class=" ni ni-fat-remove"></i></span>
    </button>   
    <button onclick="GetSummary(<?= $Case->id?>)"   data-url="<?= route('Get.Summary',['id'=> $Case->id])?>" id="SummaryBtn_<?= $Case->id?>" class="btn btn-icon btn-warning " type="button">
        <span class="btn-inner--icon"><i class=" ni ni-atom"></i></span>
    </button>
    <button  onclick="window.location.href='<?= route('View.Chat',['id'=> $Case->patient_Fk,'consultant_id'=>$Case->consalutant_Fk])?>'" class="btn btn-icon btn-info" type="button">
	<span class="btn-inner--icon"><i class="ni ni-email-83"></i></span>
</button> 

<button   onclick="window.location.href='<?= route('View.Report',['patient_Fk'=>$Case->patient_Fk ?? '1','consalutant_Fk'=>$Case->consalutant_Fk ?? '2'])?>'" class="btn btn-icon btn-success DleteBtn" type="button" {{$Case->patient_Fk ?? 'disabled'}}>
        <span class="btn-inner--icon"><i class=" ni ni-collection"></i></span>
    </button> 
                            
                                    </td>
                                    
                                </tr> 
                                <?php }}?>
        </tbody>
        <tfoot>
            <tr>
            <th>Case number</th>
            <th>Sending Date</th>
                <th>Name</th>
                <th>type</th>
                <th>name consalutant</th>
                <th>first session</th>
                <th>Count Cases</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</br>
</br>
</br>
                      
                </div>
            </div>
     
        </div>
        </div>
            
            
            <?php } ?>
            
  
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('assets') }}/js/dalele/cases.js"></script>
@endpush