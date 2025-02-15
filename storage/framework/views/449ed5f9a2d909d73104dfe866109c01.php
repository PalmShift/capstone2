<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('exam.exam_attendance_create'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php $__env->startPush('css'); ?>
        <style>
            .primary-btn.mr-40.fix-gr-bg.nowrap.submit {
                position: relative;
                left: -85px;
            }
        </style>
    <?php $__env->stopPush(); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('exam.exam_attendance'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.examination'); ?></a>
                    <a href="<?php echo e(route('exam_attendance')); ?>"><?php echo app('translator')->get('exam.exam_attendance'); ?></a>
                    <a href="<?php echo e(route('exam_attendance_create')); ?>"><?php echo app('translator')->get('exam.exam_attendance_create'); ?></a>
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
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'exam_attendance_create_search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

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
                                        <option data-display="<?php echo app('translator')->get('exam.select_exam'); ?> *" value=""><?php echo app('translator')->get('exam.select_exam'); ?> *
                                        </option>
                                        <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(@$exam->id); ?>"
                                                <?php echo e(isset($exam_id) ? ($exam_id == $exam->id ? 'selected' : '') : ''); ?>>
                                                <?php echo e(@$exam->title); ?></option>
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
                                        class="primary_select form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?> select_subject"
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

            <?php if(isset($students)): ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'exam-attendance-store', 'method' => 'POST'])); ?>

                <?php if(moduleStatusCheck('University')): ?>
                    <input type="hidden" name="un_session_id" value="<?php echo e(@$un_session->id); ?>">
                    <input type="hidden" name="un_faculty_id" value="<?php echo e(@$un_faculty->id); ?>">
                    <input type="hidden" name="un_department_id" value="<?php echo e(@$un_department->id); ?>">
                    <input type="hidden" name="un_academic_id" value="<?php echo e(@$un_academic->id); ?>">
                    <input type="hidden" name="un_semester_id" value="<?php echo e(@$un_semester->id); ?>">
                    <input type="hidden" name="un_semester_label_id" value="<?php echo e(@$un_semester_label->id); ?>">
                    <input type="hidden" name="un_section_id" value="<?php echo e(@$un_section->id); ?>">
                    <div class="row mt-40">
                        <div class="col-lg-12">
                            <input class="examId" type="hidden" name="exam_id" value="<?php echo e(@$exam_id); ?>">
                            <input class="subjectId" type="hidden" name="un_subject_id" value="<?php echo e(@$subject_id); ?>">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="white-box">
                                        <div class="row">
                                            <div class="col-lg-12 no-gutters mb-15">
                                                <div class="main-title">
                                                    <h3><?php echo app('translator')->get('exam.exam_attendance'); ?> | <strong><?php echo app('translator')->get('exam.subject'); ?></strong>:
                                                        <?php echo e($subjectName->subject_name); ?></h3>
                                                    <?php if ($__env->exists('university::exam._university_info')) echo $__env->make('university::exam._university_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table school-table-style shadow-none p-0" cellspacing="0"
                                                width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="25%"><?php echo app('translator')->get('student.admission_no'); ?></th>
                                                        <th width="25%"><?php echo app('translator')->get('student.student_name'); ?></th>
                                                        <th width="25%"><?php echo app('translator')->get('student.roll_number'); ?></th>
                                                        <th width="25%"><?php echo app('translator')->get('exam.attendance'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php if(count($exam_attendance_childs) == 0): ?>
                                                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e(@$record->studentDetail->admission_no); ?></td>
                                                                <td><?php echo e(@$record->studentDetail->full_name); ?></td>
                                                                <td><?php echo e(@$record->roll_no ? $record->roll_no : ''); ?></td>
                                                                <td>
                                                                    <div class="d-flex radio-btn-flex">
                                                                        <div class="mr-20">
                                                                            <input type="hidden"
                                                                                name="attendance[<?php echo e(@$record->student_record_id); ?>]"
                                                                                value="<?php echo e(@$record->student_record_id); ?>">
                                                                            <input type="hidden"
                                                                                name="attendance[<?php echo e(@$record->student_record_id); ?>][student]"
                                                                                value="<?php echo e(@$record->student_id); ?>">
                                                                            <input type="radio"
                                                                                name="attendance[<?php echo e(@$record->student_record_id); ?>][attendance_type]"
                                                                                id="attendanceP<?php echo e(@$record->student_record_id); ?>"
                                                                                value="P" class="common-radio attd"
                                                                                checked>
                                                                            <label
                                                                                for="attendanceP<?php echo e($record->id); ?>"><?php echo app('translator')->get('student.present'); ?></label>
                                                                        </div>
                                                                        <div class="mr-20">
                                                                            <input type="radio"
                                                                                name="attendance[<?php echo e(@$record->student_record_id); ?>][attendance_type]"
                                                                                id="attendanceL<?php echo e(@$record->student_record_id); ?>"
                                                                                value="A" class="common-radio">
                                                                            <label
                                                                                for="attendanceL<?php echo e($record->student_record_id); ?>"><?php echo app('translator')->get('student.absent'); ?></label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <?php $__currentLoopData = $exam_attendance_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e(@$student->studentInfo != '' ? @$student->studentInfo->admission_no : ''); ?>

                                                                </td>
                                                                <td><?php echo e(@$student->studentInfo != '' ? @$student->studentInfo->full_name : ''); ?>

                                                                </td>
                                                                <td><?php echo e(@$student->studentRecord != '' ? @$student->studentRecord->roll_no : ''); ?>

                                                                </td>
                                                                <td>
                                                                    <input type="hidden"
                                                                        name="attendance[<?php echo e(@$student->student_record_id); ?>]"
                                                                        value="<?php echo e(@$student->student_record_id); ?>">
                                                                    <input type="hidden"
                                                                        name="attendance[<?php echo e(@$student->student_record_id); ?>][student]"
                                                                        value="<?php echo e(@$student->student_id); ?>">
                                                                    <div class="d-flex radio-btn-flex">
                                                                        <div class="mr-20">
                                                                            <input type="radio"
                                                                                name="attendance[<?php echo e(@$student->student_record_id); ?>][attendance_type]"
                                                                                id="attendanceP<?php echo e(@$student->student_record_id); ?>"
                                                                                value="P" class="common-radio"
                                                                                <?php echo e(@$student->attendance_type == 'P' ? 'checked' : ''); ?>>
                                                                            <label
                                                                                for="attendanceP<?php echo e(@$student->student_record_id); ?>"><?php echo app('translator')->get('student.present'); ?></label>
                                                                        </div>
                                                                        <div class="mr-20">
                                                                            <input type="radio"
                                                                                name="attendance[<?php echo e(@$student->student_record_id); ?>][attendance_type]"
                                                                                id="attendanceL<?php echo e(@$student->student_record_id); ?>"
                                                                                value="A" class="common-radio"
                                                                                <?php echo e(@$student->attendance_type == 'A' ? 'checked' : ''); ?>>
                                                                            <label
                                                                                for="attendanceL<?php echo e(@$student->student_record_id); ?>"><?php echo app('translator')->get('student.absent'); ?></label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="primary-btn fix-gr-bg nowrap submit">
                                                <?php echo app('translator')->get('exam.save_attendance'); ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="row mt-40">
                        <div class="col-lg-12">

                            <input class="examId" type="hidden" name="exam_id" value="<?php echo e(@$exam_id); ?>">
                            <input class="subjectId" type="hidden" name="subject_id" value="<?php echo e(@$subject_id); ?>">
                            <input class="classId" type="hidden" name="class_id" value="<?php echo e(@$class_id); ?>">
                            <input class="sectionId" type="hidden" name="section_id" value="<?php echo e(@$section_id); ?>">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="white-box">
                                        <div class="row">
                                            <div class="col-lg-12 no-gutters">
                                                <div class="main-title">
                                                    <h3 class="mb-15"><?php echo app('translator')->get('exam.exam_attendance'); ?> | <small><?php echo app('translator')->get('common.class'); ?>:
                                                            <?php echo e($search_info['class_name']); ?>, <?php echo app('translator')->get('common.section'); ?>:
                                                            <?php echo e($search_info['section_name']); ?>, <?php echo app('translator')->get('common.subject'); ?>:
                                                            <?php echo e($search_info['subject_name']); ?></small></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table school-table-style shadow-none p-0" cellspacing="0"
                                                width="100%">
                                                <thead>

                                                    <tr>
                                                        <th width="25%"><?php echo app('translator')->get('student.admission_no'); ?></th>
                                                        <th width="25%"><?php echo app('translator')->get('student.student_name'); ?></th>
                                                        <th width="25%"><?php echo app('translator')->get('common.class_Sec'); ?></th>
                                                        <th width="25%"><?php echo app('translator')->get('student.roll_number'); ?></th>
                                                        <th width="25%"><?php echo app('translator')->get('exam.attendance'); ?></th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php if(count($exam_attendance_childs) == 0): ?>
                                                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e(@$record->studentDetail->admission_no); ?></td>
                                                                <td><?php echo e(@$record->studentDetail->full_name); ?></td>
                                                                <td><?php echo e(@$record->class->class_name); ?>

                                                                    (<?php echo e(@$record->section->section_name); ?>)
                                                                </td>
                                                                <td><?php echo e(@$record->roll_no ? $record->roll_no : ''); ?></td>
                                                                <td>
                                                                    <div class="d-flex radio-btn-flex">
                                                                        <div class="mr-20">
                                                                            <input type="hidden"
                                                                                name="attendance[<?php echo e(@$record->id); ?>]"
                                                                                value="<?php echo e(@$record->id); ?>">
                                                                            <input type="hidden"
                                                                                name="attendance[<?php echo e(@$record->id); ?>][student]"
                                                                                value="<?php echo e(@$record->student_id); ?>">
                                                                            <input type="hidden"
                                                                                name="attendance[<?php echo e(@$record->id); ?>][class]"
                                                                                value="<?php echo e(@$record->class_id); ?>">
                                                                            <input type="hidden"
                                                                                name="attendance[<?php echo e(@$record->id); ?>][section]"
                                                                                value="<?php echo e(@$record->section_id); ?>">
                                                                            <input type="radio"
                                                                                name="attendance[<?php echo e(@$record->id); ?>][attendance_type]"
                                                                                id="attendanceP<?php echo e(@$record->id); ?>"
                                                                                value="P" class="common-radio attd"
                                                                                checked>
                                                                            <label
                                                                                for="attendanceP<?php echo e($record->id); ?>"><?php echo app('translator')->get('student.present'); ?></label>
                                                                        </div>
                                                                        <div class="mr-20">
                                                                            <input type="radio"
                                                                                name="attendance[<?php echo e(@$record->id); ?>][attendance_type]"
                                                                                id="attendanceL<?php echo e(@$record->id); ?>"
                                                                                value="A" class="common-radio">
                                                                            <label
                                                                                for="attendanceL<?php echo e($record->id); ?>"><?php echo app('translator')->get('student.absent'); ?></label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <?php $__currentLoopData = $exam_attendance_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo e(@$student->studentInfo != '' ? @$student->studentInfo->admission_no : ''); ?>


                                                                </td>
                                                                <td><?php echo e(@$student->studentInfo != '' ? @$student->studentInfo->full_name : ''); ?>

                                                                </td>
                                                                <td><?php echo e(@$student->studentRecord->class->class_name); ?>

                                                                    (<?php echo e(@$student->studentRecord->section->section_name); ?>)
                                                                </td>
                                                                <td><?php echo e(@$student->studentRecord != '' ? @$student->studentRecord->roll_no : ''); ?>

                                                                </td>
                                                                <td>
                                                                    <input type="hidden"
                                                                        name="attendance[<?php echo e(@$student->student_record_id); ?>]"
                                                                        value="<?php echo e(@$student->student_record_id); ?>">
                                                                    <input type="hidden"
                                                                        name="attendance[<?php echo e(@$student->student_record_id); ?>][student]"
                                                                        value="<?php echo e(@$student->student_id); ?>">
                                                                    <input type="hidden"
                                                                        name="attendance[<?php echo e(@$student->student_record_id); ?>][class]"
                                                                        value="<?php echo e(@$student->class_id); ?>">
                                                                    <input type="hidden"
                                                                        name="attendance[<?php echo e(@$student->student_record_id); ?>][section]"
                                                                        value="<?php echo e(@$student->section_id); ?>">
                                                                    <div class="d-flex radio-btn-flex">
                                                                        <div class="mr-20">
                                                                            <input type="radio"
                                                                                name="attendance[<?php echo e(@$student->student_record_id); ?>][attendance_type]"
                                                                                id="attendanceP<?php echo e(@$student->student_record_id); ?>"
                                                                                value="P" class="common-radio"
                                                                                <?php echo e(@$student->attendance_type == 'P' ? 'checked' : ''); ?>>
                                                                            <label
                                                                                for="attendanceP<?php echo e(@$student->student_record_id); ?>"><?php echo app('translator')->get('student.present'); ?></label>
                                                                        </div>
                                                                        <div class="mr-20">
                                                                            <input type="radio"
                                                                                name="attendance[<?php echo e(@$student->student_record_id); ?>][attendance_type]"
                                                                                id="attendanceL<?php echo e(@$student->student_record_id); ?>"
                                                                                value="A" class="common-radio"
                                                                                <?php echo e(@$student->attendance_type == 'A' ? 'checked' : ''); ?>>
                                                                            <label
                                                                                for="attendanceL<?php echo e(@$student->student_record_id); ?>"><?php echo app('translator')->get('student.absent'); ?></label>
                                                                        </div>
                                                                    </div>
                                        </div>
                                        </td>
                                        </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($new_students)): ?>
                    <?php $__currentLoopData = $new_students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student_record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(@$student_record->studentDetail->admission_no); ?></td>
                            <td><?php echo e(@$student_record->studentDetail->full_name); ?></td>
                            <td><?php echo e(@$student_record->class->class_name); ?>

                                (<?php echo e(@$student_record->section->section_name); ?>)
                            </td>
                            <td><?php echo e(@$student_record->roll_no); ?></td>
                            <td>
                                <div class="d-flex radio-btn-flex">
                                    <div class="mr-20">
                                        <input type="hidden" name="attendance[<?php echo e(@$student_record->id); ?>]"
                                            value="<?php echo e(@$student_record->id); ?>">
                                        <input type="hidden" name="attendance[<?php echo e(@$student_record->id); ?>][student]"
                                            value="<?php echo e(@$student_record->student_id); ?>">
                                        <input type="hidden" name="attendance[<?php echo e(@$student_record->id); ?>][class]"
                                            value="<?php echo e(@$student_record->class_id); ?>">
                                        <input type="hidden" name="attendance[<?php echo e(@$student_record->id); ?>][section]"
                                            value="<?php echo e(@$student_record->section_id); ?>">
                                        <input type="radio"
                                            name="attendance[<?php echo e(@$student_record->id); ?>][attendance_type]"
                                            id="attendanceP<?php echo e(@$student_record->id); ?>" value="P"
                                            class="common-radio attd">
                                        <label for="attendanceP<?php echo e($student_record->id); ?>"><?php echo app('translator')->get('student.present'); ?></label>
                                    </div>
                                    <div class="mr-20">
                                        <input type="radio"
                                            name="attendance[<?php echo e(@$student_record->id); ?>][attendance_type]"
                                            id="attendanceL<?php echo e(@$student_record->id); ?>" value="A"
                                            class="common-radio">
                                        <label for="attendanceL<?php echo e($student_record->id); ?>"><?php echo app('translator')->get('student.absent'); ?></label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endif; ?>
            </tbody>
            </table>
            <div class="text-center mt-3">
                <button type="submit" class="primary-btn fix-gr-bg nowrap submit">
                    <?php echo app('translator')->get('exam.save_attendance'); ?>
                </button>
            </div>
        </div>
        <?php echo e(Form::close()); ?>

        </div>
        </div>
        </div>
        </div>
        <?php endif; ?>
        <?php echo e(Form::close()); ?>

        <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/examination/exam_attendance_create.blade.php ENDPATH**/ ?>