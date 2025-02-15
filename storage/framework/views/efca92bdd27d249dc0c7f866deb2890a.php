<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('exam.add_marks'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        input.primary_input_field.marks_input {
            min-width: 101px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('exam.add_marks'); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.examination'); ?></a>
                    <a href="<?php echo e(route('marks_register')); ?>"><?php echo app('translator')->get('exam.marks_register'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.add_marks'); ?></a>
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
                                <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                            </div>
                        </div>
                    </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'marks_register_create_search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">

                            <?php if(moduleStatusCheck('University')): ?>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <?php if ($__env->exists(
                                            'university::common.session_faculty_depart_academic_semester_level',
                                            [
                                                'required' => ['USN', 'UD', 'UA', 'US', 'USL', 'USEC'],
                                                'hide' => ['USUB'],
                                            ]
                                        )) echo $__env->make(
                                            'university::common.session_faculty_depart_academic_semester_level',
                                            [
                                                'required' => ['USN', 'UD', 'UA', 'US', 'USL', 'USEC'],
                                                'hide' => ['USUB'],
                                            ]
                                        , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                        <div class="col-lg-3 mt-30" id="select_exam_typ_subject_div">
                                            <?php echo e(Form::select('exam_type', ['' => __('exam.select_exam') . '*'], null, ['class' => 'primary_select  form-control' . ($errors->has('exam_type') ? ' is-invalid' : ''), 'id' => 'select_exam_typ_subject'])); ?>


                                            <div class="pull-right loader loader_style" id="select_exam_type_loader">
                                                <img class="loader_img_style"
                                                    src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                            </div>
                                            <?php if($errors->has('exam_type')): ?>
                                                <span class="text-danger custom-error-message" role="alert">
                                                    <?php echo e(@$errors->first('exam_type')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-lg-3 mt-30" id="select_un_exam_type_subject_div">
                                            <?php echo e(Form::select('subject_id', ['' => __('exam.select_subject') . '*'], null, ['class' => 'primary_select  form-control' . ($errors->has('subject_id') ? ' is-invalid' : ''), 'id' => 'select_un_exam_type_subject'])); ?>


                                            <div class="pull-right loader loader_style" id="select_exam_subject_loader">
                                                <img class="loader_img_style"
                                                    src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                            </div>
                                            <?php if($errors->has('subject_id')): ?>
                                                <span class="text-danger custom-error-message" role="alert">
                                                    <?php echo e(@$errors->first('subject_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-lg-3 mt-30-md">
                                    <select
                                        class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>"
                                        name="exam">
                                        <option data-display="<?php echo app('translator')->get('exam.select_exam'); ?> *" value=""><?php echo app('translator')->get('exam.select_exam'); ?> *</option>

                                        <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($exam->id); ?>"
                                                <?php echo e(isset($exam_id) ? ($exam_id == $exam->id ? 'selected' : '') : ''); ?>>
                                                <?php echo e($exam->title); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                    <?php if($errors->has('exam')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('exam')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-3 mt-30-md">
                                    <select
                                        class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                        id="class_subject" name="class">
                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *
                                        </option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($class->id); ?>"
                                                <?php echo e(isset($class_id) ? ($class_id == $class->id ? 'selected' : '') : ''); ?>>
                                                <?php echo e($class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('class')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('class')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-lg-3 mt-30-md" id="select_class_subject_div">
                                    <select
                                        class="primary_select form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?> select_class_subject"
                                        id="select_class_subject" name="subject">
                                        <option data-display="<?php echo app('translator')->get('common.select_subject'); ?> *" value=""><?php echo app('translator')->get('common.select_subject'); ?> *
                                        </option>
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_subject_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                            alt="loader">
                                    </div>
                                    <?php if($errors->has('subject')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('subject')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-3 mt-30-md" id="m_select_subject_section_div">
                                    <select
                                        class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> m_select_subject_section"
                                        id="m_select_subject_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?> " value=" "><?php echo app('translator')->get('common.select_section'); ?>
                                        </option>
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_section_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                            alt="loader">
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
    <section>
        <section class="mt-20">
            <?php if(isset($students)): ?>
                <?php if(moduleStatusCheck('University')): ?>
                    <div class="container-fluid p-0">
                        <div class="white-box mt-40">
                        <div class="row">
                            <div class="col-lg-12 col-md-6 mb-30">
                                <div class="main-title">
                                    <h3><?php echo app('translator')->get('exam.add_marks'); ?> | <?php echo app('translator')->get('exam.exam'); ?>: <?php echo e(@$exam_type->title); ?></h3>
                                    <?php if ($__env->exists('university::exam._university_info')) echo $__env->make('university::exam._university_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>

                        <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'marks_register_store', 'method' => 'POST', 'id' => 'marks_register_store'])); ?>

                        <input type="hidden" name="exam_id" value="<?php echo e($exam_id); ?>">
                        <input type="hidden" name="exam_type_id" value="<?php echo e($exam_type_id); ?>">
                        <input type="hidden" name="subject_id" value="<?php echo e($subject_id); ?>">
                        <input type="hidden" name="un_session_id" value="<?php echo e(@$un_session->id); ?>">
                        <input type="hidden" name="un_faculty_id" value="<?php echo e(@$un_faculty->id); ?>">
                        <input type="hidden" name="un_department_id" value="<?php echo e(@$un_department->id); ?>">
                        <input type="hidden" name="un_academic_id" value="<?php echo e(@$un_academic->id); ?>">
                        <input type="hidden" name="un_semester_id" value="<?php echo e(@$un_semester->id); ?>">
                        <input type="hidden" name="un_semester_label_id" value="<?php echo e(@$un_semester_label->id); ?>">
                        <input type="hidden" name="un_section_id" value="<?php echo e(@$un_section->id); ?>">

                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table school-table-style" cellspacing="0" width="100%">
                                    <thead class="text-nowrap">
                                        <tr>
                                            <th rowspan="2"><?php echo app('translator')->get('student.admission_no'); ?>.</th>
                                            <th rowspan="2"><?php echo app('translator')->get('student.roll_no'); ?>.</th>
                                            <th rowspan="2"><?php echo app('translator')->get('common.student'); ?></th>
                                            <th class="text-center" colspan="<?php echo e($number_of_exam_parts + 1); ?>">
                                                <?php echo e($subjectName->subject_name); ?></th>
                                            <th rowspan="2"><?php echo app('translator')->get('exam.is_present'); ?></th>
                                        </tr>
                                        <tr>
                                            <?php $__currentLoopData = $marks_entry_form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <th><?php echo e($part->exam_title); ?> ( <?php echo e($part->exam_mark); ?> ) </th>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <th><?php echo app('translator')->get('common.teacher'); ?> <?php echo app('translator')->get('reports.remarks'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $colspan = 3;
                                            $counter = 0;
                                            $request = (object) [
                                                'un_session_id' => $un_session->id,
                                                'un_faculty_id' => @$un_faculty->id,
                                                'un_department_id' => $un_department->id,
                                                'un_academic_id' => $un_academic->id,
                                                'un_semester_id' => $un_semester->id,
                                                'un_section_id' => null,
                                                'un_semester_label_id' => $un_semester_label->id,
                                            ];
                                        ?>
                                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $absent_check = App\SmMarksRegister::un_is_absent_check($exam_id, $request, $subject_id, $record->student_id, $record->student_record_id);
                                            ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden"
                                                        name="markStore[<?php echo e($record->student_record_id); ?>]"
                                                        value="<?php echo e($record->student_record_id); ?>">
                                                    <input type="hidden"
                                                        name="markStore[<?php echo e($record->student_record_id); ?>][student]"
                                                        value="<?php echo e($record->student_id); ?>">
                                                    <input type="hidden"
                                                        name="markStore[<?php echo e($record->student_record_id); ?>][roll_no]"
                                                        value="<?php echo e($record->roll_no); ?>">
                                                    <input type="hidden"
                                                        name="markStore[<?php echo e($record->student_record_id); ?>][adimission_no]"
                                                        value="<?php echo e($record->studentDetail->admission_no); ?>">
                                                    <?php if(@$absent_check->attendance_type != 'P'): ?>
                                                        <input type="hidden"
                                                            name="markStore[<?php echo e($record->student_record_id); ?>][absent_students]"
                                                            value="<?php echo e($record->student_record_id); ?>">
                                                    <?php endif; ?>
                                                    <?php echo e($record->studentDetail->admission_no); ?>

                                                </td>
                                                <td><?php echo e($record->roll_no); ?></td>
                                                <td><?php echo e($record->studentDetail->full_name); ?></td>
                                                <?php $entry_form_count=0; ?>
                                                <?php $__currentLoopData = $marks_entry_form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $d = 5 + rand()%5;   ?>
                                                    <td>
                                                        <div class="primary_input">
                                                            <input type="hidden" name="exam_setup_ids[]"
                                                                value="<?php echo e($part->id); ?>">
                                                            <?php
                                                            $search_mark = App\SmMarkStore::un_get_mark_by_part($record->student_id, $request, $part->exam_term_id, $part->un_subject_id, $part->id, $record->id);
                                                            ?>
                                                            <input oninput="numberCheckWithDot(this)"
                                                                class="primary_input_field marks_input" type="text"
                                                                step="any" max="<?php echo e(@$part->exam_mark); ?>"
                                                                name="markStore[<?php echo e($record->student_record_id); ?>][marks][<?php echo e($part->id); ?>]"
                                                                value="<?php echo e(!empty($search_mark) ? $search_mark : 0); ?>">
                                                            <input class="primary_input_field" type="hidden"
                                                                name="markStore[<?php echo e($record->student_record_id); ?>][exam_Sids][<?php echo e($entry_form_count++); ?>]"
                                                                value="<?php echo e($part->id); ?>">
                                                            <input type="hidden"
                                                                id="markStore[<?php echo e($record->student_record_id); ?>][part_marks][<?php echo e($part->id); ?>]"
                                                                name="part_marks" value="<?php echo e($part->exam_mark); ?>">
                                                            <label><?php echo e($part->exam_title); ?> Mark</label>

                                                        </div>
                                                    </td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                $teacher_remarks = App\SmMarkStore::un_teacher_remarks($record->student_id, $exam_type_id, $request, $subject_id, $record->student_record_id);
                                                ?>
                                                <td>
                                                    <div class="primary_input">
                                                        <input class="primary_input_field" type="text"
                                                            name="markStore[<?php echo e($record->id); ?>][teacher_remarks]"
                                                            value="<?php echo e($teacher_remarks); ?>">
                                                        <label class="primary_input_label"
                                                            for=""><?php echo app('translator')->get('teacher'); ?> <?php echo app('translator')->get('remarks'); ?></label>
                                                    </div>
                                                </td>
                                                <?php $is_absent_check = App\SmMarkStore::un_is_absent_check($record->student_id, $part->exam_term_id, $request, $part->subject_id, $record->student_record_id); ?>
                                                <td>
                                                    <div class="primary_input">
                                                        <?php if(@$absent_check->attendance_type == 'P'): ?>
                                                            <button class="primary-btn small fix-gr-bg"
                                                                type="button"><?php echo app('translator')->get('exam.present'); ?></button>
                                                        <?php else: ?>
                                                            <button class="primary-btn small bg-danger text-white border-0"
                                                                type="button"><?php echo app('translator')->get('exam.absent'); ?></button>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(userPermission('marks_register_create')): ?>
                                            <tr>
                                                <td colspan="<?php echo e(count($marks_entry_form) + 5); ?>" class="text-center">
                                                    <button type="submit" class="primary-btn fix-gr-bg mt-20 submit">
                                                        <span class="ti-check"></span>
                                                        <?php echo app('translator')->get('exam.save_marks'); ?>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="container-fluid p-0">
                        <div class="white-box mt-40">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('exam.add_marks'); ?> |
                                        <small><?php echo app('translator')->get('exam.exam'); ?>: <?php echo e($search_info['exam_name']); ?>, <?php echo app('translator')->get('common.class'); ?>:
                                            <?php echo e($search_info['class_name']); ?>, <?php echo app('translator')->get('common.section'); ?>:
                                            <?php echo e($search_info['section_name']); ?>

                                    </h3>
                                </div>
                            </div>
                        </div>

                        <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'marks_register_store', 'method' => 'POST', 'id' => 'marks_register_store'])); ?>

                        <input type="hidden" name="exam_id" value="<?php echo e($exam_id); ?>">
                        <input type="hidden" name="class_id" value="<?php echo e($class_id); ?>">
                        <input type="hidden" name="section_id" value="<?php echo e($section_id); ?>">
                        <input type="hidden" name="subject_id" value="<?php echo e($subject_id); ?>">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table school-table-style add-marks-register-table" cellspacing="0"
                                        width="100%">
                                        <thead class="text-nowrap">
                                            <tr>
                                                <th rowspan="2"><?php echo app('translator')->get('student.admission_no'); ?>.</th>
                                                <th rowspan="2"><?php echo app('translator')->get('student.roll_no'); ?>.</th>
                                                <th rowspan="2"><?php echo app('translator')->get('common.class_Sec'); ?></th>
                                                <th rowspan="2"><?php echo app('translator')->get('common.student'); ?></th>
                                                <th class="text-center" colspan="<?php echo e($number_of_exam_parts + 1); ?>">
                                                    <?php echo e($subjectNames->subject_name); ?></th>
                                                <th rowspan="2"><?php echo app('translator')->get('exam.is_present'); ?></th>
                                            </tr>
                                            <tr>
                                                <?php $__currentLoopData = $marks_entry_form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <th><?php echo e($part->exam_title); ?> ( <?php echo e($part->exam_mark); ?> ) </th>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <th><?php echo app('translator')->get('common.teacher'); ?> <?php echo app('translator')->get('reports.remarks'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $colspan = 3;
                                                $counter = 0;
                                            ?>
                                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $absent_check = App\SmMarksRegister::is_absent_check($exam_type->id, $class_id, $record->section_id, $subject_id, $record->student_id, $record->id);
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="markStore[<?php echo e($record->id); ?>]"
                                                            value="<?php echo e($record->id); ?>">
                                                        <input type="hidden"
                                                            name="markStore[<?php echo e($record->id); ?>][student]"
                                                            value="<?php echo e($record->student_id); ?>">
                                                        <input type="hidden"
                                                            name="markStore[<?php echo e($record->id); ?>][class]"
                                                            value="<?php echo e($record->class_id); ?>">
                                                        <input type="hidden"
                                                            name="markStore[<?php echo e($record->id); ?>][section]"
                                                            value="<?php echo e($record->section_id); ?>">
                                                        <input type="hidden"
                                                            name="markStore[<?php echo e($record->id); ?>][roll_no]"
                                                            value="<?php echo e($record->roll_no); ?>">
                                                        <input type="hidden"
                                                            name="markStore[<?php echo e($record->id); ?>][adimission_no]"
                                                            value="<?php echo e($record->studentDetail->admission_no); ?>">
                                                        <?php if(@$absent_check->attendance_type != 'P' && !isSkip('exam_attendance')): ?>
                                                            <input type="hidden"
                                                                name="markStore[<?php echo e($record->id); ?>][absent_students]"
                                                                value="<?php echo e($record->id); ?>">
                                                        <?php endif; ?>
                                                        <?php echo e($record->studentDetail->admission_no); ?>

                                                    </td>
                                                    <td><?php echo e($record->roll_no); ?></td>
                                                    <td><?php echo e($record->class->class_name . '(' . $record->section->section_name . ')'); ?>

                                                    </td>
                                                    <td><?php echo e($record->studentDetail->full_name); ?></td>
                                                    <?php $entry_form_count=0; ?>
                                                    <?php $__currentLoopData = $marks_entry_form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php $d = 5 + rand()%5;   ?>
                                                        <td>
                                                            <div class="primary_input">
                                                                <input type="hidden" name="exam_setup_ids[]"
                                                                    value="<?php echo e($part->id); ?>">
                                                                <?php
                                                                $search_mark = App\SmMarkStore::get_mark_by_part($record->student_id, $part->exam_term_id, $part->class_id, $part->section_id, $part->subject_id, $part->id, $record->id);
                                                                ?>
                                                                <input oninput="numberCheckWithDot(this); preventNegative(this)"
                                                                    class="primary_input_field marks_input" type="number"
                                                                    step="any" min="0"  max="<?php echo e(@$part->exam_mark); ?>"
                                                                    name="markStore[<?php echo e($record->id); ?>][marks][<?php echo e($part->id); ?>]"
                                                                    value="<?php echo e(!empty($search_mark) ? $search_mark : 0); ?>"
                                                                    <?php echo e(@($absent_check->attendance_type == 'A' || @$absent_check->attendance_type == '') && !isSkip('exam_attendance') ? 'readonly' : ''); ?>>

                                                                <input class="primary_input_field" type="hidden"
                                                                    name="markStore[<?php echo e($record->id); ?>][exam_Sids][<?php echo e($entry_form_count++); ?>]"
                                                                    value="<?php echo e($part->id); ?>">

                                                                <input type="hidden"
                                                                    id="markStore[<?php echo e($record->id); ?>][part_marks][<?php echo e($part->id); ?>]"
                                                                    name="part_marks" value="<?php echo e($part->exam_mark); ?>">
                                                            </div>
                                                        </td>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                    $teacher_remarks = App\SmMarkStore::teacher_remarks($record->student_id, $exam_type->id, $record->class_id, $record->section_id, $subject_id, $record->id);
                                                    ?>
                                                    <td>
                                                        <div class="primary_input">
                                                            <input class="primary_input_field" type="text"
                                                                name="markStore[<?php echo e($record->id); ?>][teacher_remarks]"
                                                                value="<?php echo e($teacher_remarks); ?>"
                                                                <?php echo e(@($absent_check->attendance_type == 'A' || @$absent_check->attendance_type == '') && !isSkip('exam_attendance') ? 'readonly' : ''); ?>>
                                                        </div>
                                                    </td>
                                                    <?php $is_absent_check = App\SmMarkStore::is_absent_check($record->student_id, $part->exam_term_id, $part->class_id, $part->section_id, $part->subject_id, $record->id); ?>
                                                    <td>
                                                        <div class="primary_input">
                                                            <?php if(@$absent_check->attendance_type == 'P'): ?>
                                                                <button class="primary-btn small fix-gr-bg"
                                                                    type="button"><?php echo app('translator')->get('exam.present'); ?></button>
                                                            <?php else: ?>
                                                                <button
                                                                    class="primary-btn small bg-danger text-white border-0"
                                                                    type="button"><?php echo app('translator')->get('exam.absent'); ?></button>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                            <?php if(userPermission('marks_register_create')): ?>
                                                <tr>
                                                    <td colspan="<?php echo e(count($marks_entry_form) + 5); ?>"
                                                        class="text-center">
                                                        <button type="submit" class="primary-btn fix-gr-bg mt-20 submit">
                                                            <span class="ti-check"></span>
                                                            <?php echo app('translator')->get('exam.save_marks'); ?>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </section>

        <script>
            function preventNegative(input) {
                if (input.value < 0) {
                    input.value = Math.abs(input.value);
                }
            }
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/examination/masks_register_create.blade.php ENDPATH**/ ?>