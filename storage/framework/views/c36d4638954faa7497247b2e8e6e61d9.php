<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('leave.leave_type'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>


<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('leave.leave_type'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('leave.leave'); ?></a>
                <a href="#"><?php echo app('translator')->get('leave.leave_type'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($leave_type)): ?>
        <?php if(userPermission('leave-type-store')): ?>
                
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('leave-type')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('common.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                <?php if(isset($leave_type)): ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('leave-type-update',$leave_type->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                <?php else: ?>
                 <?php if(userPermission('leave-type-store')): ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'leave-type-store',
                'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                <?php endif; ?>
                <?php endif; ?>
                <div class="white-box">
                    <div class="main-title">
                        <h3 class="mb-15"><?php if(isset($leave_type)): ?>
                                <?php echo app('translator')->get('leave.edit_leave_type'); ?>
                            <?php else: ?>
                                <?php echo app('translator')->get('leave.add_leave_type'); ?>
                            <?php endif; ?> 
                            
                        </h3>
                    </div>
                    <div class="add-visitor">
                        <div class="row">
                            <div class="col-lg-12">                               
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('leave.type_name'); ?> <span class="text-danger"> *</span> </label>
                                    <input class="primary_input_field form-control<?php echo e($errors->has('type') ? ' is-invalid' : ''); ?>"
                                    type="text" name="type" autocomplete="off" value="<?php echo e(isset($leave_type)? $leave_type->type:Request::old('type')); ?>">
                                  
                                    <input type="hidden" name="id" value="<?php echo e(isset($leave_type)? $leave_type->id: ''); ?>">

                                    
                                    <?php if($errors->has('type')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('type')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                              
                            </div>
                        </div>
                          <?php 
                              $tooltip = "";
                              if(userPermission('leave-type-store')){
                                    $tooltip = "";
                                }else{
                                    $tooltip = "You have no permission to add";
                                }
                            ?>
                        <div class="row mt-40">
                            <div class="col-lg-12 text-center">
                                <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                    <span class="ti-check"></span>

                                    <?php if(isset($leave_type)): ?>
                                        <?php echo app('translator')->get('leave.update_type'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('leave.save_type'); ?>
                                    <?php endif; ?>
                                   
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
            </div>
            </div>

            <div class="col-lg-9">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('leave.leave_type_list'); ?></h3>
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <table id="table_id" class="table" cellspacing="0" width="100%">
    
                            <thead>
                                
                                <tr>
                                    <th><?php echo app('translator')->get('common.type'); ?></th>
                                  
                                    <th><?php echo app('translator')->get('common.action'); ?></th>
                                </tr>
                            </thead>
    
                            <tbody>
                                <?php $__currentLoopData = $leave_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($leave_type->type); ?></td>
                                   
                                    <td>
                                        <?php if (isset($component)) { $__componentOriginalf5ee9bc45d6af00850b10ff7521278be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be = $attributes; } ?>
<?php $component = App\View\Components\DropDown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('drop-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DropDown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <?php if(userPermission('leave-type-edit')): ?>
    
                                                <a class="dropdown-item" href="<?php echo e(route('leave-type-edit', [$leave_type->id
                                                    ])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                   <?php endif; ?>
                                                   <?php if(userPermission('leave-type-delete')): ?>
    
                                                   <a class="dropdown-item" data-toggle="modal" data-target="#deleteLeaveTypeModal<?php echo e($leave_type->id); ?>"
                                                        href="#"><?php echo app('translator')->get('common.delete'); ?></a>
                                                   <?php endif; ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $attributes = $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $component = $__componentOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade admin-query" id="deleteLeaveTypeModal<?php echo e($leave_type->id); ?>" >
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php echo app('translator')->get('leave.delete_leave_type'); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
    
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                        </div>
    
                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                            <?php echo e(Form::open(['route' => array('leave-type-delete',$leave_type->id), 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

                                                            <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                                                            <?php echo e(Form::close()); ?>

                                                        </div>
                                                    </div>
    
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/humanResource/leave_type.blade.php ENDPATH**/ ?>