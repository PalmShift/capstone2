<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('transport.vehicle'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1> <?php echo app('translator')->get('transport.vehicle'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('transport.transport'); ?></a>
                <a href="#"><?php echo app('translator')->get('transport.vehicle'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($assign_vehicle)): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('vehicle-index')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('common.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($assign_vehicle)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('vehicle-update',@$assign_vehicle->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                        <?php else: ?>

                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'vehicle-store',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15"><?php if(isset($assign_vehicle)): ?>
                                        <?php echo app('translator')->get('transport.edit_vehicle'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('transport.add_vehicle'); ?>
                                    <?php endif; ?>
                                   
                                </h3>
                            </div>
                            <div class="add-visitor">
                                
                                <div class="row">
                                    <div class="col-lg-12">
                                       
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('transport.vehicle_number'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e($errors->has('vehicle_number') ? ' is-invalid' : ''); ?>"
                                                type="text" name="vehicle_number" autocomplete="off" value="<?php echo e(isset($assign_vehicle)? @$assign_vehicle->vehicle_no:old('vehicle_number')); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($assign_vehicle)? @$assign_vehicle->id: ''); ?>">
                                            
                                            
                                            <?php if($errors->has('vehicle_number')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('vehicle_number')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        
                                    </div>
                                </div> 
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('transport.vehicle_model'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e($errors->has('vehicle_model') ? ' is-invalid' : ''); ?>"
                                                type="text" name="vehicle_model" autocomplete="off" value="<?php echo e(isset($assign_vehicle)? @$assign_vehicle->vehicle_model:old('vehicle_model')); ?>">
                                            
                                            
                                            <?php if($errors->has('vehicle_model')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('vehicle_model')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('transport.year_made'); ?></label>
                                            <input class="primary_input_field form-control<?php echo e($errors->has('year_made') ? ' is-invalid' : ''); ?>"
                                                type="text" onkeypress="return isNumberKey(event)" name="year_made" autocomplete="off" value="<?php echo e(isset($assign_vehicle)? @$assign_vehicle->made_year:old('year_made')); ?>">
                                           
                                            
                                            <?php if($errors->has('year_made')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('year_made')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        
                                    </div>
                                </div>
                          

                            <div class="row mt-15">
                                <div class="col-lg-12">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('transport.driver'); ?> <span class="text-danger"> *</span> </label>
                                    <select class="primary_select form-control <?php echo e($errors->has('driver_id') ? ' is-invalid' : ''); ?>" id="select_class" name="driver_id">
                                        <option data-display="<?php echo app('translator')->get('transport.select_driver'); ?> *" value=""><?php echo app('translator')->get('transport.select_driver'); ?> *</option>
                                        <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($driver->id); ?>" <?php echo e(isset($assign_vehicle)? (@$assign_vehicle->driver_id == @$driver->id? 'selected':''):''); ?> > <?php echo e(@$driver->full_name); ?></option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('driver_id')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('driver_id')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('transport.note'); ?></label>
                                            <textarea class="primary_input_field form-control" cols="0" rows="4" name="note"><?php echo e(isset($assign_vehicle)? @$assign_vehicle->note:old('note')); ?></textarea>
                                           
                                            
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                         <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip">
                                            <span class="ti-check"></span>
                                            <?php if(isset($assign_vehicle)): ?>
                                                <?php echo app('translator')->get('transport.update_vehicle'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('transport.save_vehicle'); ?>
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
                                <h3 class="mb-15">  <?php echo app('translator')->get('transport.vehicle_list'); ?></h3>
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
                                        <th> <?php echo app('translator')->get('transport.vehicle_no'); ?></th>
                                        <th> <?php echo app('translator')->get('transport.model_no'); ?></th>
                                        <th> <?php echo app('translator')->get('transport.year_made'); ?></th>
                                        <th> <?php echo app('translator')->get('transport.driver_name'); ?></th>
                                        <th> <?php echo app('translator')->get('transport.driver_license'); ?></th>
                                        <th> <?php echo app('translator')->get('common.phone'); ?></th>
                                        <th> <?php echo app('translator')->get('common.action'); ?></th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    <?php $__currentLoopData = $assign_vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assign_vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(@$assign_vehicle->vehicle_no); ?></td>
                                        <td><?php echo e(@$assign_vehicle->vehicle_model); ?></td>
                                        <td><?php echo e(@$assign_vehicle->made_year); ?></td>
                                        <td><?php echo e((empty(@$assign_vehicle->driver->full_name))?'-':@$assign_vehicle->driver->full_name); ?>   </td> 
    
                                        <td><?php echo e((empty(@$assign_vehicle->driver->driving_license))?'-':@$assign_vehicle->driver->driving_license); ?>   </td> 
                                        <td><?php echo e((empty(@$assign_vehicle->driver->mobile))?'-':@$assign_vehicle->driver->mobile); ?>   </td> 
    
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
    
                                                    <?php if(userPermission('vehicle-edit')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(route('vehicle-edit', [@$assign_vehicle->id])); ?>"> <?php echo app('translator')->get('common.edit'); ?></a>
                                                    <?php endif; ?>
                                                   
                                                    <?php if(userPermission('vehicle-delete')): ?>
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#deleteRoomTypeModal<?php echo e(@$assign_vehicle->id); ?>"
                                                        href="#"> <?php echo app('translator')->get('common.delete'); ?></a>
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
                                    <div class="modal fade admin-query" id="deleteRoomTypeModal<?php echo e(@$assign_vehicle->id); ?>" >
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"> <?php echo app('translator')->get('transport.delete_vehicle'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
    
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4> <?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                    </div>
    
                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"> <?php echo app('translator')->get('common.cancel'); ?></button>
                                                         <?php echo e(Form::open(['route' => array('vehicle-delete',@$assign_vehicle->id), 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

                                                        <button class="primary-btn fix-gr-bg" type="submit"> <?php echo app('translator')->get('common.delete'); ?></button>
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/transport/vehicle.blade.php ENDPATH**/ ?>