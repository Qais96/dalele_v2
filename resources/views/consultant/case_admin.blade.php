
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
                                <h3 class="mb-0">Cases</h3>
                            </div>
                       
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            <th>name </th>
            <th>birth date</th>
                <th>status</th>
                <th>first session</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($Cases)){
                 foreach($Cases as $Case){
                 ?>
                                <tr>
                           
                                    <td>
                                        <?= $Case->name?>
                                    </td>
                                    <td>
                                        <?=$Case->birth_date?>
                                    </td>
                                    <td>
                                        <?php if($Case->chat == 'No chat'){
                                            $lable="badge badge-warning";
                                        } else if($Case->chat == 'Start'){
                                            $lable="badge badge-info";
                                        }?>
                                    <span class="<?= $lable?>" style="    font-size: 18px;
"><?php if($Case->chat=='No chat'){echo'لم يتم بدء المحادثة';}else{{echo'يوجد محادثة سابقة';}}?></span>   
                                    </td>
                                  
                                    <td>
                                    <?=$Case->first_session?>
                                      
                                    </td>
                                    <td>
                                    

<button   onclick="window.location.href='<?= route('View.Report',['patient_Fk'=> $Case->patient_Fk,'consalutant_Fk'=>$Case->consalutant_Fk])?>'" class="btn btn-icon btn-success DleteBtn" type="button">
        <span class="btn-inner--icon"><i class=" ni ni-collection"></i></span>
    </button>   
    <button onclick="GetSummary(<?= $Case->case_Fk?>)"   data-url="<?= route('Get.Summary')?>" id="SummaryBtn_<?= $Case->case_Fk?>" class="btn btn-icon btn-warning " type="button">
        <span class="btn-inner--icon"><i class=" ni ni-atom"></i></span>
    </button>   
    <button  onclick="StartChat(<?=$Case->patient_Fk; ?>)"  class="btn btn-icon btn-info" type="button"  >
	<span class="btn-inner--icon"><i class="ni ni-email-83"></i></span>
</button>

                            
                                    </td>
                                    
                                </tr> 
                                <?php }} ?>
 
        </tbody>
        <tfoot>
            <tr>
         
            <th>name </th>
            <th>birth date</th>
                <th>status</th>
                <th>first session</th>
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
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('assets') }}/js/dalele/cases.js"></script>
@endpush