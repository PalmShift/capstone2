<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('library.member_list'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
  <div class="container-fluid">
    <div class="row justify-content-between">
      <h1><?php echo app('translator')->get('library.issue_books'); ?></h1>
      <div class="bc-pages">
        <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
        <a href="#"><?php echo app('translator')->get('library.library'); ?></a>
        <a href="#"><?php echo app('translator')->get('library.issue_books'); ?></a>
      </div>
    </div>
  </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
  <div class="container-fluid p-0">

    <div class="white-box">
      <div class="row mt-40">
        <div class="col-lg-12">
          <?php echo $__env->make('backEnd.partials.alertMessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                  <th width="15%"><?php echo app('translator')->get('library.member_id'); ?></th>
                  <th width="15%"><?php echo app('translator')->get('library.full_name'); ?></th>
                  <th width="15%"><?php echo app('translator')->get('library.member_type'); ?></th>
                  <th width="15%"><?php echo app('translator')->get('common.phone'); ?></th>
                  <th width="15%"><?php echo app('translator')->get('common.email'); ?></th>
                  <th width="15%"><?php echo app('translator')->get('common.action'); ?></th>
                </tr>
              </thead>
  
              <tbody>
                 <?php $__currentLoopData = $activeMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($value->member_ud_id); ?></td>
  
                  <td>
  
                    <?php if($value->member_type == '2'): ?>
                        <?php echo e($value->studentDetails != ""? $value->studentDetails->full_name:''); ?>

                    <?php elseif($value->member_type == '3'): ?>
                   
                        <?php echo e($value->parentsDetails != ""? $value->parentsDetails->fathers_name ? $value->parentsDetails->fathers_name : $value->parentsDetails->guardians_name  :'No Name'); ?>

                    <?php else: ?>
                        <?php echo e($value->staffDetails != ""? $value->staffDetails->full_name:''); ?>

                    <?php endif; ?>
  
                  </td>
  
                  <td><?php echo e($value->memberTypes->name); ?></td>
                  <td>
                    <?php if($value->member_type == '2'): ?>
                        <?php echo e($value->studentDetails != ""? $value->studentDetails->mobile:''); ?>

                    <?php elseif($value->member_type == '3'): ?>
                        <?php echo e($value->parentsDetails != ""? $value->parentsDetails->fathers_mobile:''); ?>

                    <?php else: ?>
                        <?php echo e($value->staffDetails != ""? $value->staffDetails->mobile:''); ?>

                    <?php endif; ?>
  
                    </td>
                  <td>
                    <?php if($value->member_type == '2'): ?>
                        <?php echo e($value->studentDetails != ""? $value->studentDetails->email:''); ?>

                    <?php elseif($value->member_type == '3'): ?>
                        <?php echo e($value->parentsDetails != ""? $value->parentsDetails->guardians_email:''); ?>

                    <?php else: ?>
                        <?php echo e($value->staffDetails != ""? $value->staffDetails->email:''); ?>

                    <?php endif; ?>
                  </td>
                  <td>
                      <a class="primary-btn fix-gr-bg nowrap" href="<?php echo e(route('issue-books',[@$value->member_type,@$value->student_staff_id])); ?>"><?php echo app('translator')->get('library.issue_return_Book'); ?></a>
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
  </section>
  <?php $__env->stopSection(); ?>
  <?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/library/memberLists.blade.php ENDPATH**/ ?>