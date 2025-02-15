<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('library.issue_books'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('library.library_book_issue'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('library.library'); ?></a>
                    <a href="<?php echo e(route('member-list')); ?>"><?php echo app('translator')->get('library.member_list'); ?></a>
                    <a href="#"><?php echo app('translator')->get('library.issue_books'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-40 student-details">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-3">
                    <!-- Start Student Meta Information -->
                    <div class="main-title">
                        <h3 class="mb-20"><?php echo app('translator')->get('library.issue_books'); ?></h3>
                    </div>
                    <div class="student-meta-box mt-30">
                        <div class="student-meta-top"></div>
                    
                        <?php if(@$memberDetails->member_type == 2): ?>
                            <img class="student-meta-img img-100"
                                src="<?php echo e(file_exists(@$memberDetails->studentDetails->student_photo) ? asset($memberDetails->studentDetails->student_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>"
                                alt="">
                        <?php elseif(@$memberDetails->member_type == 3): ?>
                            <img class="student-meta-img img-100"
                                src="<?php echo e(file_exists(@$staffDetails->guardians_photo) ? asset($staffDetails->guardians_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>"
                                alt="">
                        <?php else: ?>
                            <img class="student-meta-img img-100"
                                src="<?php echo e(file_exists(@$memberDetails->staffDetails->staff_photo) ? asset($memberDetails->staffDetails->staff_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>"
                                alt="">
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="single-meta mt-50">
                                <div class="d-flex justify-content-between">
                                    <?php if($memberDetails->member_type == 3): ?>
                                        <div class="name">
                                            <?php echo app('translator')->get('library.parent_name'); ?>
                                        </div>
                                    <?php elseif($memberDetails->member_type == 2): ?>
                                        <div class="name">
                                            <?php echo app('translator')->get('common.student_name'); ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="name">
                                            <?php echo app('translator')->get('library.staff_name'); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="value">
                                        <?php if(isset($getMemberDetails)): ?>
                                            <?php if($memberDetails->member_type == 3): ?>
                                                <?php echo e($getMemberDetails->guardians_name); ?>

                                            <?php elseif($memberDetails->member_type == 2): ?>
                                                <?php echo e($getMemberDetails->first_name . ' ' . $getMemberDetails->last_name); ?>

                                                <?php else: ?> 
                                                <?php echo e($getMemberDetails->full_name); ?>

                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('library.member_id'); ?>
                                    </div>
                                    <div class="value">
                                        <?php if(isset($memberDetails)): ?>
                                            <?php echo e($memberDetails->member_ud_id); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('library.member_type'); ?>
                                    </div>
                                    <div class="value">
                                        <?php if(isset($memberDetails)): ?>
                                            <?php echo e($memberDetails->memberTypes->name); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('common.mobile'); ?>
                                    </div>
                                    <div class="value">
                                        <?php if(isset($getMemberDetails)): ?>
                                            <?php if($memberDetails->member_type == 3): ?>
                                                <?php echo e($getMemberDetails->guardians_mobile); ?>

                                            <?php else: ?>
                                                <?php echo e($getMemberDetails->mobile); ?>

                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Student Meta Information -->
                    <?php if(userPermission('issue-books')): ?>
                        <div class="row mt-30">
                            <div class="col-lg-12">
                                <div class="main-title">
                                    <h3 class="mb-30">
                                        <?php echo app('translator')->get('library.issue_book'); ?>
                                    </h3>
                                </div>
                                <?php if(isset($editData)): ?>
                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['book-category-list-update', $editData->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                                <?php else: ?>
                                    <?php echo e(Form::open([
                                        'class' => 'form-horizontal',
                                        'files' => true,
                                        'route' => 'save-issue-book-data',
                                        'method' => 'POST',
                                        'enctype' => 'multipart/form-data',
                                    ])); ?>

                                <?php endif; ?>
                                <div class="white-box">
                                    <div class="add-visitor">
                                        <div class="row">
                                            <div class="col-lg-12 mb-20">

                                                <div class="primary_input">
                                                    <select
                                                        class="primary_select  form-control<?php echo e($errors->has('book_id') ? ' is-invalid' : ''); ?>"
                                                        name="book_id" id="classSelectStudent">
                                                        <option data-display="<?php echo app('translator')->get('library.select_book'); ?> *" value="">
                                                            <?php echo app('translator')->get('library.select_book'); ?></option>
                                                        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->book_title); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>

                                                    <?php if($errors->has('book_id')): ?>
                                                        <span class="text-danger invalid-select" role="alert">
                                                            <?php echo e($errors->first('book_id')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mb-20">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('library.return_date'); ?> <span class="text-danger"> *</span></label>
                                                    <div class="primary_datepicker_input">
                                                        <div class="no-gutters input-right-icon">
                                                            <div class="col">
                                                                <div class="">
                                                                    <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('due_date') ? ' is-invalid' : ''); ?>" id="due_date" type="text" name="due_date" value="<?php echo e(isset($invoiceInfo)? date('m/d/Y', strtotime($invoiceInfo->due_date)) : date('m/d/Y')); ?>">
                                                                </div>
                                                            </div>
                                                            <button class="btn-date" data-id="#due_date" type="button">
                                                                <label for="due_date">
                                                                    <i class="ti-calendar" id="due_date"></i>
                                                                </label>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <?php if($errors->has('due_date')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('due_date')); ?>

                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <input type="hidden" name="member_id"
                                                value="<?php echo e(@$memberDetails->student_staff_id); ?>">
                                            <input type="hidden" name="url" id="url"
                                                value="<?php echo e(URL::to('/')); ?>">
                                        </div>
                                        <div class="row mt-40">
                                            <div class="col-lg-12 text-center">
                                                <button class="primary-btn fix-gr-bg">
                                                    <span class="ti-check"></span>
                                                    <?php echo app('translator')->get('library.issue_book'); ?>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"> <?php echo app('translator')->get('library.issued_book'); ?></h3>
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
                                <table id="table_id" class="table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="15%"><?php echo app('translator')->get('library.book_title'); ?></th>
                                            <th width="15%"><?php echo app('translator')->get('library.book_number'); ?></th>
                                            <th width="15%"><?php echo app('translator')->get('library.issue_date'); ?></th>
                                            <th width="15%"><?php echo app('translator')->get('library.return_date'); ?></th>
                                            <th width="15%"><?php echo app('translator')->get('common.status'); ?></th>
                                            <th width="15%"><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
    
                                    <tbody>
                                        <?php if(isset($totalIssuedBooks)): ?>
                                            <?php $__currentLoopData = $totalIssuedBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($value->books->book_title); ?></td>
                                                    <td><?php echo e($value->books->book_number); ?></td>
                                                    <td data-sort="<?php echo e(strtotime($value->given_date)); ?>">
                                                        <?php echo e($value->given_date != '' ? dateConvert($value->given_date) : ''); ?>

    
                                                    </td>
                                                    <td data-sort="<?php echo e(strtotime($value->due_date)); ?>">
                                                        <?php echo e($value->due_date != '' ? dateConvert($value->due_date) : ''); ?>

                                                    </td>
                                                    <td>
                                                        <?php
                                                            $now = new DateTime($value->given_date);
                                                            $end = new DateTime($value->due_date);
                                                        ?>
                                                        <?php if($value->issue_status == 'I'): ?>
                                                            <?php if($end < $now): ?>
                                                                <button
                                                                    class="primary-btn small bg-danger text-white border-0"><?php echo app('translator')->get('library.expired'); ?></button>
                                                            <?php else: ?>
                                                                <button
                                                                    class="primary-btn small bg-success text-white border-0"><?php echo app('translator')->get('library.issued'); ?></button>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <button
                                                                class="primary-btn small bg-success text-white border-0"><?php echo app('translator')->get('library.returned'); ?></button>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <?php if($value->issue_status == 'I'): ?>
                                                                <?php if(userPermission('return-book-view')): ?>
                                                                    <a title="<?php echo e(__('library.return_Book')); ?>"
                                                                        data-modal-size="modal-md"
                                                                        href="<?php echo e(route('return-book-view', $value->id)); ?>"
                                                                        class="modalLink primary-btn fix-gr-bg line_height_1 p-2"><?php echo app('translator')->get('library.return'); ?></a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
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
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/library/issueBooks.blade.php ENDPATH**/ ?>