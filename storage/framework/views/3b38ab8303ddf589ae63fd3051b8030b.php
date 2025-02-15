<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('library.issued_Book_List'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('library.issued_Book_List'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('library.library'); ?></a>
                    <a href="#"><?php echo app('translator')->get('library.issued_Book_List'); ?></a>
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
                            <div class="col-lg-8 col-md-6">
                                <div class="main-title">
                                    <h3 class="mb-15 "><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                                </div>
                            </div>
                            <div class="col-lg-4 text-md-right text-left col-md-6 mb-30-lg">
                                <a href="<?php echo e(route('addStaff')); ?>" class="primary-btn small fix-gr-bg">
                                </a>
                            </div>
                        </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'search-issued-book', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="row">
                            <input type="hidden" id="book_id" name="book_id" value="<?php echo e(@$book_id); ?>">
                            <input type="hidden" id="book_number" name="book_number" value="<?php echo e(@$book_number); ?>">
                            <input type="hidden" id="subject_id" name="subject_id" value="<?php echo e(@$subject_id); ?>">
                            <div class="col-lg-4">
                                <label class="primary_input_label" for=""><?php echo app('translator')->get('library.book'); ?></label>
                                <select class="primary_select  form-control" name="book_id" id="book_id">
                                    <option data-display="<?php echo app('translator')->get('library.select_Book_Name'); ?>" value=""><?php echo app('translator')->get('common.select'); ?> </option>
                                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>"
                                            <?php echo e(isset($book_id) ? ($book_id == $value->id ? 'selected' : '') : ''); ?>>
                                            <?php echo e($value->book_title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="col-lg-4 mt-30-md">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('library.search_By_Book_ID'); ?></label>
                                    <input class="primary_input_field" type="text" name="book_number"
                                        value="<?php echo e(isset($book_number) ? $book_number : ''); ?>">


                                </div>
                            </div>
                            <div class="col-lg-4 mt-30-md">
                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.subject'); ?></label>
                                <select class="primary_select  form-control" name="subject_id" id="subject_id">
                                    <option data-display="<?php echo app('translator')->get('common.select_subjects'); ?>" value=""><?php echo app('translator')->get('common.select'); ?> </option>
                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>"
                                            <?php echo e(isset($subject_id) ? ($subject_id == $value->id ? 'selected' : '') : ''); ?>>
                                            <?php echo e($value->subject_name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
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
            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('library.all_issued_book'); ?></h3>
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
                                                <th><?php echo app('translator')->get('library.book_title'); ?></th>
                                                <th><?php echo app('translator')->get('library.book_no'); ?></th>
                                                <th><?php echo app('translator')->get('library.isbn_no'); ?></th>
                                                <th><?php echo app('translator')->get('library.member_name'); ?></th>
                                                <th><?php echo app('translator')->get('library.author'); ?></th>
                                                <th><?php echo app('translator')->get('library.subject'); ?></th>
                                                <th><?php echo app('translator')->get('library.issue_date'); ?></th>
                                                <th><?php echo app('translator')->get('library.return_date'); ?></th>
                                                <th><?php echo app('translator')->get('common.status'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
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
<?php echo $__env->make('backEnd.partials.server_side_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>  

<script>
   $(document).ready(function() {
       $('.data-table').DataTable({
                     processing: true,
                     serverSide: true,
                     "ajax": $.fn.dataTable.pipeline( {
                           url: "<?php echo e(route('all-issed-book-ajax')); ?>",
                           data: { 
                               subject_id : $("#subject_id").val(), 
                               book_number : $("#book_number").val(), 
                               book_id : $("#book_id").val(), 
                            },
                           pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache
                           
                       } ),
                       columns: [
                          
                            {data: 'books.book_title', name: 'books.book_title'},
                            {data: 'books.book_number', name: 'books.book_number'},
                            {data: 'books.isbn_no', name: 'books.isbn_no'},
                           {data: 'user.full_name', name: 'user.full_name'},
                           {data: 'books.author_name', name: 'books.author_name'},
                           {data: 'books.book_subject.subject_name', name: 'books.bookSubject.subject_name'},
                           {data: 'given_date', name: 'given_date'},
                           {data: 'due_date', name: 'due_date'},
                           {data: 'issue_status', name: 'issue_status', orderable: false, searchable: true},
                        ],
                        bLengthChange: false,
                        bDestroy: true,
                        language: {
                            search: "<i class='ti-search'></i>",
                            searchPlaceholder: window.jsLang('quick_search'),
                            paginate: {
                                next: "<i class='ti-arrow-right'></i>",
                                previous: "<i class='ti-arrow-left'></i>",
                            },
                        },
                        dom: "Bfrtip",
                        buttons: [{
                            extend: "copyHtml5",
                            text: '<i class="fa fa-files-o"></i>',
                            title: $("#logo_title").val(),
                            titleAttr: window.jsLang('copy_table'),
                            exportOptions: {
                                columns: ':visible:not(.not-export-col)'
                            },
                        },
                        {
                            extend: "excelHtml5",
                            text: '<i class="fa fa-file-excel-o"></i>',
                            titleAttr: window.jsLang('export_to_excel'),
                            title: $("#logo_title").val(),
                            margin: [10, 10, 10, 0],
                            exportOptions: {
                                columns: ':visible:not(.not-export-col)'
                            },
                        },
                        {
                            extend: "csvHtml5",
                            text: '<i class="fa fa-file-text-o"></i>',
                            titleAttr: window.jsLang('export_to_csv'),
                            exportOptions: {
                                columns: ':visible:not(.not-export-col)'
                            },
                        },
                        {
                            extend: "pdfHtml5",
                            text: '<i class="fa fa-file-pdf-o"></i>',
                            title: $("#logo_title").val(),
                            titleAttr: window.jsLang('export_to_pdf'),
                            exportOptions: {
                                columns: ':visible:not(.not-export-col)'
                            },
                            orientation: "landscape",
                            pageSize: "A4",
                            margin: [0, 0, 0, 12],
                            alignment: "center",
                            header: true,
                            customize: function(doc) {
                                doc.content[1].margin = [100, 0, 100, 0]; //left, top, right, bottom
                                doc.content.splice(1, 0, {
                                    margin: [0, 0, 0, 12],
                                    alignment: "center",
                                    image: "data:image/png;base64," + $("#logo_img").val(),
                                });
                                doc.defaultStyle = {
                                    font: 'DejaVuSans'
                                }
                            },
                        },
                        {
                            extend: "print",
                            text: '<i class="fa fa-print"></i>',
                            titleAttr: window.jsLang('print'),
                            title: $("#logo_title").val(),
                            exportOptions: {
                                columns: ':visible:not(.not-export-col)'
                            },
                        },
                        {
                            extend: "colvis",
                            text: '<i class="fa fa-columns"></i>',
                            postfixButtons: ["colvisRestore"],
                        },
                    ],
                    columnDefs: [{
                        visible: false,
                    }, ],
                    responsive: true,
                });
            } );
</script>
<script>
    function deleteHomeWork(id){
        var modal = $('#deleteHomeWorkModal');
        modal.find('input[name=id]').val(id)
        modal.modal('show');
    }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/capstone2/resources/views/backEnd/library/allIssuedBook.blade.php ENDPATH**/ ?>