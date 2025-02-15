<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('exam.marks_register'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<style>
    table thead th{
        white-space: nowrap;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('exam.marks_register'); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.examinations'); ?></a>
                    <a href="<?php echo e(route('marks_register')); ?>"><?php echo app('translator')->get('exam.marks_register'); ?></a>
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
                            <div class="col-lg-8 col-md-6 col-sm-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                                </div>
                            </div>
                            <?php if(userPermission('marks_register_create')): ?>
                                <div class="col-lg-4 text-md-right text-left col-md-6 mb-30-lg col-sm-6 text_sm_right">
                                    <a href="<?php echo e(route('marks_register_create')); ?>" class="primary-btn small fix-gr-bg">
                                        <span class="ti-plus pr-2"></span>
                                        <?php echo app('translator')->get('exam.add_marks'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'marks_register_search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">

                            <div class="col-lg-3 mt-30-md">
                                <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>" name="exam">
                                    <option data-display="<?php echo app('translator')->get('exam.select_exam'); ?> *" value=""><?php echo app('translator')->get('exam.select_exam'); ?> *</option>
                                    <?php $__currentLoopData = $exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$exam_type->id); ?>" <?php echo e(isset($exam_id)? ($exam_id == $exam_type->id? 'selected':''):''); ?>><?php echo e(@$exam_type->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('exam')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('exam')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-3 mt-30-md">
                                <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="class_subject" name="class">
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



                            <div class="col-lg-3 mt-30-md" id="select_class_subject_div">
                                <select class="primary_select form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?> select_class_subject" id="select_class_subject" name="subject">
                                    <option data-display="<?php echo app('translator')->get('common.select_subjects'); ?> *" value=""><?php echo app('translator')->get('common.select_subjects'); ?> *</option>
                                </select>
                                <?php if($errors->has('subject')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('subject')); ?>

                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-3 mt-30-md" id="m_select_subject_section_div">
                                <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> m_select_subject_section" id="m_select_subject_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> " value=""><?php echo app('translator')->get('common.select_section'); ?> </option>
                                </select>
                                <?php if($errors->has('section')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('section')); ?>

                                </span>
                                <?php endif; ?>
                            </div>

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

    <?php if(isset($students)): ?>

        <section class="mt-20">
            <div class="container-fluid p-0">

                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'marks_register_store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'marks_register_store'])); ?>



                <input type="hidden" name="exam_id" value="<?php echo e(@$exam_id); ?>">
                <input type="hidden" name="class_id" value="<?php echo e(@$class_id); ?>">
                <input type="hidden" name="section_id" value="<?php echo e(@$section_id); ?>">
                <input type="hidden" name="subject_id" value="<?php echo e(@$subject_id); ?>">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box mt-20">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="main-title">
                                        <h3 class="mb-15"><?php echo app('translator')->get('exam.marks_register'); ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                            <table id="default_table_searching" class="table" cellspacing="0" width="100%" >
                                <thead>
                                <tr>
                                    <th rowspan="2" ><?php echo app('translator')->get('student.admission_no'); ?>.</th>
                                    <th rowspan="2" ><?php echo app('translator')->get('student.roll_no'); ?>.</th>
                                    <th rowspan="2" ><?php echo app('translator')->get('common.student'); ?></th>
                                    <th rowspan="2" ><?php echo app('translator')->get('common.class_Sec'); ?></th>
                                    <th colspan="<?php echo e(@$number_of_exam_parts); ?>"> <?php echo e(@$subjectNames->subject_name); ?></th>
                                    <th rowspan="2"><?php echo app('translator')->get('exam.is_present'); ?></th>
                                </tr>
                                <tr>
                                    <?php $__currentLoopData = $marks_entry_form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <th><?php echo e(@$part->exam_title); ?> ( <?php echo e(@$part->exam_mark); ?> ) </th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $colspan = 3; $counter = 0;  ?>
                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($student->studentDetail->admission_no); ?>

                                            <input type="hidden" name="student_ids[]" value="<?php echo e(@$student->id); ?>">
                                            <input type="hidden" name="student_rolls[<?php echo e($student->id); ?>]" value="<?php echo e(@$student->roll_no); ?>">
                                            <input type="hidden" name="student_admissions[<?php echo e(@$student->id); ?>]" value="<?php echo e(@$student->admission_no); ?>">
                                        </td>
                                        <td><?php echo e(@$student->roll_no); ?></td>
                                        <td><?php echo e(@$student->studentDetail->full_name); ?></td>
                                        <td><?php echo e($student->class->class_name.'('.$student->section->section_name .')'); ?></td>
                                        <?php $entry_form_count=0; ?>
                                        <?php $__currentLoopData = $marks_entry_form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php

                                            $search_mark = App\SmMarkStore::get_mark_by_part($student->student->id, $exam_type_id, $class_id, $student->section_id, $subject_id, $part->id, $student->id);
                                            $is_absent = App\SmMarkStore::get_mark_by_part($student->student->id, $exam_type_id, $class_id, $section_id, $subject_id, $part->id, $student->id);

                                            ?>
                                            <td>
                                                <div class="primary_input mt-10">
                                                    <p><?php echo e(@$search_mark); ?></p>
                                                </div>
                                            </td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php

                                        $is_absent_check = App\SmMarksRegister::is_absent_check($part->exam_term_id, $part->class_id, $part->section_id, $part->subject_id,$student->student_id, $student->id);
                                        ?>
                                        <td>
                                            <div class="primary_input">
                                                <?php if(@$is_absent_check->attendance_type == 'P'): ?>
                                                    <button class="primary-btn small fix-gr-bg" type="button"><?php echo app('translator')->get('exam.present'); ?></button>
                                                <?php else: ?>
                                                    <button class="primary-btn small bg-danger text-white border-0" type="button"><?php echo app('translator')->get('exam.absent'); ?></button>
                                                <?php endif; ?>
                                            </div>

                                        </td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/examination/masks_register_search.blade.php ENDPATH**/ ?>