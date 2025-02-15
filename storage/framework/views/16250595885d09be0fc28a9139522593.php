<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.exam_attendance'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<style>
    table.dataTable thead th{
        white-space: nowrap;
    }
    table.dataTable thead .sorting_asc:after {
        top: 10px;
        left: 5px;
    }

    table.dataTable thead .sorting:after {
        top: 10px;
        left: 4px;
    }

</style>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.exam_attendance'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.examination'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.exam_attendance'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">

                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="main-title sm_mb_20">
                                <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                            </div>
                        </div>
            
                        <?php if(userPermission('exam_attendance_create')): ?>
                        <div class="col-lg-6 text-right col-md-6 text_xs_left col-sm-6">
                            <a href="<?php echo e(route('exam_attendance_create')); ?>" class="primary-btn small fix-gr-bg">
                                <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('exam.attendance_create'); ?>
                            </a>
                        </div>
                        <?php endif; ?>
            
                    </div>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'exam_attendance_search', 'method' => 'POST', 'id' => 'search_student'])); ?>

                    <div class="row">
                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">

                        <?php if(moduleStatusCheck('University')): ?>
                        <div class="col-lg-12">
                            <div class="row row-gap-24">
                                <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
                                ['required' =>
                                ['USN', 'UD', 'UA', 'US', 'USL', 'USEC'],'hide'=> ['USUB']
                                ])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
                                ['required' =>
                                ['USN', 'UD', 'UA', 'US', 'USL', 'USEC'],'hide'=> ['USUB']
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <div class="col-lg-3 mt-30" id="select_exam_typ_subject_div">
                                    <?php echo e(Form::select('exam_type',[""=>__('exam.select_exam').'*'], null , ['class' => 'primary_select  form-control'. ($errors->has('exam_type') ? ' is-invalid' : ''), 'id'=>'select_exam_typ_subject'])); ?>


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
                                    <?php echo e(Form::select('subject_id',[""=>__('exam.select_subject').'*'], null , ['class' => 'primary_select  form-control'. ($errors->has('subject_id') ? ' is-invalid' : ''), 'id'=>'select_un_exam_type_subject'])); ?>


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
                        <div class="col-lg-3 mt-30-md mb-3 mb-lg-0">
                            <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>"
                                name="exam">
                                <option data-display="<?php echo app('translator')->get('exam.select_exam'); ?> *" value=""><?php echo app('translator')->get('exam.select_exam'); ?> *
                                </option>
                                <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e(@$exam->id); ?>"><?php echo e(@$exam->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('exam')): ?>
                            <span class="text-danger invalid-select" role="alert">
                                <?php echo e($errors->first('exam')); ?>

                            </span>
                            <?php endif; ?>
                        </div>

                        <div class="col-lg-3 mt-30-md mb-3 mb-lg-0">
                            <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                id="class_subject" name="class">
                                <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value="">
                                    <?php echo app('translator')->get('common.select_class'); ?> *</option>
                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($class->id); ?>"
                                    <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>>
                                    <?php echo e($class->class_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('class')): ?>
                            <span class="text-danger invalid-select" role="alert">
                                <?php echo e($errors->first('class')); ?>

                            </span>
                            <?php endif; ?>
                        </div>

                        <div class="col-lg-3 mt-30-md mb-3 mb-lg-0" id="select_class_subject_div">
                            <select
                                class="primary_select form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?> select_class_subject"
                                id="select_class_subject" name="subject">
                                <option data-display="<?php echo app('translator')->get('common.select_subject'); ?> *" value="">
                                    <?php echo app('translator')->get('common.select_subject'); ?> *</option>
                            </select>
                            <div class="pull-right loader loader_style" id="select_class_subject_loader">
                                <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                    alt="loader">
                            </div>
                            <?php if($errors->has('subject')): ?>
                            <span class="text-danger invalid-select" role="alert">
                                <?php echo e($errors->first('subject')); ?>

                            </span>
                            <?php endif; ?>
                        </div>

                        <div class="col-lg-3 mt-30-md mb-3 mb-lg-0" id="m_select_subject_section_div">
                            <select
                                class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> m_select_subject_section"
                                id="m_select_subject_section" name="section">
                                <option data-display="<?php echo app('translator')->get('common.select_section'); ?> " value=" ">
                                    <?php echo app('translator')->get('common.select_section'); ?> </option>
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
        <?php if(isset($exam_attendance_childs)): ?>
        <?php if(moduleStatusCheck('University')): ?>
        <div class="row mt-40">
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
                <div class="row">
                    <div class="col-lg-12">
                        <table id="table_id_table" class="table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="20%"><?php echo app('translator')->get('student.admission_no'); ?></th>
                                    <th width="20%"><?php echo app('translator')->get('student.student_name'); ?></th>
                                    <th width="20%"><?php echo app('translator')->get('student.roll_no'); ?></th>
                                    <th width="20%"><?php echo app('translator')->get('exam.attendance'); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $exam_attendance_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(@$student->studentInfo !=""?@$student->studentInfo->admission_no:""); ?><input
                                            type="hidden" name="id[]" value="<?php echo e(@$student->student_id); ?>"></td>
                                    <td><?php echo e(@$student->studentInfo !=""?@$student->studentInfo->first_name.' '.@$student->studentInfo->last_name:""); ?>

                                    </td>
                                    <td><?php echo e(@$student->studentInfo !=""?@$student->studentInfo->roll_no:""); ?></td>
                                    <td>
                                        <?php if(@$student->attendance_type == 'P'): ?>
                                        <button
                                            class="primary-btn small bg-success text-white border-0"><?php echo app('translator')->get('student.present'); ?></button>
                                        <?php else: ?>
                                        <button
                                            class="primary-btn small bg-danger text-white border-0"><?php echo app('translator')->get('student.absent'); ?></button>
                                        <?php endif; ?>
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
        <?php else: ?>
        <div class="row mt-40">
            <div class="col-lg-12">
                <div class="white-box">
                <div class="row">
                    <div class="col-lg-6 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-15"><?php echo app('translator')->get('exam.exam_attendance'); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table id="table_id" class="table data-table Crm_table_active3 no-footer dtr-inline collapsed"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="20%"><?php echo app('translator')->get('student.admission_no'); ?></th>
                                    <th width="20%"><?php echo app('translator')->get('student.student_name'); ?></th>
                                    <th width="20%"><?php echo app('translator')->get('common.class_Sec'); ?></th>
                                    <th width="20%"><?php echo app('translator')->get('student.roll_no'); ?></th>
                                    <th width="20%"><?php echo app('translator')->get('exam.attendance'); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $exam_attendance_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="pl-3"><?php echo e(@$student->studentInfo !=""?@$student->studentInfo->admission_no:""); ?><input
                                            type="hidden" name="id[]" value="<?php echo e(@$student->student_id); ?>"></td>
                                    <td><?php echo e(@$student->studentInfo !=""?@$student->studentInfo->first_name.' '.@$student->studentInfo->last_name:""); ?>

                                    </td>
                                    <td class="pl-3"><?php echo e(@$student->studentRecord !=""?@$student->studentRecord->class->class_name.'('.@$student->studentRecord->section->section_name.')':""); ?>

                                    </td>
                                    <td class="pl-3"><?php echo e(@$student->studentInfo !=""?@$student->studentInfo->roll_no:""); ?></td>
                                    <td>
                                        <?php if(@$student->attendance_type == 'P'): ?>
                                        <button
                                            class="primary-btn small bg-success text-white border-0"><?php echo app('translator')->get('student.present'); ?></button>
                                        <?php else: ?>
                                        <button
                                            class="primary-btn small bg-danger text-white border-0"><?php echo app('translator')->get('student.absent'); ?></button>
                                        <?php endif; ?>
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
        <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('script'); ?>
<script>
    $( document ).ready( function () {
        $( '.data-table' ).DataTable( {
            processing: true,
            serverSide: true,
            "ajax": $.fn.dataTable.pipeline( {
                url: "<?php echo e(url('student-list-datatable')); ?>",
                data: {
                    academic_year: $( '#academic_id' ).val(),
                    class: $( '#class' ).val(),
                    section: $( '#section' ).val(),
                    roll_no: $( '#roll' ).val(),
                    name: $( '#name' ).val(),
                    un_session_id: $( '#un_session' ).val(),
                    un_academic_id: $( '#un_academic' ).val(),
                    un_faculty_id: $( '#un_faculty' ).val(),
                    un_department_id: $( '#un_department' ).val(),
                    un_semester_label_id: $( '#un_semester_label' ).val(),
                    un_section_id: $( '#un_section' ).val(),
                },
                pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache
            } ),
            columns: [ {
                    data: 'admission_no',
                    name: 'admission_no'
                },
                {
                    data: 'full_name',
                    name: 'full_name'
                },
                <?php if( !moduleStatusCheck( 'University' ) && generalSetting() -> with_guardian ): ?> {
                    data: 'parents.fathers_name',
                    name: 'parents.fathers_name'
                },
                <?php endif; ?> {
                    data: 'dob',
                    name: 'dob'
                },
                <?php if( moduleStatusCheck( 'University' ) ): ?> {
                    data: 'semester_label',
                    name: 'semester_label'
                },
                {
                    data: 'class_sec',
                    name: 'class_sec'
                },
                <?php else: ?> {
                    data: 'class_sec',
                    name: 'class_sec'
                },
                <?php endif; ?> {
                    data: 'gender.base_setup_name',
                    name: 'gender.base_setup_name'
                },
                {
                    data: 'category.category_name',
                    name: 'category.category_name'
                },
                {
                    data: 'mobile',
                    name: 'sm_students.mobile'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'first_name',
                    name: 'first_name',
                    visible: false
                },
                {
                    data: 'last_name',
                    name: 'last_name',
                    visible: false
                },
            ],
            bLengthChange: false,
            bDestroy: true,
            language: {
                search: "<i class='ti-search'></i>",
                searchPlaceholder: window.jsLang( 'quick_search' ),
                paginate: {
                    next: "<i class='ti-arrow-right'></i>",
                    previous: "<i class='ti-arrow-left'></i>",
                },
            },
            dom: "Bfrtip",
            buttons: [ {
                    extend: "copyHtml5",
                    text: '<i class="fa fa-files-o"></i>',
                    title: $( "#logo_title" ).val(),
                    titleAttr: window.jsLang( 'copy_table' ),
                    exportOptions: {
                        columns: ':visible:not(.not-export-col)'
                    },
                },
                {
                    extend: "excelHtml5",
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: window.jsLang( 'export_to_excel' ),
                    title: $( "#logo_title" ).val(),
                    margin: [ 10, 10, 10, 0 ],
                    exportOptions: {
                        columns: ':visible:not(.not-export-col)'
                    },
                },
                {
                    extend: "csvHtml5",
                    text: '<i class="fa fa-file-text-o"></i>',
                    titleAttr: window.jsLang( 'export_to_csv' ),
                    exportOptions: {
                        columns: ':visible:not(.not-export-col)'
                    },
                },
                {
                    extend: "pdfHtml5",
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    title: $( "#logo_title" ).val(),
                    titleAttr: window.jsLang( 'export_to_pdf' ),
                    exportOptions: {
                        columns: ':visible:not(.not-export-col)'
                    },
                    orientation: "landscape",
                    pageSize: "A4",
                    margin: [ 0, 0, 0, 12 ],
                    alignment: "center",
                    header: true,
                    customize: function ( doc ) {
                        doc.content[ 1 ].margin = [ 100, 0, 100, 0 ]; //left, top, right, bottom
                        doc.content.splice( 1, 0, {
                            margin: [ 0, 0, 0, 12 ],
                            alignment: "center",
                            image: "data:image/png;base64," + $( "#logo_img" ).val(),
                        } );
                        doc.defaultStyle = {
                            font: 'DejaVuSans'
                        }
                    },
                },
                {
                    extend: "print",
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: window.jsLang( 'print' ),
                    title: $( "#logo_title" ).val(),
                    exportOptions: {
                        columns: ':visible:not(.not-export-col)'
                    },
                },
                {
                    extend: "colvis",
                    text: '<i class="fa fa-columns"></i>',
                    postfixButtons: [ "colvisRestore" ],
                },
            ],
            columnDefs: [ {
                visible: false,
            }, ],
            responsive: true,
        } );
    } );

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/examination/exam_attendance.blade.php ENDPATH**/ ?>