<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('bulkprint::bulk.invoice_settings'); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<style>

    /* .copyPaper {
       display: none!important;
    } */
    .copyPaperShow {
        display: show;
    }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php  $setting = App\SmGeneralSettings::where('school_id', Auth::user()->school_id)->first();  if(!empty($setting->currency_symbol)){ $currency = $setting->currency_symbol; }else{ $currency = '$'; }   ?> 

<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('bulkprint::bulk.invoice_settings'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('bulkprint::bulk.bulk_print'); ?></a>   
                <a href="#"><?php echo app('translator')->get('bulkprint::bulk.invoice_settings'); ?> </a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo e(route('invoice-settings-update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="white-box">
                            <div class="row p-0">
                                <div class="col-lg-12">
                                    <h3 class="text-center"><?php echo app('translator')->get('bulkprint::bulk.invoice_settings'); ?></h3>
                                    <hr>
                                    <input type="hidden" name="id" value="<?php echo e($invoiceSettings->id); ?>">

                                    <div class="row mb-40 mt-40">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-3 d-flex">
                                                    <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('bulkprint::bulk.showing_page'); ?> (<?php echo app('translator')->get('bulkprint::bulk.part'); ?>)</p>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="d-flex radio-btn-flex"> 
                                                        <div class="mr-30">
                                                            <input type="checkbox" name="copy_s_per_th" id="c_part1" class="common-radio relationButton copy_per_th" <?php echo e(@$invoiceSettings->c_signature_p == 1? 'checked':''); ?>>
                                                            <label for="c_part1" id="copys"><?php echo e($invoiceSettings->copy_s); ?></label>
                                                        </div>
                                                        <div class="mr-30">
                                                            <input type="checkbox" name="copy_c_per_th" id="c_part2"  class="common-radio relationButton copy_per_th" <?php echo e(@$invoiceSettings->c_signature_c == 1? 'checked':''); ?>>
                                                            <label for="c_part2" id="copyc"><?php echo e($invoiceSettings->copy_c); ?></label>
                                                        </div>
                                                        <div class="mr-30">
                                                            <input type="checkbox" name="copy_o_per_th" id="c_part3"  class="common-radio relationButton copy_per_th" <?php echo e(@$invoiceSettings->c_signature_o == 1? 'checked':''); ?>>
                                                            <label for="c_part3" id="copyo"><?php echo e($invoiceSettings->copy_o); ?></label>
                                                        </div>                                           
                                                    </div>
                                            
                                                <?php if($errors->has('per_th')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <strong><?php echo e(@$errors->first('per_th')); ?></span>
                                                <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                      
                                            <div class="col-lg-6">
                                                <div class="primary_input ">
                                                    <input class="primary_input_field form-control<?php echo e($errors->has('prefix') ? ' is-invalid' : ''); ?>"   type="text" name="prefix"  id="prefix" value="<?php echo e($invoiceSettings->prefix); ?>">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('bulkprint::bulk.invoice_prefix_format_standard_three_character'); ?><span></span></label>
                                                    
                                                    <?php if($errors->has('prefix')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('prefix')); ?></span>
                                                    <?php endif; ?>
                                                 </div>

                                             </div>
                                    </div>

                                 

                                    <div class="row mb-40 mt-40">
                                        <div class="col-lg-6">
                                            <div class="primary_input ">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('signature_p') ? ' is-invalid' : ''); ?>" type="text" name="footer_1" value="<?php echo e($invoiceSettings->footer_1); ?>">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.signature'); ?></label>
                                                
                                                <?php if($errors->has('signature_p')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('signature_p')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-5 d-flex">
                                                    <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('bulkprint::bulk.is_showing_signature'); ?>  </p>
                                                </div>
                                                <div class="col-lg-7">
                                                        <div class="radio-btn-flex ml-20">
                                                            <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="">
                                                                    <input type="radio" name="signature_p" id="signature_p_on" value="1" class="common-radio relationButton" <?php echo e($invoiceSettings->signature_p==1 ? 'checked':''); ?> >
                                                                    <label for="signature_p_on"><?php echo app('translator')->get('common.yes'); ?></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="">
                                                                    <input type="radio" name="signature_p" id="participant_video" value="0" class="common-radio relationButton" <?php echo e($invoiceSettings->signature_p==0 ? 'checked':''); ?> >
                                                                    <label for="participant_video"><?php echo app('translator')->get('common.no'); ?></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row mb-40 mt-40">

                                        <div class="col-lg-6">
                                            <div class="primary_input ">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('footer_2') ? ' is-invalid' : ''); ?>" type="text" name="footer_2" value="<?php echo e($invoiceSettings->footer_2); ?>">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.signature'); ?></label>
                                                
                                                <?php if($errors->has('footer_2')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('footer_2')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-5 d-flex">
                                                    <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('bulkprint::bulk.is_showing_signature'); ?> </p>
                                                </div>
                                                <div class="col-lg-7">
                                                        <div class=" radio-btn-flex ml-20">
                                                            <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="">
                                                                    <input type="radio" name="signature_c" id="signature_c" value="1" class="common-radio relationButton"  <?php echo e($invoiceSettings->signature_c==1 ? 'checked':''); ?>>
                                                                    <label for="signature_c"><?php echo app('translator')->get('common.yes'); ?></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="">
                                                                    <input type="radio" name="signature_c" id="join_before_host" value="0" class="common-radio relationButton"  <?php echo e($invoiceSettings->signature_c==0 ? 'checked':''); ?>>
                                                                    <label for="join_before_host"><?php echo app('translator')->get('common.no'); ?></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-40 mt-40">
                                        <div class="col-lg-6">
                                            <div class="primary_input ">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('footer_3') ? ' is-invalid' : ''); ?>" type="text"  name="footer_3" value="<?php echo e($invoiceSettings->footer_3); ?>">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.signature'); ?></label>
                                                
                                                <?php if($errors->has('footer_3')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('footer_3')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-5 d-flex">
                                                    <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('bulkprint::bulk.is_showing_signature'); ?></p>
                                                </div>
                                                <div class="col-lg-7">
                                                        <div class=" radio-btn-flex ml-20">
                                                            <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="">
                                                                    <input type="radio" name="signature_o" id="signature_o_on" value="1" class="common-radio relationButton"  <?php echo e($invoiceSettings->signature_o==1 ? 'checked':''); ?> >
                                                                    <label for="signature_o_on"><?php echo app('translator')->get('common.yes'); ?></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="">
                                                                    <input type="radio" name="signature_o" id="waiting_room" value="0" class="common-radio relationButton"  <?php echo e($invoiceSettings->signature_o==0 ? 'checked':''); ?> >
                                                                    <label for="waiting_room"><?php echo app('translator')->get('common.no'); ?></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row mb-40 mt-40">

                                        <div class="col-lg-4">
                                            <div class="primary_input ">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('copy_s') ? ' is-invalid' : ''); ?>" type="text" name="copy_s" id="copy_s"  value="<?php echo e($invoiceSettings->copy_s); ?>">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('bulkprint::bulk.copy_for'); ?></label>
                                                
                                                <?php if($errors->has('copy_s')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('copy_s')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="primary_input ">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('copy_s') ? ' is-invalid' : ''); ?>" type="text" name="copy_o" id="copy_o" value="<?php echo e($invoiceSettings->copy_o); ?>">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('bulkprint::bulk.copy_for'); ?></label>
                                                
                                                <?php if($errors->has('copy_s')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('copy_s')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="primary_input ">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('copy_c') ? ' is-invalid' : ''); ?>" type="text" name="copy_c"  id="copy_c" value="<?php echo e($invoiceSettings->copy_c); ?>">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('bulkprint::bulk.copy_for'); ?></label>
                                                
                                                <?php if($errors->has('copy_s')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('copy_c')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>                                  

                                    <div class="row mb-40 mt-40">

                                       
                                     
                                    </div>



                                    <?php if(userPermission('invoice-settings')): ?>
                                        <div class="row mt-40">
                                            <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg" id="_submit_btn_admission">
                                                    <span class="ti-check"></span>
                                                    <?php echo app('translator')->get('common.update'); ?>
                                                </button>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php $__env->startSection('script'); ?>
<script>
        
    $(document).ready(function(){
        $(document).on('change','.per_th',function(){
            let per_th = $(this).val();           
            // $(".copyPaper").show();
            $('#copyPaperShow').addClass('copyPaperShow');
             $('#copyPaperShow').removeClass('copyPaper');
        
        })      
      
    })

    $(document).on("keyup", "#copy_s", function(event) {
        let titleValue = $(this).val();
        $("#copys").html(titleValue);
    });
    $(document).on("keyup", "#copy_c", function(event) {
        let titleValue = $(this).val();
        $("#copyc").html(titleValue);
    });
    $(document).on("keyup", "#copy_o", function(event) {
        let titleValue = $(this).val();
        $("#copyo").html(titleValue);
    });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/Modules/BulkPrint/Resources/views/feesCollection/invoice_settings.blade.php ENDPATH**/ ?>