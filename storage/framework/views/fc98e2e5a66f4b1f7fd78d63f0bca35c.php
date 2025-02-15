                                
                              
                                    <?php if(moduleStatusCheck('University')): ?>
                                    <div class="row  mt-25">
                                        <div class="col-lg-12">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.select_exam_type'); ?> <span class="text-danger"> *</span></label>
                                            <?php $__currentLoopData = $exams_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exams_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="primary_input">
                                                    <input type="checkbox" id="exams_types_<?php echo e(@$exams_type->id); ?>" class="common-checkbox exam-checkbox" name="exams_types[]" value="<?php echo e(@$exams_type->id); ?>" <?php echo e(isset($selected_exam_type_id)? ($exams_type->id == $selected_exam_type_id? 'checked':''):''); ?>>
                                                    <label for="exams_types_<?php echo e(@$exams_type->id); ?>"><?php echo e(@$exams_type->title); ?></label>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <div class="primary_input">
                                                <input type="checkbox" id="all_exams" class="common-checkbox" name="all_exams[]" value="0" <?php echo e((is_array(old('class_ids')) and in_array($class->id, old('class_ids'))) ? ' checked' : ''); ?>>
                                                <label for="all_exams"><?php echo app('translator')->get('exam.all_select'); ?></label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <?php if($errors->has('exams_types')): ?>
                                                <span class="text-danger validate-textarea-checkbox" role="alert">
                                                    <?php echo e($errors->first('exams_types')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
                                    ['required' => 
                                        ['USN', 'UD', 'UA', 'US', 'USL'],
                                        'div'=>'col-lg-12','row'=>1,'hide'=> ['USUB'],'mt'=>'mt-0'
                                    ])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
                                    ['required' => 
                                        ['USN', 'UD', 'UA', 'US', 'USL'],
                                        'div'=>'col-lg-12','row'=>1,'hide'=> ['USUB'],'mt'=>'mt-0'
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <label class="mt-30"><?php echo app('translator')->get('university::un.select_subject'); ?> <span class="text-danger"> *</span></label>
                                    <div class="row" id="universityExamSubejct"></div>
                                        <div class="text-center loader loader_style" id="unSubjectLoader">
                                            <img src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader" height="60px" width="60px">
                                        </div>
                                <?php else: ?>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.select_exam_type'); ?> <span class="text-danger"> *</span></label>
                                            <?php $__currentLoopData = $exams_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exams_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="primary_input">
                                                    <input type="checkbox" id="exams_types_<?php echo e(@$exams_type->id); ?>" class="common-checkbox exam-checkbox" name="exams_types[]" value="<?php echo e(@$exams_type->id); ?>" <?php echo e(isset($selected_exam_type_id)? ($exams_type->id == $selected_exam_type_id? 'checked':''):''); ?>>
                                                    <label for="exams_types_<?php echo e(@$exams_type->id); ?>"><?php echo e(@$exams_type->title); ?></label>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <div class="primary_input">
                                                <input type="checkbox" id="all_exams" class="common-checkbox" name="all_exams[]" value="0" <?php echo e((is_array(old('class_ids')) and in_array($class->id, old('class_ids'))) ? ' checked' : ''); ?>>
                                                <label for="all_exams"><?php echo app('translator')->get('exam.all_select'); ?></label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <?php if($errors->has('exams_types')): ?>
                                                <span class="text-danger validate-textarea-checkbox" role="alert">
                                                    <?php echo e($errors->first('exams_types')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <select class="primary_select form-control <?php echo e($errors->has('class_ids') ? ' is-invalid' : ''); ?>" id="exam_class" name="class_ids">
                                                <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(@$class->id); ?>"><?php echo e(@$class->class_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('class_ids')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('class_ids')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mt-25" id="exam_subejct">
                                    </div>
                                    <?php endif; ?> 


<?php if(moduleStatusCheck('University')): ?>
<script src="<?php echo e(asset('Modules/University/Resources/assets/js/app.js')); ?>"></script>
<?php else: ?> 
<script src="<?php echo e(asset('public/backEnd/js/custom.js')); ?>"></script>
<script src="<?php echo e(asset('public/backEnd/js/developer.js')); ?>"></script>
<?php endif; ?> 

                               
                                  <?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/examination/exam_setup/multi_exam_setup.blade.php ENDPATH**/ ?>