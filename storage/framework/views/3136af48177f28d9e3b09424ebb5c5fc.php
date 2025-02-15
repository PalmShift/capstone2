<?php $__env->startPush('css'); ?>
    <style>
        .ti-plus:before {
            padding: 0px 0px 0px 9px !important;
        }
        #firstMarkRow{
            margin-left: 8px !important;
        }
        #totalMark{
            padding-left: 0px !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.exam'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.exam'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.examination'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.exam'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($exam)): ?>
        <?php if(userPermission("exam-setup-store")): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('exam')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('common.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>

    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('exam-update',$exam->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

 

        <div class="row">
           
            <div class="col-lg-12">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30">
                                    <?php echo app('translator')->get('exam.edit_exam'); ?>
                            </h3>
                        </div>
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                    </div>
                                </div>
                                <?php if(moduleStatusCheck('University')): ?>
                                    <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                    <input type="hidden" name="id" id="id" value="<?php echo e($exam->id); ?>">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
                                            ['required' => 
                                                ['USN','UF', 'UD', 'UA', 'US', 'USL'],
                                                'div'=>'col-lg-4','hide'=> ['USUB'],'disabled'=>1
                                            ])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
                                            ['required' => 
                                                ['USN','UF', 'UD', 'UA', 'US', 'USL'],
                                                'div'=>'col-lg-4','hide'=> ['USUB'],'disabled'=>1
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="row mt-25">
                                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                        <input type="hidden" name="id" id="id" value="<?php echo e($exam->id); ?>">
                                        
                                        <div class="col-lg-6 mt-30-md">
                                            <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class" disabled="">
                                                <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(@$class->id); ?>"  <?php echo e(@$class->id == @$exam->class_id?'selected':''); ?>><?php echo e(@$class->class_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('class')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($errors->first('class')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-6 mt-30-md">
                                            <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="section"  disabled="">
                                                <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                                <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(@$section->section_id); ?>" <?php echo e(@$section->section_id == @$exam->section_id?'selected':''); ?>><?php echo e(@$section->sectionName->section_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('class')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($errors->first('class')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="row mt-25">
                                        <div class="col-lg-6 mt-30-md">
                                            <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="section" disabled="">
                                                <option data-display="<?php echo app('translator')->get('common.select_subjects'); ?> *" value=""><?php echo app('translator')->get('common.select_subjects'); ?> *</option>
                                                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(@$subject->subject_id); ?>" <?php echo e(@$subject->subject_id == @$exam->subject_id?'selected':''); ?>><?php echo e(@$subject->subject->subject_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('class')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($errors->first('class')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-6 mt-30-md">
                                            <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="section" disabled="">
                                                <option data-display="<?php echo app('translator')->get('common.select_exam_type'); ?> *" value=""><?php echo app('translator')->get('common.select_exam_type'); ?> *</option>
                                                <?php $__currentLoopData = $exams_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exams_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(@$exams_type->id); ?>" <?php echo e(@$exams_type->id == @$exam->exam_type_id?'selected':''); ?>><?php echo e(@$exams_type->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('class')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($errors->first('class')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="row mt-25">
                                    <div class="col-lg-6">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.exam_mark'); ?> <span class="text-danger"> *</span></label>
                                            <input oninput="numberMinZeroCheck(this)" class="primary_input_field form-control<?php echo e($errors->has('exam_marks') ? ' is-invalid' : ''); ?>"
                                            type="text" name="exam_marks" id="exam_mark_main" autocomplete="off" onkeypress="return isNumberKey(event)" value="<?php echo e(isset($exam)? $exam->exam_mark: 0); ?>" required="">
                                          
                                            
                                            <?php if($errors->has('exam_marks')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('exam_marks')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if(generalSetting()->result_type == 'mark'): ?>
                                    <div class="col-lg-6">
                                        <div class="primary_input">
                                            <input oninput="numberMinZeroCheck(this)" class="primary_input_field form-control<?php echo e($errors->has('pass_mark') ? ' is-invalid' : ''); ?>"
                                            type="text" name="pass_mark" id="pass_mark" autocomplete="off" onkeypress="return isNumberKey(event)" value="<?php echo e(isset($exam)? $exam->pass_mark: 0); ?>" required="">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.pass_mark'); ?> <span class="text-danger"> *</span></label>
                                            
                                            <?php if($errors->has('pass_mark')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('pass_mark')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?> 
                                </div>
                            </div>
                            <div class="row mt-40">
                                 <div class="col-lg-10">
                                    <div class="main-title">
                                        <h5><?php echo app('translator')->get('exam.add_mark_distributions'); ?> </h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-right">
                                    <button type="button" class="primary-btn icon-only fix-gr-bg" onclick="addRowMark();" id="addRowBtn">
                                    <span class="ti-plus pr-2"></span></button>
                                </div>
                            </div>

                            <table class="table" id="productTable">
                                <thead>
                                    <tr>
                                      <th><?php echo app('translator')->get('exam.exam_title'); ?></th>
                                      <th><?php echo app('translator')->get('exam.exam_mark'); ?></th>
                                      <th><?php echo app('translator')->get('common.action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; $totalMark = 0; ?>
                                <?php $__currentLoopData = $exam->GetExamSetup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $i++; $totalMark += $row->exam_mark; ?>
                                  <tr id="row1" class="mt-40">
                                    <td class="border-top-0">
                                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">  
                                        <div class="primary_input">
                                            <input type="hidden" value="<?php echo app('translator')->get('exam.title'); ?>" id="lang">
                                            <input class="primary_input_field form-control<?php echo e($errors->has('exam_title') ? ' is-invalid' : ''); ?>"
                                                type="text" id="exam_title" name="exam_title[]" autocomplete="off" value="<?php echo e(@$row->exam_title); ?>">
                                                
                                        </div>
                                    </td>
                                    <td class="border-top-0">
                                        <div class="primary_input">
                                            <input oninput="numberCheck(this)" class="primary_input_field form-control<?php echo e($errors->has('exam_mark') ? ' is-invalid' : ''); ?> exam_mark"
                                            type="text" id="exam_mark" name="exam_mark[]" onkeypress="return isNumberKey(event)" autocomplete="off"   value="<?php echo e(@$row->exam_mark); ?>">
                                        </div>
                                    </td> 
                                    <td  class="border-top">
                                         <button class="primary-btn icon-only fix-gr-bg" id="firstMarkRow" type="button" id="<?php echo e($i != 1? 'removeMark':''); ?>">
                                             <span class="ti-trash"></span>
                                        </button>
                                       
                                    </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <tfoot>
                                        <tr>
                                           <td class="border-top-0"><?php echo app('translator')->get('exam.result'); ?></td>

                                           <td class="border-top-0" id="totalMark">
                                             <input type="text" class="primary_input_field form-control" onkeypress="return isNumberKey(event)" name="totalMark" readonly="true" value="<?php echo e(@$totalMark); ?>">
                                           </td>
                                           <td class="border-top-0"></td>
                                       </tr>
                                   </tfoot>
                               </tbody>
                            </table>                              
                            <div class="row mt-40">
                                <div class="col-lg-12 text-center">
                                    <button class="primary-btn fix-gr-bg">
                                        <span class="ti-check"></span>
                                        
                                            <?php echo app('translator')->get('common.update'); ?>
                                        
                                        <?php echo app('translator')->get('exam.mark_distribution'); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo e(Form::close()); ?>


</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/examination/examEdit.blade.php ENDPATH**/ ?>