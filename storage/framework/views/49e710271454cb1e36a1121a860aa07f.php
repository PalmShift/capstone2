<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('exam.exam_schedule'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('exam.exam_schedule'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.examinations'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.exam_schedule'); ?></a>
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
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                                </div>
                            </div>
                            <?php if(userPermission('exam_schedule_create')): ?>
                                <div class="col-lg-4 text-md-right text-left col-md-6 mb-30-lg">
                                    <a href="<?php echo e(route('exam_schedule_create')); ?>" class="primary-btn small fix-gr-bg">
                                        <span class="ti-plus pr-2"></span>
                                        <?php echo app('translator')->get('exam.add_exam_schedule'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'exam_schedule_report_search_new', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="col-lg-4 mt-30-md">
                                <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>"
                                    name="exam_type">
                                    <option data-display="Select Exam *"
                                        value=""><?php echo app('translator')->get('common.select_exam'); ?> *
                                    </option>
                                    <?php $__currentLoopData = $exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$exam_type->id); ?>"
                                            <?php echo e(isset($exam_type_id) ? ($exam_type_id == $exam_type->id ? 'selected' : '') : ''); ?>>
                                            <?php echo e(@$exam_type->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('exam')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('exam')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 mt-30-md">
                                <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                    id="select_class" name="class">
                                    <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *"
                                        value=""><?php echo app('translator')->get('common.select_class'); ?> *
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
                                <select
                                    class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                    id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> "
                                        value=""><?php echo app('translator')->get('common.select_section'); ?>
                                    </option>
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
    <?php if(isset($exam_schedules)): ?>
        <section class="mt-20">
            <div class="container-fluid p-0">
                <div class="white-box mt-40">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('exam.exam_routine'); ?>|
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
                        <div class="col-lg-6 pull-right">
                            <div class="main-title">
                                <div class="print_button pull-right pb-2">
                                    <a href="<?php echo e(route('exam-routine-print', [$class_id, $section_id, $exam_type_id])); ?>"
                                        class="primary-btn small fix-gr-bg pull-left" target="_blank"><i class="ti-printer">
                                        </i> <?php echo app('translator')->get('common.print'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="default_table_wrapper" class="dataTables_wrapper no-footer">
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
                                    <div class="table-responsive">
                                    <table id="default_table" class="table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th style="width:10%;"> <?php echo app('translator')->get('exam.date_&_day'); ?></th>
                                                <th><?php echo app('translator')->get('common.subject'); ?></th>
                                                <th><?php echo app('translator')->get('common.class_Sec'); ?></th>
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
                                                    <td><?php echo e($exam_routine->class ? $exam_routine->class->class_name : ''); ?>

                                                        <?php echo e($exam_routine->section ? '(' . $exam_routine->section->section_name . ')' : ''); ?>

                                                    </td>
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
                                    </div>
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
            </div>
        </section>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/examination/exam_schedule_new.blade.php ENDPATH**/ ?>