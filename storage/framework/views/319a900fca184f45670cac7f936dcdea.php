<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('exam.exam_schedule_create'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .input-right-icon {
            z-index: inherit !important;
        }

        .school-table-style tr td:not(.timepicker td),
        .school-table-style tr th {
            min-width: 150px;
        }

        .school-table-style tr td:nth-child(9),
        .school-table-style tr th:nth-child(9) {
            min-width: auto;
            text-align: center
        }

        .school-table-style tr td:last-child,
        .school-table-style tr th:last-child {
            min-width: auto;
        }

        .primary_input_field.primary_input_field.date:not(.timepicker td) {
            min-width: 150px;
        }

        .school-table-style {
            padding-bottom: 200px;
        }

        .timepicker td {
            padding: 1px !important;
        }

        .timepicker td>button {
            margin-left: 0;
        }
    </style>
<?php $__env->stopPush(); ?>
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
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'exam_schedule_create_store', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="col-lg-4 mt-30-md">
                                <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>"
                                    name="exam_type">
                                    <option data-display="<?php echo app('translator')->get('exam.select_exam'); ?> *" value=""><?php echo app('translator')->get('exam.select_exam'); ?> *</option>
                                    <?php $__currentLoopData = $exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$exam_type->id); ?>"
                                            <?php echo e(isset($exam_type_id) ? ($exam_type_id == $exam_type->id ? 'selected' : '') : ''); ?>>
                                            <?php echo e(@$exam_type->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('exam_type')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('exam_type')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 mt-30-md">
                                <select
                                    class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                    id="select_class" name="class">
                                    <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$class->id); ?>"
                                            <?php echo e(isset($class_id) ? ($class_id == $class->id ? 'selected' : '') : ''); ?>>
                                            <?php echo e(@$class->class_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('class')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('class')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 mt-30-md" id="select_section_div">
                                <select
                                    class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section"
                                    id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> " value=""><?php echo app('translator')->get('common.select_section'); ?> </option>
                                    <?php if(isset($class_id)): ?>
                                        <?php $__currentLoopData = $search_current_class->classSection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($section->sectionName->id); ?>"
                                                <?php echo e($section_id == $section->sectionName->id ? 'selected' : ''); ?>>
                                                <?php echo e($section->sectionName->section_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
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
    <?php if(isset($exam_schedule)): ?>
        <section class="mt-20">
            <div class="container-fluid p-0">
                <div class="white-box mt-40">
                    <div class="row">
                        <div class="col-lg-9 col-md-9">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('exam.exam_schedule'); ?> |
                                    <small>
                                        <?php echo app('translator')->get('exam.exam'); ?>: <?php echo e(@$examName != '' ? $examName : ' '); ?>,
                                        <?php echo app('translator')->get('common.class'); ?>:
                                        <?php echo e(@$search_current_class != '' ? $search_current_class->class_name : ' '); ?>,
                                        <?php echo app('translator')->get('common.section'); ?>:
                                        <?php echo e(@$search_current_section != '' ? $search_current_section->section_name : 'All Sections'); ?>,
    
                                    </small>
                                </h3>
                            </div>
                        </div>
    
                        <div class="col-lg-3  col-md-3 mb-4 mb-md-0">
                            <a href="<?php echo e(route('exam-routine-print', [$class_id, $section_id, $exam_type_id])); ?>"
                                class="primary-btn small fix-gr-bg pull-left" target="_blank"><i class="ti-printer"> </i>
                                <?php echo app('translator')->get('common.print'); ?></a>
                            <button class="primary-btn small fix-gr-bg pull-right" onclick="addRowInExamRoutine();"
                                id="addRowBtn"> <span class="ti-plus pr-2"></span> <?php echo app('translator')->get('common.add'); ?></button>
                        </div>
                    </div>
    
    
                    <?php echo e(Form::open([
                        'class' => 'form-horizontal',
                        'files' => true,
                        'route' => 'add-exam-routine-store',
                        'method' => 'POST',
                        'enctype' => 'multipart/form-data',
                        'name' => 'myForm',
                        'id' => 'validateAddNewExamRoutine',
                    ])); ?>

    
                    <input type="hidden" name="class_id" id="class_id" value="<?php echo e(@$class_id); ?>">
                    <input type="hidden" name="section_id" id="section_id" value="<?php echo e(@$section_id); ?>">
                    <input type="hidden" name="exam_type_id" id="exam_type_id" value="<?php echo e(@$exam_type_id); ?>">
    
    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive school-table-style">
                                <table class="table" cellspacing="0" width="100%" id="examRoutineTable">
                                    <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('academics.subject'); ?></th>
                                            <th><?php echo app('translator')->get('common.class'); ?> </th>
                                            <th><?php echo app('translator')->get('common.section'); ?></th>
                                            <th><?php echo app('translator')->get('common.teacher'); ?></th>
                                            <th><?php echo app('translator')->get('common.date'); ?> </th>
                                            <th><?php echo app('translator')->get('academics.start_time'); ?></th>
                                            <th><?php echo app('translator')->get('exam.end_time'); ?></th>
                                            <th><?php echo app('translator')->get('common.room'); ?></th>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <input type="hidden" id="row_count" value="<?php echo e($exam_schedule->count() + 1); ?>">
                                        <?php $__currentLoopData = $exam_schedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row => $routine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="0" id="row_<?php echo e($row); ?>">
                                                <td class="border-top-0">
                                                    <div class="primary_input">
                                                        <select class="primary_select"
                                                            name="routine[<?php echo e($row); ?>][subject]" id="subject"
                                                            data-rule-required="true" required>
                                                            <option data-display="<?php echo app('translator')->get('common.select_subject'); ?> *"><?php echo app('translator')->get('common.select_subject'); ?> *
                                                            </option>
    
                                                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($subject->id); ?>"
                                                                    <?php echo e($routine->subject_id == $subject->id ? 'selected' : ''); ?>>
                                                                    <?php echo e(@$subject->subject_name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
    
                                                        <span class="text-danger subject_error"></span>
                                                    </div>
                                                </td>
    
                                                <td class="border-top-0">
                                                    <div class="row">
                                                        <div class="col-lg-12">
    
                                                            <select class="primary_select  promote_class" readonly disabled
                                                                id="promote_class" name="routine[<?php echo e($row); ?>][class]"
                                                                required>
                                                                <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value="">
                                                                    <?php echo app('translator')->get('common.select_class'); ?> *</option>
                                                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e(@$class->id); ?>"
                                                                        <?php echo e($class_id == $class->id ? 'selected' : ''); ?>>
                                                                        <?php echo e($class->class_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <?php if($errors->has('class')): ?>
                                                                <span class="text-danger invalid-select" role="alert">
                                                                    <?php echo e($errors->first('class')); ?>

                                                                </span>
                                                            <?php endif; ?>
    
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border-top-0">
    
                                                    <div class="row">
    
                                                        <div class="col-lg-12" id="promote_section_div">
    
                                                            <select class="primary_select"
                                                                name="routine[<?php echo e($row); ?>][section]" required>
    
                                                                <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value="">
                                                                    <?php echo app('translator')->get('common.select_section'); ?> *
                                                                </option>
    
                                                                <?php $__currentLoopData = $search_current_class->classSection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($section->sectionName->id); ?>"
                                                                        <?php echo e($routine->section_id == $section->sectionName->id ? 'selected' : ''); ?>>
                                                                        <?php echo e($section->sectionName->section_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    
                                                            </select>
    
                                                            <?php if($errors->has('section')): ?>
                                                                <span class="text-danger invalid-select" role="alert">
                                                                    <?php echo e($errors->first('section')); ?></span>
                                                            <?php endif; ?>
    
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border-top-0">
                                                    <div class="row " id="teacher-div">
                                                        <div class="col-lg-12">
                                                            <select class="primary_select  form-control"
                                                                name="routine[<?php echo e($row); ?>][teacher_id]">
                                                                <option data-display="<?php echo app('translator')->get('common.select_teacher'); ?>" required
                                                                    value=""><?php echo app('translator')->get('common.select_teacher'); ?></option>
                                                                <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e(@$teacher->id); ?>"
                                                                        <?php echo e($routine->teacher_id == $teacher->id ? 'selected' : ''); ?>>
                                                                        <?php echo e(@$teacher->full_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <div class="pull-right loader loader_style"
                                                                id="select_teacher_loader">
                                                                <img class="loader_img_style"
                                                                    src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                                    alt="loader">
                                                            </div>
                                                            <span class="text-danger" id="teacher_error"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border-top-0">
    
                                                    <div class="col-lg-12">
                                                        <div class="primary_input mb-15">
    
                                                            <div class="primary_datepicker_input">
                                                                <div class="no-gutters input-right-icon">
                                                                    <div class="col">
                                                                        <div class="">
                                                                            <input
                                                                                class="primary_input_field primary_input_field date form-control"
                                                                                id="startDate" type="text"
                                                                                name="routine[<?php echo e($row); ?>][date]"
                                                                                value="<?php echo e(isset($routine) ? date('m/d/Y', strtotime(@$routine->date)) : date('m/d/Y')); ?>"
                                                                                autocomplete="off" required>
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn-date" data-id="#date_of_birth"
                                                                        type="button">
                                                                        <i class="ti-calendar" id="start-date-icon"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
    
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border-top-0">
                                                    <div class="row no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="primary_input">
                                                                <input
                                                                    class="primary_input_field primary_input_field time start_time_required start_time  form-control<?php echo e(@$errors->has('start_time') ? ' is-invalid' : ''); ?>"
                                                                    type="text" id="start_time_<?php echo e($row); ?>"
                                                                    name="routine[<?php echo e($row); ?>][start_time]"
                                                                    value="<?php echo e(isset($routine) ? $routine->start_time : ''); ?>"
                                                                    required>
    
    
                                                                <span class="text-danger start_time_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button class="" type="button">
                                                                <i class="ti-timer"></i>
                                                            </button>
                                                        </div>
                                                    </div>
    
                                                </td>
    
                                                <td class="border-top-0">
                                                    <div class="row no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="primary_input">
                                                                <input
                                                                    class="primary_input_field primary_input_field time end_time form-control<?php echo e(@$errors->has('end_time') ? ' is-invalid' : ''); ?>"
                                                                    id="end_time_<?php echo e($row); ?>" type="text"
                                                                    name="routine[<?php echo e($row); ?>][end_time]"
                                                                    data-row_id="<?php echo e($row); ?>"
                                                                    value="<?php echo e(isset($routine) ? $routine->end_time : ''); ?>"
                                                                    required>
    
    
                                                                <span class="text-danger end_time_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button class="" type="button">
                                                                <i class="ti-timer"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
    
    
                                                <td class="border-top-0">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <select class="primary_select  form-control"
                                                                name="routine[<?php echo e($row); ?>][room]" id="room"
                                                                required>
                                                                <option data-display="<?php echo app('translator')->get('common.select_room'); ?> *" value="">
                                                                    <?php echo app('translator')->get('common.select_room'); ?> *</option>
                                                                <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e(@$room->id); ?>"
                                                                        <?php echo e(isset($routine) ? ($routine->room_id == $room->id ? 'selected' : '') : ''); ?>>
                                                                        <?php echo e(@$room->room_no); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <span class="text-danger" id="room_error"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border-top-0">
    
                                                    <?php if(userPermission('delete-class-routine')): ?>
                                                        <button class="primary-btn icon-only fix-gr-bg removeExamRoutineRowBtn"
                                                            data-row_id="<?php echo e($row); ?>"
                                                            data-exam_routine_id="<?php echo e($routine->id); ?>" type="button">
                                                            <span class="ti-trash"></span>
                                                        </button>
                                                    <?php endif; ?>
    
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-lg-12 mt-20 text-center">
                        <button class="primary-btn fix-gr-bg">
                            <span class="ti-check"></span>
                            <?php echo app('translator')->get('common.save'); ?>
                        </button>
                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </section>
    <?php endif; ?>
    <div class="modal fade" id="classRoutineDeleteModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo app('translator')->get('common.delete_exam_routine'); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="text-center">
                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                    </div>

                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>

                        <button class="primary-btn fix-gr-bg"
                            id="classRoutineDeleteSubmitButton"><?php echo app('translator')->get('common.delete'); ?></button>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <?php if(isset($exam_schedule)): ?>
        <?php $__env->startPush('script'); ?>
            <script>
                addRowInExamRoutine = () => {
                    $("#addRowBtn").button("loading");
                    var tableLength = $("#examRoutineTable tbody tr").length;
                    var url = $("#url").val();

                    let row_count = parseInt($('#row_count').val());
                    var tr = `<tr class="0" id="row_${row_count}">
                        
                                                <td  class="border-top-0">
                                                    <div class="primary_input" >
                                                            <select class="primary_select" name="routine[${row_count}][subject]" id="subject" required>
                                                                <option data-display="<?php echo app('translator')->get('common.select_subject'); ?> *" ><?php echo app('translator')->get('common.select_subject'); ?> *</option>

                                                                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        
                                                                    <option value="<?php echo e(@$subject->id); ?>" ><?php echo e(@$subject->subject_name); ?></option>
                                                            
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            
                                                            <span class="text-danger subject_error"></span>  
                                                    </div>
                                                </td>
                                                <td class="border-top-0">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                    
                                                            <select class="primary_select  promote_class" readonly disabled  id="promote_class" name="routine[${row_count}][class]" required>
                                                                <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e(@$class->id); ?>"  <?php echo e($class_id == $class->id ? 'selected' : ''); ?>><?php echo e($class->class_name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <?php if($errors->has('class')): ?>
                                                                <span class="text-danger invalid-select" role="alert">
                                                                    <?php echo e($errors->first('class')); ?>

                                                                </span>
                                                                <?php endif; ?>
                    
                                                            </div>
                                                        </div>
                                                    </td>
                                                        <td class="border-top-0">
                                                            
                                                        <div class="row">

                                                            <div class="col-lg-12">
                    
                                                            <select class="primary_select" name="routine[${row_count}][section]" required>
                                                                
                                                                <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *
                                                                </option>
                                                                
                                                                    <?php $__currentLoopData = $search_current_class->classSection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option  value="<?php echo e($section->sectionName->id); ?>" ><?php echo e($section->sectionName->section_name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    
                                                            
                                                                    </select>
                                                                    <div class="pull-right loader loader_style select_section_promote" id="select_section_promote">
                                                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                                                    </div>  
                                                                    <?php if($errors->has('section')): ?>
                                                                    <span class="text-danger invalid-select" role="alert">
                                                                        <?php echo e($errors->first('section')); ?>

                                                                    </span>
                                                                    <?php endif; ?>
                    
                                                            </div>
                                                    </div>
                                                </td>
                                                    <td class="border-top-0"> 
                                                    <div class="row " id="teacher-div">
                                                        <div class="col-lg-12">
                                                            <select class="primary_select  form-control" name="routine[${row_count}][teacher_id]" >
                                                                <option data-display="<?php echo app('translator')->get('common.select_teacher'); ?>"><?php echo app('translator')->get('common.select_teacher'); ?></option>
                                                            
                                                                    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                
                                                                        <option value="<?php echo e(@$teacher->id); ?>" ><?php echo e(@$teacher->full_name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            
                                                                
                                                            </select>
                                                            <div class="pull-right loader loader_style" id="select_teacher_loader">
                                                                <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                                            </div>
                                                            <span class="text-danger"  id="teacher_error"></span>
                                                        </div>
                                                    </div>
                                                </td> 
                                                <td class="border-top-0">
                                                    <div class="col-lg-12">
                                                        <div class="primary_input mb-15">
                                                            
                                                            <div class="primary_datepicker_input">
                                                                <div class="no-gutters input-right-icon">
                                                                    <div class="col">
                                                                        <div class="">
                                                                            <input 
                                                                                class="primary_input_field primary_input_field date form-control"
                                                                                id="startDate${row_count}" type="text" name="routine[${row_count}][date]" value="<?php echo e(date('m/d/Y')); ?>" autocomplete="off">
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn-date" data-id="#startDate" type="button">
                                                                        <label class="m-0 p-0" for="startDate${row_count}">
                                                                            <i class="ti-calendar" id="start-date-icon"></i>
                                                                        </label>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border-top-0">  
                                                    <div class="row no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="primary_input">
                                                                <input class="primary_input_field primary_input_field time start_time form-control<?php echo e(@$errors->has('start_time') ? ' is-invalid' : ''); ?>" type="text" id="start_time_${row_count}" name="routine[${row_count}][start_time]" required>
                                                              
                                                                
                                                                <span class="text-danger start_time_error"></span> 
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button class="" type="button">
                                                                <label class="m-0 p-0" for="start_time_${row_count}">
                                                                    <i class="ti-timer"></i>
                                                                </label>
                                                            </button>
                                                        </div>
                                                    </div> 
                                            
                                                </td>   

                                                <td class="border-top-0">   
                                                    <div class="row no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="primary_input">
                                                                <input class="primary_input_field primary_input_field time end_time  form-control<?php echo e(@$errors->has('end_time') ? ' is-invalid' : ''); ?>" type="text" id="end_time_${row_count}" data-row_id="${row_count}" name="routine[${row_count}][end_time]" required>
                                                             
                                                                
                                                                <span class="text-danger end_time_error"></span> 
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button class="" type="button">
                                                                <label class="m-0 p-0" for="end_time_${row_count}">
                                                                    <i class="ti-timer"></i>
                                                                </label>
                                                            </button>
                                                        </div>
                                                    </div>
                                                
                                                </td>
                                            

                                                <td class="border-top-0">   
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <select class="primary_select  form-control" data-room_row_id="${row_count}" name="routine[${row_count}][room]" id="room" required>
                                                                <option data-display="<?php echo app('translator')->get('common.select_room'); ?> *" value=""><?php echo app('translator')->get('common.select_room'); ?> *</option>
                                                                <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                
                                                                    <option value="<?php echo e(@$room->id); ?>" ><?php echo e(@$room->room_no); ?></option>
                                                                
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <span class="text-danger"  id="room_error"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                    <td class="border-top-0">
                                                    
                                                        <?php if(userPermission('delete-class-routine')): ?>

                                                            <button class="primary-btn icon-only fix-gr-bg removeExamRoutineRowBtn"  type="button">
                                                                <span class="ti-trash"></span>
                                                                </button>

                                                        <?php endif; ?>  

                                                    </td>
                                                <td></td>
                                            </tr>`;


                    $("#examRoutineTable tbody").append(tr);
                    $('#row_count').val(row_count + 1);


                    $('.primary_select').niceSelect('destroy');
                    $(".primary_select").niceSelect();

                    $(".primary_input_field.time").datetimepicker({
                        format: "LT",
                    });
                    $(".primary_input_field.date").datepicker({
                        autoclose: true,
                        setDate: new Date(),
                    });
                };
                $(document).on("click", '.removeExamRoutineRowBtn', function(e) {
                    let row_id = $(this).data('row_id');

                    let exam_routine_id = $(this).data('exam_routine_id');

                    if (!exam_routine_id) {
                        $(this).parent().parent().remove();
                    } else {
                        let row_id = $(this).data('row_id');

                        $('#classRoutineDeleteModal').modal('toggle');
                        $("#classRoutineDeleteSubmitButton").unbind("click");
                        $("#classRoutineDeleteSubmitButton").bind("click", function() {

                            var url = $("#url").val();

                            $.ajax({
                                type: "post",
                                data: {
                                    id: exam_routine_id
                                },
                                dataType: "html",
                                url: url + "/" + "delete-exam-routine",


                                success: function(data) {

                                    $('#row_' + row_id).remove();
                                    setTimeout(function() {

                                        toastr.success(
                                            "Operation Success!",
                                            "Success Alert", {
                                                iconClass: "customer-info",
                                            }, {
                                                timeOut: 2000,
                                            }
                                        );
                                    }, 500);
                                    $('#classRoutineDeleteModal').modal('hide');
                                    // console.log(data);
                                },
                                error: function(data) {
                                    console.log(data);
                                    // setTimeout(function() {
                                    //     toastr.error("Operation Not Done!", "Error Alert", {
                                    //         timeOut: 5000,
                                    //     });
                                    // }, 500);
                                },

                            });


                        });

                    }

                });
                $(document).on('focusout', '.end_time', function(e) {
                    let row_id = $(this).data('row_id');
                    let start_time = $('#start_time_' + row_id).val();
                    let end_time = $('#end_time_' + row_id).val();
                    if (moment(start_time, 'hh:mm a') > moment(end_time, 'hh:mm a')) {
                        toastr.error('End Time will be greater than start time');
                        console.log(start_time);

                    }

                    console.log(moment(start_time, 'hh:mm a'));
                    console.log(moment(end_time, 'hh:mm a'));
                    console.log(end_time);

                })
            </script>
        <?php $__env->stopPush(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/examination/exam_schedule_new_update.blade.php ENDPATH**/ ?>