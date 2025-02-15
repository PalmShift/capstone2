<style>
    .school-table-style tr th {
        padding: 10px 18px 10px 10px !important;
    }

    .school-table-style tr td {
        padding: 20px 10px 20px 10px !important;
    }
</style>
<div class="modal-header">
    <h4 class="modal-title"><?php echo app('translator')->get('fees::feesModule.view_payment_of'); ?> - (<?php echo e($feesinvoice->invoice_id); ?>)</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <div class="table-responsive">
    <table class="table school-table-style shadow-none p-0" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th><?php echo app('translator')->get('common.sl'); ?></th>
                <th><?php echo app('translator')->get('common.date'); ?></th>
                <th><?php echo app('translator')->get('fees::feesModule.payment_method'); ?></th>
                <th><?php echo app('translator')->get('fees::feesModule.change_method'); ?></th>
                <th><?php echo app('translator')->get('fees::feesModule.paid_amount'); ?></th>
                <th><?php echo app('translator')->get('fees::feesModule.waiver'); ?></th>
                <th><?php echo app('translator')->get('fees.fine'); ?></th>
                <th><?php echo app('translator')->get('common.action'); ?></th>
            </tr>
        </thead>
        <tbody>

            <?php $__currentLoopData = $feesTranscations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $feesTranscation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($feesTranscation->payment_method): ?>
                    <tr>
                        <td><?php echo e($key); ?></td>
                        <td><?php echo e(dateConvert($feesTranscation->created_at)); ?></td>
                        <td><?php echo e($feesTranscation->payment_method); ?></td>
                        <td>
                            <?php if(
                                $feesTranscation->payment_method == 'Cash' ||
                                    $feesTranscation->payment_method == 'Cheque' ||
                                    $feesTranscation->payment_method == 'Bank'): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'fees.change-method', 'method' => 'POST', 'id' => 'feesChangeMethod'])); ?>

                                <input type="hidden" name="feesInvoiceId" value="<?php echo e($feesTranscation->id); ?>">
                                <div class="mt-30-md">
                                    <div class="row">
                                        <div class="com-md-10">
                                            <select
                                                class="primary_select form-control <?php echo e($errors->has('change_method') ? ' is-invalid' : ''); ?> changeMethod"
                                                name="change_method">
                                                <option data-display="<?php echo app('translator')->get('fees::feesModule.change_method'); ?>" value=""><?php echo app('translator')->get('fees::feesModule.change_method'); ?>
                                                </option>
                                                <?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentMethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($paymentMethod->method != $feesTranscation->payment_method): ?>
                                                        <option value="<?php echo e($paymentMethod->method); ?>">
                                                            <?php echo e($paymentMethod->method); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('change_method')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('change_method')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="com-md-2 ml-2 mt-2">
                                            <button class="primary-btn icon-only submit fix-gr-bg changeMethodSubmit"
                                                title="<?php echo app('translator')->get('common.submit'); ?>">
                                                <span class="ti-check"></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="bankInfo mt-20 d-none">
                                            <select
                                                class="primary_select form-control <?php echo e($errors->has('bank_id') ? ' is-invalid' : ''); ?> bankId"
                                                name="bank_id">
                                                <option data-display="<?php echo app('translator')->get('fees::feesModule.select_bank'); ?>" value=""><?php echo app('translator')->get('fees::feesModule.select_bank'); ?>
                                                </option>
                                                <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($bank->id); ?>"
                                                        data-id="<?php echo e($feesTranscation->id); ?>"><?php echo e($bank->bank_name); ?>

                                                        (<?php echo e($bank->account_number); ?>)
                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-25">
                                        <div class="primary_input">
                                            <label class="primary_input_label"><?php echo app('translator')->get('common.note'); ?> <span></span> </label>
                                            <input class="primary_input_field form-control" name="payment_note">
                                        </div>
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            <?php endif; ?>
                        </td>
                        <td><?php echo e($feesTranscation->paid_amount); ?></td>
                        <td><?php echo e($feesTranscation->weaver); ?></td>
                        <td><?php echo e($feesTranscation->fine); ?></td>
                        <td>
                            <a class="primary-btn icon-only fix-gr-bg" type="button"
                                href="<?php echo e(route('fees.single-payment-view', ['id' => $feesTranscation->id, 'type' => 'view'])); ?>"
                                title="<?php echo app('translator')->get('common.view'); ?>">
                                <span class="ti-eye"></span>
                            </a>
                            <?php if(
                                $feesTranscation->payment_method == 'Cash' ||
                                    $feesTranscation->payment_method == 'Cheque' ||
                                    $feesTranscation->payment_method == 'Bank' ||
                                    $feesTranscation->payment_method == 'Wallet'): ?>
                                <a class="primary-btn icon-only fix-gr-bg" type="button"
                                    href="<?php echo e(route('fees.delete-single-fees-transcation', $feesTranscation->id)); ?>"
                                    data-tooltip="tooltip" title="<?php echo app('translator')->get('common.delete'); ?>">
                                    <span class="ti-trash"></span>
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    </div>
</div>
<script>
    if ($(".primary_select").length) {
        $(".primary_select").niceSelect();
    }

    $(".changeMethod").on("change", function() {
        if ($(this).val() == "Bank") {
            $(this).parents('tr').find('.bankInfo').removeClass('d-none');
        } else {
            $(this).parents('tr').find('.bankInfo').addClass('d-none');
            $(this).parents('tr').find('.bankId').val("");
        }
    });

    // Change Payment Method
    $(document).on('click', '.changeMethodSubmit', function(e) {
        e.preventDefault();
        let feesChangeMethodForm = $(this).parents('form');

        const submit_url = feesChangeMethodForm.attr('action');
        const method = feesChangeMethodForm.attr('method');
        // Start Ajax
        const formData = new FormData(feesChangeMethodForm[0]);
        $.ajax({
            url: submit_url,
            type: method,
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'JSON',
            success: function(response) {
                toastr.success("Save Successfully", "Successful", {
                    timeOut: 5000,
                });
                location.reload();
            },
        });
    });
</script>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/Modules/Fees/Resources/views/feesInvoice/viewPayment.blade.php ENDPATH**/ ?>