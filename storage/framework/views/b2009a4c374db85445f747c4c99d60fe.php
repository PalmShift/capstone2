    <?php $__env->startSection('title'); ?> 
            <?php echo app('translator')->get('fees::feesModule.add_fees_payment'); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php echo $__env->make('fees::_addFeesPayment',['role'=>'student'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/Modules/Fees/Resources/views/student/studentAddPayment.blade.php ENDPATH**/ ?>