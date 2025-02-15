<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('reports.exam_routine_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('reports.exam_routine_report'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                    <a href="#"><?php echo app('translator')->get('reports.exam_routine_report'); ?></a>
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
                        <div class="col-lg-8 col-md-6">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                            </div>
                        </div>
                    </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'exam_routine_reports', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <?php if(moduleStatusCheck('University')): ?>
                                <?php if ($__env->exists(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    ['mt' => 'mt-30', 'hide' => ['USUB'], 'required' => ['USL']]
                                )) echo $__env->make(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    ['mt' => 'mt-30', 'hide' => ['USUB'], 'required' => ['USL']]
                                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="col-lg-3 mt-30">
                                <label class="primary_input_label" for=""><?php echo e(__('exam.exam')); ?><span
                                        class="text-danger">
                                        *</span></label>
                                <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>"
                                    name="exam">
                                    <option data-display="<?php echo app('translator')->get('reports.select_exam'); ?> *" value="">
                                        <?php echo app('translator')->get('reports.select_exam'); ?> *</option>
                                    <?php $__currentLoopData = $exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($exam->id); ?>"
                                            <?php echo e(isset($exam_term_id) ? ($exam->id == $exam_term_id ? 'selected' : '') : ''); ?>>
                                            <?php echo e($exam->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('exam')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('exam')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <?php else: ?>
                            <div class="col-lg-4 mt-30-md">
                                <label class="primary_input_label" for=""><?php echo e(__('exam.exam')); ?><span
                                        class="text-danger">
                                        *</span></label>
                                <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>"
                                    name="exam">
                                    <option data-display="<?php echo app('translator')->get('reports.select_exam'); ?> *" value="">
                                        <?php echo app('translator')->get('reports.select_exam'); ?> *</option>
                                    <?php $__currentLoopData = $exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($exam->id); ?>"
                                            <?php echo e(isset($exam_term_id) ? ($exam->id == $exam_term_id ? 'selected' : '') : ''); ?>>
                                            <?php echo e($exam->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('exam')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('exam')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 mt-30-md">
                                <label class="primary_input_label" for=""><?php echo e(__('common.class')); ?><span
                                        class="text-danger">
                                        *</span></label>
                                <select
                                    class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                    id="select_class" name="class">
                                    <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value="">
                                        <?php echo app('translator')->get('common.select_class'); ?> *
                                    </option>
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
                                <label class="primary_input_label"
                                    for=""><?php echo e(__('common.section')); ?><span></span></label>
                                <select
                                    class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                    id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> " value="">
                                        <?php echo app('translator')->get('common.select_section'); ?>
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
    <?php if(isset($exam_schedules)): ?>
        <section class="mt-20">
            <div class="container-fluid p-0">
                <div class="white-box mt-40">
                <div class="row justify-content-end mb-3">
                    <div class="col-lg-6 col-md-6">
                        <a href="<?php echo e(route('exam-routine-print', [$class_id, $section_id, $exam_type_id])); ?>"
                            class="primary-btn small fix-gr-bg pull-right" target="_blank"><i class="ti-printer"> </i>
                            <?php echo app('translator')->get('common.print'); ?></a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="main-title">
                            <h3 class="mb-15"><?php echo app('translator')->get('reports.exam_routine'); ?></h3>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <table id="table_id" class="table Crm_table_active3 no-footer dtr-inline collapsed"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>
                                            <?php echo app('translator')->get('reports.date_&_day'); ?>
                                        </th>
                                        <th><?php echo app('translator')->get('common.subject'); ?></th>
                                        <?php if(moduleStatusCheck('University')): ?>
                                            <th> <?php echo app('translator')->get('university::un.semester_label'); ?> (<?php echo app('translator')->get('common.section'); ?>)</th>
                                        <?php else: ?>
                                            <th><?php echo app('translator')->get('common.class_Sec'); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo app('translator')->get('common.teacher'); ?></th>
                                        <th><?php echo app('translator')->get('common.time'); ?></th>
                                        <th><?php echo app('translator')->get('common.duration'); ?></th>
                                        <th><?php echo app('translator')->get('common.room'); ?></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $exam_schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $exam_routine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(dateConvert($exam_routine->date)); ?>

                                                <br><?php echo e(Carbon::createFromFormat('Y-m-d', $exam_routine->date)->format('l')); ?>

                                            </td>
                                            <td>
                                                <strong>
                                                    <?php echo e($exam_routine->subject ? $exam_routine->subject->subject_name : ''); ?>

                                                </strong>
                                                <?php echo e($exam_routine->subject ? '(' . $exam_routine->subject->subject_code . ')' : ''); ?>

                                            </td>

                                            <?php if(moduleStatusCheck('University')): ?>
                                                <td><?php echo e($exam_routine->unSemesterLabel ? $exam_routine->unSemesterLabel->name : ''); ?> <?php echo e($exam_routine->section ? '(' . $exam_routine->section->section_name . ')' : ''); ?></td>
                                            <?php else: ?>
                                                <td><?php echo e($exam_routine->class ? $exam_routine->class->class_name : ''); ?> <?php echo e($exam_routine->section ? '(' . $exam_routine->section->section_name . ')' : ''); ?></td>
                                            <?php endif; ?>
                                            
                                            <td><?php echo e($exam_routine->teacher ? $exam_routine->teacher->full_name : ''); ?></td>

                                            <td> <?php echo e(date('h:i A', strtotime(@$exam_routine->start_time))); ?> -
                                                <?php echo e(date('h:i A', strtotime(@$exam_routine->end_time))); ?> </td>
                                            <td>
                                                <?php
                                                    $duration = strtotime($exam_routine->end_time) - strtotime($exam_routine->start_time);
                                                ?>

                                                <?php echo e(timeCalculation($duration)); ?>

                                            </td>

                                            <td><?php echo e($exam_routine->classRoom ? $exam_routine->classRoom->room_no : ''); ?></td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
                    </div>
                </div>
                </div>
            </div>
        </section>
    <?php endif; ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', ['i' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/reports/exam_routine_report.blade.php ENDPATH**/ ?>