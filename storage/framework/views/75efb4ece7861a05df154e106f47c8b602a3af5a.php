<?php $__env->startSection('content'); ?>
    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
        <div class="text-center" style="width:70%">
        <h1 class="text-white"> Add your Todo list here</h1>
        <form action="<?php echo e(route('task.store')); ?>" method="POST">
         <?php echo csrf_field(); ?>
          <div class="input-group mb-3 w-100">
            <input type="text" class="form-control form-control-lg" name='name' placceholder="Type here.." aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
              <button class="btn btn-success" type="submit" id="button-addon2"> Add To The list</button>
            </div>
          </div>
        </form> 
        <h2 class="text-white pt-2"> To-Do list</h2>
        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-white w-100"> 
            <div class="w-100 d-flex p-2 align-items-center justify-content-between">
                <div class="p-4">
                    <?php if($task->completed == 0): ?>
                    <form action="<?php echo e(route('task.update', $task->id)); ?>" method="POST">
                    <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?> 
                        <button class="border-0 bg-transparent m1-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <rect x="4" y="4" width="16" height="16" rx="2" />
                            </svg>
                        <input type="text" name="completed" value="1" hidden>
                        </button>
                    </form>
                    <?php else: ?>
                    <form action="<?php echo e(route('task.update', $task->id)); ?>" method="POST">
                    <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?> 
                            <button class="border-0 bg-transparent m1-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <rect x="4" y="4" width="16" height="16" rx="2" />
                                <path d="M9 12l2 2l4 -4" />
                                </svg>
                                <input type="text" name="completed" value="0" hidden>
                            </button>
                    </form>
                    <?php endif; ?> 
                </div> <h3><?php echo e($task->name); ?></h3> 
             <div class="mr-4 d-flex align-items-center justify-content-between">
                <form class="form-inline" method="post" action="/file-upload" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                         <input id="image" type="file" name="image" width="100">
                        <input type="text" name="taskId" value="<?php echo e($task->id); ?>" hidden>
                    </div>
                    <button type="submit" class="btn btn-dark">Upload</button>
                </form>
                <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <?php if($file->fileable_id == $task->id): ?>
                    <td class="cs-p-1">
                    
                        <a href="<?php echo e($file->url); ?>">
                            <img src="<?php echo e($file->url); ?>" class="img-thumbnail" width="80" height="100">
                        </a>    
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <a class="inlane-block" href="<?php echo e(route('task.edit', $task->id)); ?>"> 
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                        <line x1="16" y1="5" x2="19" y2="8" />                        
                    </svg>
                </a>
                <form action="<?php echo e(route('task.destroy', $task->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                        <button class="border-0 bg-transparent m1-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="4" y1="7" x2="20" y2="7" />
                                <line x1="10" y1="11" x2="10" y2="17" />
                                <line x1="14" y1="11" x2="14" y2="17" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg>
                        </button>
                </form>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp\htdocs\tasks\resources\views/welcome.blade.php ENDPATH**/ ?>