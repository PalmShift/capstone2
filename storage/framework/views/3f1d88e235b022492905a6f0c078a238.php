    <?php $__env->startSection('title'); ?>
        <?php echo app('translator')->get('exam.marksheet_report'); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <style>
        th {
            border: 1px solid black;
            text-align: center;
        }

        td {
            text-align: center;
        }

        td.subject-name {
            text-align: left;
            padding-left: 10px !important;
        }

        table.marksheet {
            width: 100%;
            border: 1px solid var(--border_color) !important;
        }

        table.marksheet th {
            border: 1px solid var(--border_color) !important;
        }

        table.marksheet td {
            border: 1px solid var(--border_color) !important;
        }

        table.marksheet thead tr {
            border: 1px solid var(--border_color) !important;
        }

        table.marksheet tbody tr {
            border: 1px solid var(--border_color) !important;
        }

        .studentInfoTable {
            width: 100%;
            padding: 0px !important;
        }

        .studentInfoTable td {
            padding: 0px !important;
            text-align: left;
            padding-left: 15px !important;
        }

        h4 {
            text-align: left !important;
        }

        hr {
            margin: 0px;
        }

        #grade_table th {
            border: 1px solid black;
            text-align: center;
            background: #351681;
            color: white;
        }

        #grade_table td {
            color: black;
            text-align: center !important;
            border: 1px solid black;
        }

        .single-report-admit table tr:last-child td {
        border-bottom: 0 !important ;
        }

        .single-report-admit table tr td {
            border-color: #dee2e6 !important;
        }

        .custom_table tbody tr th{
            border-color: #dee2e6 !important;
        }
        .spacing tr th{
            padding: 3px 10px !important;
            vertical-align: middle;
            border: 1px solid #dee2e6 !important;
        }

        .spacing tr td{
            padding: 0px 40px !important;
            vertical-align: middle;
        }
    </style>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('exam.marksheet_report'); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.exam'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.marksheet_report'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'percent-marksheet-report', 'method' => 'GET'])); ?>

                    <div class="row">
                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                        <?php if(moduleStatusCheck('University')): ?>
                            <div class="col-lg-12">
                                <div class="row">
                                    <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
                                    ['required' => 
                                        ['USN', 'UD', 'UA', 'US', 'USL','USUB']
                                    ])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
                                    ['required' => 
                                        ['USN', 'UD', 'UA', 'US', 'USL','USUB']
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <div class="col-lg-3 mt-15" id="select_exam_typ_subject_div">
                                        <label for=""><?php echo app('translator')->get('exam.select_exam'); ?> *</label>
                                        <?php echo e(Form::select('exam_type',[""=>__('exam.select_exam').'*'], null , ['class' => 'primary_select  form-control'. ($errors->has('exam_type') ? ' is-invalid' : ''), 'id'=>'select_exam_typ_subject'])); ?>

                                        
                                        <div class="pull-right loader loader_style" id="select_exam_type_loader">
                                            <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                        </div>
                                        <?php if($errors->has('exam')): ?>
                                            <span class="text-danger custom-error-message" role="alert">
                                                <?php echo e(@$errors->first('exam')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>

                                   
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col-lg-3 mt-30-md md_mb_20">
                                <select class="primary_select form-control<?php echo e($errors->has('exam_type') ? ' is-invalid' : ''); ?>" name="exam_type" id="examTypeId">
                                    <option data-display="<?php echo app('translator')->get('reports.select_exam'); ?> *" value=""><?php echo app('translator')->get('reports.select_exam'); ?>*</option>
                                    <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($exam->id); ?>" <?php echo e(isset($exam_id)? ($exam_id == $exam->id? 'selected':''):''); ?>><?php echo e($exam->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('exam_type')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('exam_type')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-3 mt-30-md md_mb_20" id="examTypeBaseSubjectDiv">
                                <select class="primary_select form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?>" id="examTypeBaseSubjectList" name="subject">
                                    <option data-display="<?php echo app('translator')->get('exam.select_subject'); ?> *"value=""><?php echo app('translator')->get('exam.select_subject'); ?> *</option>
                                </select>
                                <div class="pull-right loader loader_style" id="selectExamBaseSubjectLoader">
                                    <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                </div>
                                <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($message); ?>

                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-lg-3 mt-30-md md_mb_20">
                                <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                    <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?>*</option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($class->id); ?>" <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e($class->class_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('class')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('class')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-3 mt-30-md md_mb_20" id="select_section_div">
                                <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>" id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
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
                                <span class="ti-search"></span>
                                <?php echo app('translator')->get('common.search'); ?>
                            </button>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </section>
    <?php if(isset($mark_sheet)): ?>
        <?php if(moduleStatusCheck('University')): ?>
       
            <?php if ($__env->exists('university::exam.mark_sheet_report')) echo $__env->make('university::exam.mark_sheet_report', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
        <style type="text/css">
            .table tbody td {
                padding: 5px;
                text-align: center;
                vertical-align: middle;
            }

            .table head th {
                padding: 5px;
                text-align: center;
                vertical-align: middle;
            }

            .table head tr th {
                padding: 5px;
                text-align: center;
                vertical-align: middle;
            }

            th, td {
                white-space: nowrap;
                text-align: center !important;
            }

            th.subject-list {
                white-space: inherit;
            }

            #main-content {
                width: auto !important;
            }

            .main-wrapper {
                display: inherit;
            }

            .table thead th {
                padding: 5px;
                vertical-align: middle;
            }

            .student_name, .subject-list {
                line-height: 12px;
            }

            .student_name b {
                min-width: 20%;
            }

            .gradeChart tbody td{
                padding: 0px;
                padding-left: 5px;
            }
            
            hr{
                margin: 0px;
            }

            .name_field{
                width: 200px;
            }

            .roll_field{
                width: 80px;
            }

            .large_spanTh{
                width: 500px;
            }

            .scrolled_table th,
            .scrolled_table td{
                padding: 6px 25px !important;
            }

            #grade_table th {
                border: 1px solid #dee2e6;
                border-top-style: solid;
                border-top-width: 1px;
                text-align: left;
                background: #351681;
                color: white;
                background: #f2f2f2;
                color: var(--base_color);
                font-size: 12px;
                font-weight: 500;
                text-transform: uppercase;
                border-top: 0px;
                padding: 5px 4px;
                background: transparent;
                border-bottom: 1px solid rgba(130, 139, 178, 0.15) !important;
            }

            #grade_table td {
                color: #828bb2;
                padding: 0 7px;
                font-weight: 400;
                background-color: transparent;
                border-right: 0;
                border-left: 0;
                text-align: left !important;
                border-bottom: 1px solid rgba(130, 139, 178, 0.15) !important;
            }

            .single-report-admit table tr th {
                border: 0;
                border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
                text-align: left
            }

            .single-report-admit table thead tr th {
                border: 0 !important;
            }

            .single-report-admit table tbody tr:first-of-type td {
                border-top: 1px solid rgba(67, 89, 187, 0.15) !important;
            }

            .single-report-admit table tr td {
                vertical-align: middle;
                font-size: 12px;
                color: #828BB2;
                font-weight: 400;
                border: 0;
                border-bottom: 1px solid rgba(130, 139, 178, 0.15) !important;
                text-align: left;
                background: #fff !important;
            }

            .single-report-admit table.summeryTable tbody tr:first-of-type td,
            .single-report-admit table.comment_table tbody tr:first-of-type td {
                border-top:0 !important;
            }

            .student_marks_table{
                width: 100%;
                margin: 0px auto 0 auto;
                padding-left: 10px;
                padding-right: 5px;
                padding: 30px;
            }

            thead{
                font-weight:bold;
                text-align:left;
                color: var(--base_color);
                font-size: 10px;
            }

            .student_info li p{
                font-size: 14px;
                font-weight: 500;
                color: #828bb2;
            }

            .student_info li p.bold_text{
                font-weight: 600;
                color: var(--base_color);
            }

            ul.student_info li {
                display: flex;
            }

            ul.student_info {
                padding: 0;
            }

            ul.student_info li p:first-child {
                flex: 55px 0 0;
            }
            ul.student_info.info2 li p:first-child {
                flex: 100px 0 0;
            }
        </style>
        <section class="student-details mt-20">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-4 col-7 no-gutters mt-0">
                        <div class="main-title">
                            <h3 class="mb-30 mt-30"> 
                                <?php echo app('translator')->get('exam.marksheet_report'); ?>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-8 col-5 pull-right">
                        <div class="print_button pull-right mb-30 mt-30">
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'percent-marksheet-print', 'method' => 'POST','target' => '_blank'])); ?>

                                <input type="hidden" name="exam" value="<?php echo e($examInfo->id); ?>">
                                <input type="hidden" name="subject" value="<?php echo e(@$subjectInfo->id); ?>">
                                <input type="hidden" name="class" value="<?php echo e(@$classInfo->id); ?>">
                                <input type="hidden" name="section" value="<?php echo e(@$sectionInfo->id); ?>">
                                <button type="submit" class="primary-btn small fix-gr-bg"><i class="ti-printer"></i>
                                    <?php echo app('translator')->get('common.print'); ?>
                                </button>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-report-admit">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-lg-4 mb-3">
                                        <img class="logo-img" src="<?php echo e(generalSetting()->logo); ?>" alt="<?php echo e(generalSetting()->school_name); ?>">
                                    </div>
                                    <div class="col-lg-4">
                                        <h3 class="text-white"><?php echo app('translator')->get('exam.exam'); ?> : <?php echo e($examInfo->title); ?></h3>
                                        <h3 class="text-white"><?php echo app('translator')->get('exam.subject'); ?> : <?php echo e($subjectInfo->subject_name); ?></h3>
                                        <h3 class="text-white"><?php echo app('translator')->get('common.class'); ?> : <?php echo e($classInfo->class_name); ?> (<?php echo e($sectionInfo->section_name); ?>)</h3>
                                    </div>
                                    <div class=" col-lg-4 text-left text-lg-right mt-30-md">
                                        <h3 class="text-white"> <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> </h3>
                                        <p class="text-white mb-0"> <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Adress'); ?> </p>
                                        <p class="text-white mb-0">
                                            <?php echo app('translator')->get('common.email'); ?>: <?php echo e(isset(generalSetting()->email)?generalSetting()->email:'hello@aorasoft.com'); ?> ,
                                            <?php echo app('translator')->get('common.phone'); ?>: <?php echo e(isset(generalSetting()->phone)?generalSetting()->phone:'+96897002784'); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="white-box">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="exam_title text-center text-uppercase">
                                            <?php echo app('translator')->get('exam.marksheet_report'); ?>
                                        </h4>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-7"></div>
                                            <div class="col-lg-5"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="single-report-admit">
                                            <div class="student_marks_table pt-0">
                                                <div class="table-responsive">
                                                    <table class="mt-30 mb-20 table table-bordered w-100 scrolled_table">
                                                        <thead>
                                                            <tr>
                                                                <th class="name_field"><?php echo app('translator')->get('common.student_name'); ?></th>
                                                                <th class="roll_field"><?php echo app('translator')->get('student.admission_no'); ?></th>
                                                                <th class="roll_field"><?php echo app('translator')->get('student.roll_no'); ?></th>
                                                                <th class="large_spanTh"><?php echo app('translator')->get('exam.position'); ?></th>
                                                                <th class="large_spanTh"><?php echo app('translator')->get('exam.total_mark'); ?></th>
                                                                <th class="large_spanTh"><?php echo app('translator')->get('academics.pass_mark'); ?></th>
                                                                <th class="large_spanTh"><?php echo app('translator')->get('exam.obtained_mark'); ?></th>
                                                                <th class="large_spanTh"><?php echo app('translator')->get('exam.result'); ?></th>
                                                                <th class="large_spanTh"><?php echo app('translator')->get('reports.remarks'); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                         
                                                            <?php $__currentLoopData = $mark_sheet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $totalMark = subjectPercentageMark(@$data->total_marks, @subjectFullMark($data->exam_type_id, $data->subject->id, $data->class_id, $data->section_id));
                                                                    
                                                                    $evaluation= markGpa($totalMark);
                                                                ?>
                                                                
                                                                <tr> 
                                                                    <td><?php echo e($data->studentRecords->student->full_name); ?></td>
                                                                    <td><?php echo e($data->studentRecords->student->admission_no); ?></td>
                                                                    <td><?php echo e($data->studentRecords->student->roll_no); ?></td>
                                                                    <td><?php echo e($loop->iteration); ?></td>

                                                                    <?php if($exam_rule): ?>
                                                                    <td><?php echo e(subject100PercentMark()); ?></td>
                                                                    <?php else: ?> 
                                                                    <td><?php echo e(@subjectFullMark($data->exam_type_id, $data->subject->id)); ?></td>
                                                                    <?php endif; ?> 
                                                                    <td><?php echo e($pass_mark); ?></td>
                                                                    
                                                                    <td>
                                                                    <?php if($exam_rule): ?>
                                                                        <?php echo e($totalMark); ?>

                                                                    <?php else: ?> 
                                                                        <?php echo e(@$data->total_marks); ?>

                                                                    <?php endif; ?> 
                                                                    </td>
                                                                    <td>
                                                                        <?php if($pass_mark <= $totalMark): ?>
                                                                            <?php echo app('translator')->get('exam.pass'); ?>
                                                                        <?php else: ?>
                                                                            <?php echo app('translator')->get('exam.fail'); ?>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo e($evaluation->description); ?>

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
                            </div>
                        </div>
                    </div>
            </div>
        </section>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php if(moduleStatusCheck('University')): ?>
    <?php $__env->startPush('script'); ?>
        <script>
            $(document).ready(function() {
                $("#select_semester_label").on("change", function() {

                    var url = $("#url").val();
                    var i = 0;
                    let semester_id = $(this).val();
                    let academic_id = $('#select_academic').val();  
                    let session_id = $('#select_session').val();
                    let faculty_id = $('#select_faculty').val();
                    let department_id = $('#select_dept').val();
                    let un_semester_label_id = $('#select_semester_label').val();

                    if (session_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Session Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                    
                        $("#select_semester option:selected").prop("selected", false)
                        return ;
                    }
                    if (department_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Department Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                        $("#select_semester option:selected").prop("selected", false)

                        return ;
                    }
                    if (semester_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Semester Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                        $("#select_semester option:selected").prop("selected", false)

                        return ;
                    }
                    if (academic_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Academic Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                        return ;
                    }
                    if (un_semester_label_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Semester Label Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                        return ;
                    }

                    var formData = {
                        semester_id : semester_id,
                        academic_id : academic_id,
                        session_id : session_id,
                        faculty_id : faculty_id,
                        department_id : department_id,
                        un_semester_label_id : un_semester_label_id,
                    };
                
                    // Get Student
                    $.ajax({
                        type: "GET",
                        data: formData,
                        dataType: "json",
                        url: url + "/university/" + "get-university-wise-student",
                        beforeSend: function() {
                            $('#select_un_student_loader').addClass('pre_loader').removeClass('loader');
                        },
                        success: function(data) {
                            var a = "";
                            $.each(data, function(i, item) {
                                if (item.length) {
                                    $("#select_un_student").find("option").not(":first").remove();
                                    $("#select_un_student_div ul").find("li").not(":first").remove();

                                    $.each(item, function(i, students) {
                                        console.log(students);
                                        $("#select_un_student").append(
                                            $("<option>", {
                                                value: students.student.id,
                                                text: students.student.full_name,
                                            })
                                        );

                                        $("#select_un_student_div ul").append(
                                            "<li data-value='" +
                                            students.student.id +
                                            "' class='option'>" +
                                            students.student.full_name +
                                            "</li>"
                                        );
                                    });
                                } else {
                                    $("#select_un_student_div .current").html("SELECT STUDENT *");
                                    $("#select_un_student").find("option").not(":first").remove();
                                    $("#select_un_student_div ul").find("li").not(":first").remove();
                                }
                            });
                        },
                        error: function(data) {
                            console.log("Error:", data);
                        },
                        complete: function() {
                            i--;
                            if (i <= 0) {
                                $('#select_un_student_loader').removeClass('pre_loader').addClass('loader');
                            }
                        }
                    });
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/examination/report/marksheetReport.blade.php ENDPATH**/ ?>