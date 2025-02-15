<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('library.student_book_issue'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('library.student_book_issue'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('library.library'); ?></a>
                <a href="#"><?php echo app('translator')->get('library.student_book_issue'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
<div class="row mt-40">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-4 no-gutters">
                <div class="main-title">
                    <h3 class="mb-0"><?php echo app('translator')->get('library.all_issued_book_list'); ?></h3>
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
                                <th><?php echo app('translator')->get('library.book_title'); ?></th>
                                <th><?php echo app('translator')->get('library.book_no'); ?></th>
                                <th><?php echo app('translator')->get('library.isbn_no'); ?></th>
                            
                                <th><?php echo app('translator')->get('library.author'); ?></th>
                                <th><?php echo app('translator')->get('common.subject'); ?></th>
                                <th><?php echo app('translator')->get('library.issue_date'); ?></th>
                                <th><?php echo app('translator')->get('library.return_date'); ?></th>
                                <th><?php echo app('translator')->get('common.status'); ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $issueBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                            <td><?php echo e(@$value->books !=""?@$value->books->book_title:""); ?></td>
                            <td><?php echo e(@$value->books !=""?@$value->books->book_number:""); ?></td>
                            <td><?php echo e(@$value->books !=""?@$value->books->isbn_no:""); ?></td>

                                <td><?php echo e(@$value->books !=""?@$value->books->author_name:""); ?></td>
                                <td><?php echo e($value->subject_name !=""?$value->subject_name:""); ?></td>

                                <td  data-sort="<?php echo e(strtotime(@$value->given_date)); ?>" >
                                <?php echo e(@$value->given_date != ""? dateConvert(@$value->given_date):''); ?>


                                </td>
                                <td  data-sort="<?php echo e(strtotime(@$value->due_date)); ?>" >
                                <?php echo e($value->due_date != ""? dateConvert(@$value->due_date):''); ?>


                                </td>
                                <td>
                                    <?php
                                        $now=new DateTime($value->given_date);
                                        $end=new DateTime($value->due_date);
                                    ?>
                                    <?php if($value->issue_status == 'I'): ?>
                                        <?php if($end<$now): ?>
                                            <button class="primary-btn small bg-danger text-white border-0 text-nowrap"><?php echo app('translator')->get('library.expired'); ?></button>
                                        <?php else: ?>
                                            <button class="primary-btn small bg-success text-white border-0 text-nowrap"><?php echo app('translator')->get('library.issued'); ?></button>
                                        <?php endif; ?>
                                    <?php elseif($value->issue_status == 'R'): ?>
                                        <button class="primary-btn small bg-success text-white border-0 text-nowrap"><?php echo app('translator')->get('library.returned'); ?></button>
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
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/studentPanel/studentBookIssue.blade.php ENDPATH**/ ?>