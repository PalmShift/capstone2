<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('transport.transport'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('transport.transport'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href=""><?php echo app('translator')->get('transport.transport'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">

        <div class="row">

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-30"><?php echo app('translator')->get('transport.transport_route_list'); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 mb-30">
                        <!-- Start Student Meta Information -->
                        <div class="student-meta-box">
                            <div class="student-meta-top"></div>
                            <img class="student-meta-img img-100"
                                src="<?php echo e(file_exists($student_detail->student_photo) ? asset($student_detail->student_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>"
                                alt="">
                            <div class="white-box radius-t-y-0">
                                <div class="single-meta mt-50">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('student.student_name'); ?>
                                        </div>
                                        <div class="value">
                                            <?php echo e($student_detail->first_name.' '.$student_detail->last_name); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('student.admission_no'); ?>
                                        </div>
                                        <div class="value">
                                            <?php echo e($student_detail->admission_no); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('student.class'); ?>
                                        </div>
                                        <div class="value">
                                            <?php if($student_detail->defaultClass!=""): ?>
                                            <?php echo e(@$student_detail->defaultClass->class->class_name); ?>

                                            
                                            <?php elseif($student_detail->studentRecord !=""): ?>
                                            <?php echo e(@$student_detail->studentRecord->class->class_name); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('student.section'); ?>
                                        </div>
                                        <div class="value">

                                            <?php if($student_detail->defaultClass!=""): ?>
                                            <?php echo e(@$student_detail->defaultClass->section->section_name); ?>


                                            <?php elseif($student_detail->studentRecord !=""): ?>
                                            <?php echo e(@$student_detail->studentRecord->section->section_name); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('common.gender'); ?>
                                        </div>
                                        <div class="value">
                                            <?php echo e($student_detail->gender !=""?$student_detail->gender->base_setup_name:""); ?>

                                        </div>
                                    </div>
                                </div>
                                <?php if(moduleStatusCheck('BehaviourRecords')): ?>
                                <div class="single-meta">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('behaviourRecords.behaviour_records_point'); ?>
                                        </div>
                                        <div class="value">
                                            <?php
                                            $totalBehaviourPoints = 0;
                                            if (@$studentBehaviourRecords) {
                                            foreach ($studentBehaviourRecords as $studentBehaviourRecord) {
                                            $totalBehaviourPoints += $studentBehaviourRecord->point;
                                            }
                                            }
                                            ?>
                                            <?php echo e($totalBehaviourPoints); ?>

                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- End Student Meta Information -->

                    </div>
                    <div class="col-lg-9">
                        <div class="white-box">
                            <div class="mt-40">
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
                                    <table id="table_id" class="table" cellspacing="0" width="100%">

                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('transport.route'); ?></th>
                                                <th><?php echo app('translator')->get('transport.vehicle'); ?></th>
                                                <th><?php echo app('translator')->get('common.action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td valign="top"><?php echo e(@$route->route->title); ?></td>
                                                <td class="pl-2">
                                                    <?php
                                                    @$vehicles = explode(",",@$route->vehicle_id);
                                                    ?>
                                                    <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <?php @$vehicle = App\SmVehicle::find(@$vehicle);
                                                    ?>
                                                    <?php echo e(@$vehicle->vehicle_no); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                        <a class="dropdown-item modalLink" title="Transport Details"
                                                            data-modal-size="modal"
                                                            href="<?php echo e(route('student_transport_view_modal', [@$route->route->id, @$vehicle->id])); ?>"><?php echo app('translator')->get('common.view'); ?></a>
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
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/studentPanel/student_transport.blade.php ENDPATH**/ ?>