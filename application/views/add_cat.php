 <!-- top section -->
 <main class="app-content">
      <div class="app-title">
        <div>
          <h2>Hey there,</h2>
          <p>What's on your mind today? Let's look at today's work!</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="#">Add Category</a></li>
        </ul>
      </div>

<!-- end top section -->

 <div class="row">
     <div class="col-md-6 offset-md-3">
         <div class="card">
    <?= form_open('home/add_cat');?>
    <div class="card-header">
        <strong><i class="fa fa-building"></i> New Category</strong>
    </div>
    <div class="card-body card-block">
        
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="Cat Name" class=" form-control-label">Category Name</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="cat_name" placeholder="Enter Category name here..." class="form-control form-control-sm">
                    <?= form_error('cat_name'); ?>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="Cat Name" class=" form-control-label">Category Charge</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="number" name="cat_charge" placeholder="Enter Category charge here..." class="form-control form-control-sm">
                    <?= form_error('cat_charge'); ?>
                </div>
            </div>
            
            
    </div>
    <div class="card-footer text-center">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Submit
        </button>
        <button type="reset" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Reset
        </button>
    </div>
    <?= form_close();?>
</div>

     </div>
 </div>