<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('homework.homework_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('homework.homework_report'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('homework.home_work'); ?></a>
                    <a href="#"><?php echo app('translator')->get('homework.homework_report'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <?php if($errors->any()): ?>
                <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="alert alert-danger">
                        <?php echo e($error); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                    <div class="row">
                    <div class="col-lg-12 col-md-6">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                            </div>
                        </div>
                    </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'homework-report-search', 'method' => 'GET', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="row">
                            <?php if(moduleStatusCheck('University')): ?>
                                <div class="row">
                                    <?php if ($__env->exists(
                                        'university::common.session_faculty_depart_academic_semester_level',
                                        ['subject' => true]
                                    )) echo $__env->make(
                                        'university::common.session_faculty_depart_academic_semester_level',
                                        ['subject' => true]
                                    , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="col-lg-3 mt-15">
                                        <div class="primary_input">
                                            <label class="primary_input_label"
                                                for="date"><?php echo e(__('homework.homework_date')); ?></label>
                                            <div class="primary_datepicker_input">
                                                <div class="no-gutters input-right-icon">
                                                    <div class="col">
                                                        <div class="">
                                                            <input
                                                                class="primary_input_field primary_input_field date form-control"
                                                                id="date" type="text" name="date"
                                                                value="<?php echo e(old('date') != '' ? old('date') : date('m/d/Y')); ?>"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <button class="btn-date" style="top: 55% !important;" data-id="#date"
                                                        type="button">
                                                        <label class="m-0 p-0" for="date">
                                                            <i class="ti-calendar" id="start-date-icon"></i>
                                                        </label>
                                                    </button>
                                                </div>
                                            </div>
                                            <span class="text-danger"><?php echo e($errors->first('date')); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('common.class')); ?>

                                        <span class="text-danger"> *</span>
                                    </label>
                                    <select
                                        class="primary_select  form-control<?php echo e($errors->has('class_id') ? ' is-invalid' : ''); ?>"
                                        name="class_id" id="class_subject">
                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select'); ?>
                                        </option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($value->id); ?>"<?php echo e(isset($class_id) ? ($class_id == $value->id ? 'selected' : '') : ''); ?>>
                                                <?php echo e($value->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('class_id')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('class_id')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input" id="select_class_subject_div">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('common.subject')); ?>

                                        <span class="text-danger"> *</span>
                                    </label>
                                    <select
                                        class="primary_select  form-control<?php echo e($errors->has('subject_id') ? ' is-invalid' : ''); ?> select_class_subject"
                                        name="subject_id" id="select_class_subject">
                                        <option data-display="<?php echo app('translator')->get('common.select_subjects'); ?> *" value=""><?php echo app('translator')->get('homework.subject'); ?>
                                        </option>
                                        <?php if(isset($smClass)): ?>
                                            <?php $__currentLoopData = $smClass->subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->subject_id); ?>"
                                                    <?php echo e(isset($subject_id) ? ($subject_id == $item->subject_id ? 'selected' : '') : ''); ?>>
                                                    <?php echo e($item->subject->subject_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_subject_loader">
                                        <img class="loader_img_style"
                                            src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                    <?php if($errors->has('subject_id')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('subject_id')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input" id="m_select_subject_section_div">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('common.section')); ?>

                                        <span class="text-danger"> *</span>
                                    </label>
                                    <select
                                        class="primary_select  form-control<?php echo e($errors->has('section_id') ? ' is-invalid' : ''); ?> m_select_subject_section"
                                        name="section_id" id="m_select_subject_section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.section'); ?>
                                        </option>
                                        <?php if(isset($smClass)): ?>
                                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->section_id); ?>"
                                                    <?php echo e(isset($section_id) ? ($section_id == $item->section_id ? 'selected' : '') : ''); ?>>
                                                    <?php echo e($item->section->section_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_section_loader">
                                        <img class="loader_img_style"
                                            src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                    <?php if($errors->has('section_id')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('section_id')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label"
                                        for="date"><?php echo e(__('homework.homework_date')); ?></label>
                                    <div class="primary_datepicker_input">
                                        <div class="no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="">
                                                    <input
                                                        class="primary_input_field primary_input_field date form-control"
                                                        id="date" type="text" name="date"
                                                        value="<?php echo e(old('date') != '' ? old('date') : date('m/d/Y')); ?>"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                            <button class="btn-date" style="top: 55% !important;" data-id="#date"
                                                type="button">
                                                <label class="m-0 p-0" for="date">
                                                    <i class="ti-calendar" id="start-date-icon"></i>
                                                </label>
                                            </button>
                                        </div>
                                    </div>
                                    <span class="text-danger"><?php echo e($errors->first('date')); ?></span>
                                </div>
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

                <?php if(isset($data)): ?>
                    <div class="col-lg-12 mt-40">
                        <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('homework.homework_report'); ?></h3>
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
                                    <table id="table_id" class="table data-table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('homework.student_name'); ?></th>
                                                <?php if(moduleStatusCheck('University')): ?>
                                                    <th><?php echo app('translator')->get('university::un.semester_label'); ?> (<?php echo app('translator')->get('homework.section'); ?>)</th>
                                                <?php else: ?>
                                                    <th><?php echo app('translator')->get('homework.class'); ?> (<?php echo app('translator')->get('homework.section'); ?>)</th>
                                                <?php endif; ?>
                                                <th><?php echo app('translator')->get('homework.subject'); ?></th>
                                                <th><?php echo app('translator')->get('homework.marks'); ?></th>
                                                <th><?php echo app('translator')->get('homework.submission_date'); ?></th>
                                                <th><?php echo app('translator')->get('homework.evaluation_date'); ?></th>
                                                <th><?php echo app('translator')->get('homework.evaluated_by'); ?></th>
                                                <th><?php echo app('translator')->get('common.status'); ?></th>
                                                <th><?php echo app('translator')->get('homework.action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($report['student']); ?></td>
                                                    <td><?php echo e($report['class']); ?> (<?php echo e($report['section']); ?>)</td>
                                                    <td><?php echo e($report['subject']); ?></td>
                                                    <td><?php echo e($report['obtain_marks'] ? $report['obtain_marks'] : '-'); ?> /
                                                        <?php echo e($report['total_marks']); ?></td>
                                                    <td><?php echo e($report['submission_date']); ?></td>
                                                    <td><?php echo e($report['evaluation_date']); ?></td>
                                                    <td><?php echo e($report['evaluated_by']); ?></td>
                                                    <td><button
                                                            class="primary-btn small <?php echo e($report['status'] == 'Completed' ? 'bg-success' : 'bg-danger'); ?> text-white border-0"><?php echo e($report['status']); ?></button>
                                                    </td>
                                                    <td>
                                                        <?php if (isset($component)) { $__componentOriginalf5ee9bc45d6af00850b10ff7521278be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be = $attributes; } ?>
<?php $component = App\View\Components\DropDown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('drop-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DropDown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                            <a class="dropdown-item modalLink"
                                                                title="Evaluation Report"
                                                                data-modal-size="large-modal"
                                                                href="<?php echo e(route('homework-report-view', [@$report['student_id'], @$report['class_id'], @$report['section_id'], @$report['homework_id']])); ?>">
                                                                <?php echo app('translator')->get('common.view'); ?>
                                                            </a>
                                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $attributes = $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $component = $__componentOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
                                                    </td>
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
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/homework/homework_report.blade.php ENDPATH**/ ?>