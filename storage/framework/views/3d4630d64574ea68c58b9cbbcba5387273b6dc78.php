
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <h2 class="card-header w-100 m-1 text-center">Upload Image</h2>
    </div>
    <div class="row justify-content-center">
    
    
        <form class="m-2" method="post" action="/file-upload" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">

                <input type="text" class="form-control" id="name" placeholder="Enter file Name" name="name">
            </div>
            <div class="form-group">
                <label for="image">Choose Image</label>
                <input id="image" type="file" name="image">
            </div>
            <button type="submit" class="btn btn-dark d-block w-75 mx-auto">Upload</button>
        </form>
    </div>
</div>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp\htdocs\tasks\resources\views/upload.blade.php ENDPATH**/ ?>