<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('common.subject'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('common.subject'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('library.library'); ?></a>
                <a href="#"><?php echo app('translator')->get('common.subject'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($subject)): ?>
          <?php if(userPermission('library_subject_store') ): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('library_subject')); ?>" class="primary-btn small fix-gr-bg">
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
                        <?php if(isset($subject)): ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'library_subject_update', 'method' => 'POST'])); ?>

                        <?php else: ?>
                        <?php if(userPermission('library_subject_store') ): ?>
      
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'library_subject_store', 'method' => 'POST'])); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15"><?php if(isset($subject)): ?>
                                        <?php echo app('translator')->get('library.edit_subject'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('library.add_subject'); ?>
                                    <?php endif; ?>
                                  
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('library.subject_name'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e(@$errors->has('subject_name') ? ' is-invalid' : ''); ?>" 
                                            type="text" name="subject_name" autocomplete="off" value="<?php echo e(isset($subject)? $subject->subject_name: old('subject_name')); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($subject)? $subject->id: ''); ?>">
                                           
                                            
                                            <?php if($errors->has('subject_name')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e(@$errors->first('subject_name')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  mt-15 d-none">
                                    <div class="col-lg-12">
                                        <div class="d-flex radio-btn-flex">
                                            <?php if(isset($subject)): ?>
                                            <div class="mr-30 d-none">
                                                <input type="radio" name="subject_type" id="relationFather" value="T" class="common-radio relationButton" <?php echo e(@$subject->subject_type == 'T'? 'checked':''); ?>>
                                                <label for="relationFather"><?php echo app('translator')->get('library.theory'); ?></label>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" name="subject_type" id="relationMother" value="P" class="common-radio relationButton" <?php echo e(@$subject->subject_type == 'P'? 'checked':''); ?>>
                                                <label for="relationMother"><?php echo app('translator')->get('library.practical'); ?></label>
                                            </div>
                                            <?php else: ?>
                                            <div class="mr-30">
                                                <input type="radio" name="subject_type" id="relationFather" value="T" class="common-radio relationButton" checked>
                                                <label for="relationFather"><?php echo app('translator')->get('library.theory'); ?></label>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" name="subject_type" id="relationMother" value="P" class="common-radio relationButton">
                                                <label for="relationMother"><?php echo app('translator')->get('library.practical'); ?></label>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  mt-15">
                                    <div class="col-lg-12 ">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.category'); ?> <span class="text-danger"> *</span></label>
                                        <select class="primary_select  form-control<?php echo e($errors->has('category') ? ' is-invalid' : ''); ?>" name="category">
                                            <option data-display=" <?php echo app('translator')->get('library.category_name'); ?>" value=""><?php echo app('translator')->get('library.category_name'); ?></option>
                                            <?php $__currentLoopData = $bookCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($subject)): ?>
                                                    <option value="<?php echo e($value->id); ?>" <?php echo e($value->id == $subject->sb_category_id? 'selected':''); ?>><?php echo e($value->category_name); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->category_name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('category')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('category')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            

                                <div class="row  mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('library.subject_code'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e($errors->has('subject_code') ? ' is-invalid' : ''); ?>" type="text" name="subject_code" autocomplete="off" value="<?php echo e(isset($subject)? $subject->subject_code: old('subject_code')); ?>">
                                           
                                            
                                            <?php if($errors->has('subject_code')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e(@$errors->first('subject_code')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                 <?php 
                                  $tooltip = "";
                                  if(userPermission('library_subject_store') || userPermission('library_subject_edit') ){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                       <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($subject)): ?>
                                                <?php echo app('translator')->get('library.update_subject'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('library.save_subject'); ?>
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
                                <h3 class="mb-15"><?php echo app('translator')->get('library.subject_list'); ?></h3>
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
                                        <th> <?php echo app('translator')->get('common.sl'); ?></th>
                                        <th> <?php echo app('translator')->get('common.subject'); ?></th>
                                        <th> <?php echo app('translator')->get('library.category_name'); ?></th>
                                        <th><?php echo app('translator')->get('library.subject_code'); ?></th>
                                        <th><?php echo app('translator')->get('common.action'); ?></th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    <?php $i=0; ?>
                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(++$i); ?></td>
                                        <td><?php echo e(@$subject->subject_name); ?></td>
                                        <td><?php echo e(@$subject->category->category_name); ?></td>
                                        <td><?php echo e(@$subject->subject_code); ?></td>
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
                                                    <?php if(userPermission('library_subject_edit')): ?>
                                                        <a class="dropdown-item" href="<?php echo e(route('library_subject_edit', [@$subject->id])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                    <?php endif; ?>
                                                    <?php if(userPermission('library_subject_delete')): ?>
                                                        <a class="dropdown-item" data-toggle="modal" data-target="#deleteSubjectModal<?php echo e(@$subject->id); ?>"  href="#"><?php echo app('translator')->get('common.delete'); ?></a>
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
                                     <div class="modal fade admin-query" id="deleteSubjectModal<?php echo e(@$subject->id); ?>" >
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo app('translator')->get('library.delete_subject'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
    
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                    </div>
    
                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                        <a href="<?php echo e(route('library_subject_delete', [@$subject->id])); ?>" class="text-light">
                                                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                                                         </a>
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/library/subject.blade.php ENDPATH**/ ?>