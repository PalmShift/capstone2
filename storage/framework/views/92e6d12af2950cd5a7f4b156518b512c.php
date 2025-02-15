<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.exam_schedule_create'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.exam_schedule_create'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.examination'); ?></a>
                <a href="<?php echo e(route('exam_schedule')); ?>"><?php echo app('translator')->get('exam.exam_schedule'); ?></a>
                <a href="<?php echo e(route('exam_schedule_create')); ?>"><?php echo app('translator')->get('exam.exam_schedule_create'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'exam_schedule_create_store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">

                                <?php if(moduleStatusCheck('University')): ?>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
                                            ['required' => 
                                                ['USN', 'UD', 'UA', 'US', 'USL', 'USEC'],'hide'=> ['USUB']
                                            ])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
                                            ['required' => 
                                                ['USN', 'UD', 'UA', 'US', 'USL', 'USEC'],'hide'=> ['USUB']
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                            <div class="col-lg-3 mt-25" id="select_exam_typ_subject_div">
                                                <label class="primary_input_label" for="">
                                                    <?php echo e(__('common.exam')); ?> *
                                                </label>
                                                <?php echo e(Form::select('exam_type',["" =>__('exam.select_exam').'*'], null , ['class' => 'primary_select  form-control'. ($errors->has('exam_type') ? ' is-invalid' : ''), 'id'=>'select_exam_typ_subject'])); ?>

                                                
                                                <div class="pull-right loader loader_style" id="select_exam_type_loader">
                                                    <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                                </div>
                                                <?php if($errors->has('exam_type')): ?>
                                                    <span class="text-danger custom-error-message" role="alert">
                                                        <?php echo e(@$errors->first('exam_type')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="col-lg-4 mt-30-md">
                                        <label class="primary_input_label" for="">
                                            <?php echo e(__('common.exam')); ?>

                                                <span class="text-danger"> *</span>
                                        </label>
                                        <select class="primary_select form-control<?php echo e($errors->has('exam_type') ? ' is-invalid' : ''); ?>" name="exam_type">
                                            <option data-display="<?php echo app('translator')->get('exam.select_exam'); ?> *" value=""><?php echo app('translator')->get('exam.select_exam'); ?> *</option>
                                            <?php $__currentLoopData = $exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(@$exam->id); ?>" <?php echo e(isset($exam_id)? ($exam_id == $exam->id? 'selected':''):''); ?>><?php echo e(@$exam->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('exam_type')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('exam_type')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-4 mt-30-md">
                                        <label class="primary_input_label" for="">
                                            <?php echo e(__('common.class')); ?>

                                                <span class="text-danger"> *</span>
                                        </label>
                                        <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                            <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(@$class->id); ?>" <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e(@$class->class_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('class')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('class')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-4 mt-30-md" id="select_section_div">
                                        <label class="primary_input_label" for="">
                                            <?php echo e(__('common.section')); ?>

                                                <span class="text-danger"> </span>
                                        </label>
                                        <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section" id="select_section" name="section">
                                            <option data-display="<?php echo app('translator')->get('common.select_section'); ?> " value=""><?php echo app('translator')->get('common.select_section'); ?> </option>
                                        </select>
                                        <div class="pull-right loader loader_style" id="select_section_loader">
                                            <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                        </div>
                                        <?php if($errors->has('section')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('section')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small fix-gr-bg">
                                        <span class="ti-search pr-2"></span>
                                        <?php echo app('translator')->get('common.search'); ?>
                                    </button>
                                </div>
                            </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if(moduleStatusCheck('University')): ?>
        <?php if ($__env->exists('university::exam.exam_routine')) echo $__env->make('university::exam.exam_routine', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php if(isset($assign_subjects)): ?>
        <section class="mt-20">
            <div class="container-fluid p-0">
                <div class="row mt-40">
                    <div class="col-lg-6 col-md-6">
                        <div class="main-title">
                            <h3 class="mb-15"><?php echo app('translator')->get('exam.exam_schedule'); ?></h3>
                        </div>
                    </div>
                </div>

            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'exam_schedule_store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'exam_schedule_store'])); ?> 
                <?php if(!moduleStatusCheck('University')): ?>
                    <input type="hidden" name="class_id" id="class_id" value="<?php echo e(@$class_id); ?>">
                    <input type="hidden" name="section_id" id="section_id" value="<?php echo e(@$section_id); ?>">
                <?php endif; ?>
                <input type="hidden" name="exam_id" id="exam_id" value="<?php echo e(@$exam_id); ?>"> 

                <div class="row">
                    <div class="col-lg-12">
                        <table class="table school-table-style" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="10%"><?php echo app('translator')->get('exam.subject'); ?></th>
                                    <th width="10%"><?php echo app('translator')->get('common.class_Sec'); ?></th>
                                    <?php $__currentLoopData = $exam_periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam_period): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <th><?php echo e(@$exam_period->period); ?><br><?php echo e(date('h:i A', strtotime(@$exam_period->start_time)).'-'.date('h:i A', strtotime(@$exam_period->end_time))); ?></th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $section_id_all = $section_id;
                                ?>
                                <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assign_subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(@$assign_subject->subject !=""?@$assign_subject->subject->subject_name:""); ?></td>
                                        <td><?php echo e(@$assign_subject->class !=""? @$assign_subject->class->class_name:""); ?>(<?php echo e(@$assign_subject->section !=""?@$assign_subject->section->section_name:""); ?>)</td>
                                            <?php $__currentLoopData = $exam_periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam_period): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $assigned_routine = App\SmExamSchedule::assignedRoutine($class_id, $assign_subject->section_id, $exam_id, $assign_subject->subject_id, $exam_period->id);
                                                ?>
                                            <td>
                                                <?php if(@$assigned_routine == ""): ?>
                                                    <?php if(@$assigned_routine_subject == ""): ?>
                                                        <?php if(userPermission('add-exam-routine-modal')): ?>
                                                        <div class="col-lg-6">
                                                            <a href="<?php echo e(route('add-exam-routine-modal', [$assign_subject->subject_id, $exam_period->id, $class_id, $assign_subject->section_id, $exam_id,$section_id_all])); ?>" class="primary-btn small tr-bg icon-only mr-10 modalLink" data-modal-size="modal-md" title="<?php echo app('translator')->get('exam.create_exam_routine'); ?>">
                                                                <span class="ti-plus" id="addClassRoutine"></span>
                                                            </a>
                                                        </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <div class="col-lg-6">
                                                        <span class="">
                                                            <?php echo e(@$assigned_routine->classRoom !=""?@$assigned_routine->classRoom->room_no:""); ?></span>
                                                            <br>
                                                        <span class="">                                           
                                                            <?php echo e(@$assigned_routine->date != ""? dateConvert($assigned_routine->date):''); ?>

                                                        </span>
                                                        </br>
                                                        <a href="<?php echo e(route('edit-exam-routine-modal', [$assign_subject->subject_id, $exam_period->id, $class_id, $assign_subject->section_id, $exam_id, $assigned_routine->id,$section_id_all])); ?>" class="modalLink" data-modal-size="modal-md" title="<?php echo app('translator')->get('common.edit_exam_routine'); ?>">
                                                            <span class="ti-pencil-alt" id="addClassRoutine"></span>
                                                        </a>
                                                        <a href="<?php echo e(route('delete-exam-routine-modal', [$assigned_routine->id,$section_id_all])); ?>" class="modalLink" data-modal-size="modal-md" title="<?php echo app('translator')->get('common.delete_exam_routine'); ?>">
                                                            <span class="ti-trash" id="addClassRoutine"></span>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php echo e(Form::close()); ?>    
            </div>
        </section>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/examination/exam_schedule_create.blade.php ENDPATH**/ ?>