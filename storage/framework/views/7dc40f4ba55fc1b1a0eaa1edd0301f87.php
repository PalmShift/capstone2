<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('library.add_book'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('library.add_book'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('library.library'); ?></a>
                    <?php if(isset($editData)): ?>
                        <a href="#"><?php echo app('translator')->get('library.edit_book'); ?></a>
                    <?php else: ?>
                        <a href="#"><?php echo app('translator')->get('library.add_book'); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
          <div class="container-fluid p-0">
            <?php if(isset($editData)): ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('update-book-data',$editData->id), 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

            <?php else: ?>
                <?php if(userPermission("save-book-data")): ?>
        
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'save-book-data',
                    'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                <?php endif; ?>
            <?php endif; ?>

            <div class="row">
                <div class="col-lg-12">
                    <?php echo $__env->make('backEnd.partials.alertMessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="white-box">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="main-title ">
                                    <h3 class="mb-15">
                                        <?php if(isset($editData)): ?>
                                            <?php echo app('translator')->get('library.edit_book'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('library.add_book'); ?>
                                        <?php endif; ?>
                                       
                                </div>
                            </div>
                        </div>
                        
                        <div class="">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="row">
                                <div class="col-lg-3 mb-4">
                                    <div class="primary_input ">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('library.book_title'); ?> <span class="text-danger"> *</span> </label>
                                        <input
                                            class="primary_input_field form-control<?php echo e($errors->has('book_title') ? ' is-invalid' : ''); ?>"
                                            type="text" name="book_title" autocomplete="off"
                                            value="<?php echo e(isset($editData)? $editData->book_title :(old('book_title')!=''? old('book_title'):'')); ?>">
                                        
                                        
                                        <?php if($errors->has('book_title')): ?>
                                            <span class="text-danger" >
                                        <?php echo e($errors->first('book_title')); ?>

                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="primary_input ">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('library.book_category'); ?> <span class="text-danger"> *</span> </label>
                                        <select
                                            class="primary_select  form-control<?php echo e($errors->has('book_category_id') ? ' is-invalid' : ''); ?>"
                                            name="book_category_id" id="book_category_id">
                                            <option data-display="<?php echo app('translator')->get('library.select_book_category'); ?> *"
                                                    value=""><?php echo app('translator')->get('common.select'); ?></option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($editData)): ?>
                                                    <option
                                                        value="<?php echo e($value->id); ?>" <?php echo e($value->id == $editData->book_category_id? 'selected':''); ?>><?php echo e($value->category_name); ?></option>
                                                <?php else: ?>
                                                    <option
                                                        value="<?php echo e($value->id); ?>" <?php echo e(old('book_category_id')!=''? (old('book_category_id') == $value->id? 'selected':''):''); ?> ><?php echo e($value->category_name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        
                                        <?php if($errors->has('book_category_id')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('book_category_id')); ?>

                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="primary_input ">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.subject'); ?> <span class="text-danger"> *</span> </label>
                                        <select
                                            class="primary_select  form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?>"
                                            name="subject" id="subject">
                                            <option data-display="<?php echo app('translator')->get('common.select_subjects'); ?>"
                                                    value=""><?php echo app('translator')->get('common.select'); ?></option>
                                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($editData)): ?>
                                                    <option value="<?php echo e($value->id); ?>" <?php echo e($value->id == $editData->book_subject_id? 'selected':''); ?>><?php echo e($value->subject_name); ?></option>
                                                    <?php else: ?>
                                                    <option value="<?php echo e($value->id); ?>" <?php echo e(old('subject')!=''? (old('subject') == $value->id? 'selected':''):''); ?> ><?php echo e($value->subject_name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        
                                        <?php if($errors->has('subject')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('subject')); ?>

                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="primary_input ">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('library.book_no'); ?></label>
                                        <input
                                            class="primary_input_field form-control<?php echo e($errors->has('type') ? ' is-invalid' : ''); ?>"
                                            type="text" name="book_number" autocomplete="off"
                                            value="<?php echo e(isset($editData)? $editData->book_number: old('book_number')); ?>">
                                        
                                        
                                        <?php if($errors->has('book_number')): ?>
                                            <span class="text-danger" >
                                        <?php echo e($errors->first('book_number')); ?>

                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-lg-3 mb-4">
                                    <div class="primary_input ">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('library.isbn_no'); ?></label>
                                        <input oninput="numberCheckWithDot(this)"
                                            class="primary_input_field form-control<?php echo e($errors->has('isbn_no') ? ' is-invalid' : ''); ?>"
                                            type="text" name="isbn_no" autocomplete="off"
                                            value="<?php echo e(isset($editData)? $editData->isbn_no: old('isbn_no')); ?>">
                                        
                                        
                                        <?php if($errors->has('isbn_no')): ?>
                                            <span class="text-danger" >
                                        <?php echo e($errors->first('isbn_no')); ?>

                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="primary_input ">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('library.publisher_name'); ?></label>
                                        <input
                                            class="primary_input_field form-control<?php echo e($errors->has('publisher_name') ? ' is-invalid' : ''); ?>"
                                            type="text" name="publisher_name" autocomplete="off"
                                            value="<?php echo e(isset($editData)? $editData->publisher_name: old('publisher_name')); ?>">
                                      
                                        
                                        <?php if($errors->has('publisher_name')): ?>
                                            <span class="text-danger" >
                                        <?php echo e($errors->first('publisher_name')); ?>

                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="primary_input ">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('library.author_name'); ?></label>
                                        <input
                                            class="primary_input_field form-control<?php echo e($errors->has('author_name') ? ' is-invalid' : ''); ?>"
                                            type="text" name="author_name" autocomplete="off"
                                            value="<?php echo e(isset($editData)? $editData->author_name: old('author_name')); ?>">
                                   
                                        
                                        <?php if($errors->has('author_name')): ?>
                                            <span class="text-danger" >
                                        <?php echo e($errors->first('author_name')); ?>

                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="primary_input ">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('library.rack_number'); ?></label>
                                        <input
                                            class="primary_input_field form-control<?php echo e($errors->has('rack_number') ? ' is-invalid' : ''); ?>"
                                            type="text" name="rack_number" autocomplete="off"
                                            value="<?php echo e(isset($editData)? $editData->rack_number: old('rack_number')); ?>">
                                      
                                        
                                        <?php if($errors->has('rack_number')): ?>
                                            <span class="text-danger" >
                                        <?php echo e($errors->first('rack_number')); ?>

                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-3 mb-4">
                                    <div class="primary_input ">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('library.quantity'); ?></label>
                                        <input oninput="numberMinCheck(this)"
                                            class="primary_input_field form-control<?php echo e($errors->has('quantity') ? ' is-invalid' : ''); ?>"
                                            type="text" name="quantity" autocomplete="off"
                                            value="<?php echo e(isset($editData)? $editData->quantity : old('quantity')); ?>">
                                       
                                        
                                        <?php if($errors->has('quantity')): ?>
                                            <span class="text-danger" >
                                        <?php echo e($errors->first('quantity')); ?>

                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="primary_input ">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('library.book_price'); ?></label>
                                        <input oninput="numberMinZeroCheck(this)"
                                            class="primary_input_field form-control<?php echo e($errors->has('book_price') ? ' is-invalid' : ''); ?>"
                                            type="text" name="book_price" autocomplete="off"
                                            value="<?php echo e(isset($editData)? $editData->book_price : old('book_price')); ?>">
                                        
                                        
                                        <?php if($errors->has('book_price')): ?>
                                            <span class="text-danger" >
                                        <?php echo e($errors->first('book_price')); ?>

                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="primary_input ">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?> <span></span> </label>
                                        <textarea class="primary_input_field form-control" cols="0" rows="4" name="details"
                                                  id="details"><?php echo e(isset($editData) ? $editData->details : old('details')); ?></textarea>
                                       
                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                          <?php 
                              $tooltip = "";
                              if(userPermission("save-book-data")){
                                    $tooltip = "";
                                }else{
                                    $tooltip = "You have no permission to add";
                                }
                            ?>
                        <div class="row mt-40">
                            <div class="col-lg-12 text-center">
                                <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                    <span class="ti-check"></span>
                                    <?php if(isset($editData)): ?>
                                        <?php echo app('translator')->get('library.update_book'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('library.save_book'); ?>
                                    <?php endif; ?>
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

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/library/addBook.blade.php ENDPATH**/ ?>