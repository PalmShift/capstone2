<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('dormitory.dormitory_rooms'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>

<?php  $setting = app('school_info');
 if(!empty($setting->currency_symbol)){ $currency = $setting->currency_symbol; }else{ $currency = '$'; } 
?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('dormitory.dormitory_rooms'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('dormitory.dormitory'); ?></a>
                <a href="#"><?php echo app('translator')->get('dormitory.dormitory_rooms'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($room_list)): ?>
        <?php if(userPermission("room-list-store")): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('room-list-index')); ?>" class="primary-btn small fix-gr-bg">
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
                        <?php if(isset($room_list)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('room-list-update',$room_list->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                        <?php else: ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'room-list-store',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15"><?php if(isset($room_list)): ?>
                                        <?php echo app('translator')->get('dormitory.edit_dormitory_rooms'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('dormitory.add_dormitory_rooms'); ?>
                                    <?php endif; ?>
                                 
                                </h3>
                            </div>
                            <div class="add-visitor">
                                
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('dormitory.dormitory'); ?> <span class="text-danger"> *</span></label>
                                        <select class="primary_select  form-control<?php echo e($errors->has('dormitory') ? ' is-invalid' : ''); ?>" name="dormitory">
                                            <option data-display="<?php echo app('translator')->get('dormitory.dormitory'); ?> *" value=""><?php echo app('translator')->get('dormitory.dormitory'); ?> *</option>
                                            <?php $__currentLoopData = $dormitory_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dormitory_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($room_list)): ?>
                                                <option value="<?php echo e(@$dormitory_list->id); ?>" <?php echo e(@$dormitory_list->id == @$room_list->dormitory_id? 'selected': ''); ?>><?php echo e(@$dormitory_list->dormitory_name); ?></option>
                                                <?php else: ?>
                                                <option value="<?php echo e(@$dormitory_list->id); ?>" <?php echo e(old('dormitory') == @$dormitory_list->id? 'selected':''); ?>><?php echo e(@$dormitory_list->dormitory_name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('dormitory')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('dormitory')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('dormitory.room_number'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                                type="text" name="name" autocomplete="off" value="<?php echo e(isset($room_list)? $room_list->name: old('name')); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($room_list)? $room_list->id: ''); ?>">
                                            
                                            
                                            <?php if($errors->has('name')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('name')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.type'); ?> <span class="text-danger"> *</span></label>
                                        <select class="primary_select  form-control<?php echo e($errors->has('room_type') ? ' is-invalid' : ''); ?>" name="room_type">
                                            <option data-display="<?php echo app('translator')->get('dormitory.room_type'); ?> *" value=""><?php echo app('translator')->get('dormitory.room_type'); ?> *</option>
                                            <?php $__currentLoopData = $room_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <?php if(isset($room_list)): ?>
                                                <option value="<?php echo e(@$room_type->id); ?>" <?php echo e(@$room_type->id == @$room_list->room_type_id? 'selected': ''); ?>><?php echo e(@$room_type->type); ?></option>
                                                <?php else: ?>
                                                <option value="<?php echo e(@$room_type->id); ?>" <?php echo e(old('room_type') == @$room_type->id? 'selected':''); ?>><?php echo e(@$room_type->type); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('room_type')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('room_type')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row  mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('dormitory.number_of_bed'); ?> <span class="text-danger"> *</span></label>
                                            <input oninput="numberCheck(this)" class="primary_input_field form-control<?php echo e($errors->has('number_of_bed') ? ' is-invalid' : ''); ?>" type="text" name="number_of_bed" value="<?php echo e(isset($room_list)? $room_list->number_of_bed: old('number_of_bed')); ?>">
                                           
                                            
                                            <?php if($errors->has('number_of_bed')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('number_of_bed')); ?>

                                        </span>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('dormitory.cost_per_bed'); ?><span class="text-danger"> *</span></label>
                                            <input oninput="numberCheck(this)" class="primary_input_field form-control<?php echo e($errors->has('cost_per_bed') ? ' is-invalid' : ''); ?>" type="text" step="0.1" name="cost_per_bed" value="<?php echo e(isset($room_list)? $room_list->cost_per_bed: old('cost_per_bed')); ?>">
                                            
                                            
                                            <?php if($errors->has('cost_per_bed')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('cost_per_bed')); ?>

                                        </span>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?> <span></span></label>
                                            <textarea class="primary_input_field form-control" cols="0" rows="4" name="description"><?php echo e(isset($room_list)? $room_list->description: old('description')); ?></textarea>
                                          
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                       <button class="primary-btn fix-gr-bg submit" >
                                            <span class="ti-check"></span>
                                            <?php if(isset($room_list)): ?>
                                                <?php echo app('translator')->get('dormitory.update_room'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('dormitory.save_room'); ?>
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
                                <h3 class="mb-15"> <?php echo app('translator')->get('dormitory.dormitory_room_list'); ?></h3>
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
                                        <th><?php echo app('translator')->get('common.sl'); ?></th>
                                        <th><?php echo app('translator')->get('dormitory.dormitory'); ?></th>
                                        <th><?php echo app('translator')->get('dormitory.room_number'); ?></th>
                                        <th><?php echo app('translator')->get('dormitory.room_type'); ?></th>
                                        <th><?php echo app('translator')->get('dormitory.no_of_bed'); ?></th>
                                        <th><?php echo app('translator')->get('dormitory.cost_per_bed'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                        <th><?php echo app('translator')->get('common.action'); ?></th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    <?php $__currentLoopData = $room_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$room_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td><?php echo e(isset($room_list->dormitory->dormitory_name)? $room_list->dormitory->dormitory_name:''); ?></td>
                                        <td><?php echo e(@$room_list->name); ?></td>
                                        <td><?php echo e(isset($room_list->roomType->type)? $room_list->roomType->type: ''); ?></td>
                                        <td><?php echo e(@$room_list->number_of_bed); ?></td>
                                        <td><?php echo e(@$room_list->cost_per_bed); ?></td>
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
    
                                                    <a class="dropdown-item" href="<?php echo e(route('room-list-edit', [$room_list->id])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
    
    
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#deleteRoomTypeModal<?php echo e($room_list->id); ?>"
                                                        href="#"><?php echo app('translator')->get('common.delete'); ?></a>
    
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
                                    <div class="modal fade admin-query" id="deleteRoomTypeModal<?php echo e(@$room_list->id); ?>" >
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo app('translator')->get('dormitory.delete_room'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
    
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                    </div>
    
                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                         <?php echo e(Form::open(['route' => array('room-list-delete',$room_list->id), 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/dormitory/room_list.blade.php ENDPATH**/ ?>