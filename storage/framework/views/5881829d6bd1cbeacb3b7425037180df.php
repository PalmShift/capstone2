<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('student.student_import'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .input-right-icon button.primary-btn-small-input {
            top: 8px !important;
            right: 11px !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('student.student_import'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('student.student_admission'); ?></a>
                    <a href="#"><?php echo app('translator')->get('student.student_import'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-6">
                    <div class="main-title">
                        <h3><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-3 text-right mb-20">
                    <a href="<?php echo e(url('/public/backEnd/bulksample/students.xlsx')); ?>">
                        <button class="primary-btn tr-bg text-uppercase bord-rad">
                            <?php echo app('translator')->get('student.download_sample_file'); ?>
                            <span class="pl ti-download"></span>
                        </button>
                    </a>
                </div>
            </div>

            <?php echo e(Form::open([
                'class' => 'form-horizontal',
                'files' => true,
                'route' => 'student_bulk_store',
                'method' => 'POST',
                'enctype' => 'multipart/form-data',
                'id' => 'student_form',
            ])); ?>

            <div class="row">
                <div class="col-lg-12">


                    <div class="white-box">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="main-title">
                                        <div class="box-body">
                                            <br>
                                            1. <?php echo app('translator')->get('student.point1'); ?><br>
                                            2. <?php echo app('translator')->get('student.point2'); ?><br>
                                            3. <?php echo app('translator')->get('student.point3'); ?><br>
                                            4. <?php echo app('translator')->get('student.point4'); ?><br>

                                            5. <?php echo app('translator')->get('student.point6'); ?>(
                                            <?php $__currentLoopData = $genders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($gender->id . '=' . $gender->base_setup_name . ','); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                            ).<br>
                                            6. <?php echo app('translator')->get('student.point7'); ?>(
                                            <?php $__currentLoopData = $blood_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blood_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($blood_group->id . '=' . $blood_group->base_setup_name . ','); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            ).<br>
                                            7. <?php echo app('translator')->get('student.point8'); ?>(
                                            <?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($religion->id . '=' . $religion->base_setup_name . ','); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            ).<br>
                                            8. For relation with guardian (F=Father, M=Mother, O=Other)<br>
                                            9. Please follow this date format(2020-06-15) for Date of birth & Admission
                                            date<br>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="row mb-40 mt-30">

                                <?php if(moduleStatusCheck('University')): ?>
                                    <?php if ($__env->exists(
                                        'university::common.session_faculty_depart_academic_semester_level',
                                        [
                                            'hide' => ['USUB'],
                                            'required' => ['US', 'UD', 'USN', 'USL', 'UA', 'USEC'],
                                        ]
                                    )) echo $__env->make(
                                        'university::common.session_faculty_depart_academic_semester_level',
                                        [
                                            'hide' => ['USUB'],
                                            'required' => ['US', 'UD', 'USN', 'USL', 'UA', 'USEC'],
                                        ]
                                    , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="col-lg-3 mt-25">
                                        <div class="row no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="primary_input">
                                                    <input
                                                        class="primary_input_field form-control <?php echo e($errors->has('file') ? ' is-invalid' : ''); ?>"
                                                        type="text" id="placeholderPhoto" placeholder="Excel file"
                                                        readonly>

                                                    <?php if($errors->has('file')): ?>
                                                        <span class="text-danger">
                                                            <?php echo e($errors->first('file')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="primary-btn-small-input" type="button">
                                                    <label class="primary-btn small fix-gr-bg"
                                                        for="photo"><?php echo app('translator')->get('common.browse'); ?></label>
                                                    <input type="file" class="d-none" name="file" id="photo">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="col-lg-3">
                                        <div class="primary_input ">
                                            <select
                                                class="primary_select  form-control<?php echo e($errors->has('session') ? ' is-invalid' : ''); ?>"
                                                name="session" id="academic_year">
                                                <option data-display="<?php echo app('translator')->get('common.academic_year'); ?> *" value="">
                                                    <?php echo app('translator')->get('common.academic_year'); ?> *</option>
                                                <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($session->id); ?>"
                                                        <?php echo e(old('session') == $session->id ? 'selected' : ''); ?>>
                                                        <?php echo e($session->year); ?>[<?php echo e($session->title); ?>]</option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                            <?php if($errors->has('session')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('session')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="primary_input" id="class-div">
                                            <select
                                                class="primary_select  form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                                name="class" id="classSelectStudent">
                                                <option data-display="<?php echo app('translator')->get('common.class'); ?> *" value="">
                                                    <?php echo app('translator')->get('common.class'); ?> *</option>
                                            </select>
                                            <div class="pull-right loader loader_style" id="select_class_loader">
                                                <img class="loader_img_style"
                                                    src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                            </div>

                                            <?php if($errors->has('class')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('class')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="primary_input" id="sectionStudentDiv">
                                            <select
                                                class="primary_select  form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                                name="section" id="sectionSelectStudent">
                                                <option data-display="<?php echo app('translator')->get('common.section'); ?> *" value="">
                                                    <?php echo app('translator')->get('common.section'); ?> *</option>
                                            </select>
                                            <div class="pull-right loader loader_style" id="select_section_loader">
                                                <img class="loader_img_style"
                                                    src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                            </div>

                                            <?php if($errors->has('section')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('section')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                       
                                        <div class="primary_input">                                           
                                            <div class="primary_file_uploader">
                                                <input
                                                        class="primary_input_field form-control <?php echo e($errors->has('file') ? ' is-invalid' : ''); ?>"
                                                        type="text" id="placeholderPhoto" placeholder="Excel file"
                                                        readonly>
                                                <button class="" type="button">
                                                    <label class="primary-btn small fix-gr-bg" for="upload_content_file"><span
                                                            class="ripple rippleEffect"
                                                            style="width: 56.8125px; height: 56.8125px; top: -16.4062px; left: 10.4219px;"></span><?php echo app('translator')->get('common.browse'); ?></label>
                                                    <input type="file" class="d-none" name="file"
                                                        id="upload_content_file">
                                                </button>
                                            </div>
                                          
                                            <?php if($errors->has('file')): ?>
                                            <span class="text-danger d-block">
                                                <?php echo e($errors->first('file')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>


                            </div>

                            <div class="row mt-40">
                                <div class="col-lg-12 text-center">
                                    <button class="primary-btn fix-gr-bg">
                                        <span class="ti-check"></span>
                                        <?php echo app('translator')->get('student.save_bulk_students'); ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/studentInformation/import_student.blade.php ENDPATH**/ ?>