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
          <li class="breadcrumb-item"><a href="#">Add Parking</a></li>
        </ul>
      </div>

<!-- end top section -->

 <div class="row">
     <div class="col-md-6 offset-md-3">
         <div class="card">
    <?= form_open('home/add_parking');?>
    <div class="card-header">
        <strong><i class="fa fa-car"></i> New Parking</strong>
    </div>
    <div class="card-body card-block">

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="vehicle_number" class=" form-control-label">Vehicle Category</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="cat_name" id="" class="form-control form-control-sm">
                      <option value="">Select</option>
                      <?php foreach($cat as $cat): ?>
                         <option value="<?= $cat->cat_name;?>"><?= $cat->cat_name;?></option>
                     <?php endforeach; ?>
                    </select>
                    <?= form_error('cat_name'); ?>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="slot" class=" form-control-label">Alloted Slot</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="slot_id" id="" class="form-control form-control-sm">
                      <option value="">Select</option>
                      <?php foreach($slot as $slot): ?>
                         <option value="<?= $slot->slot_id;?>"><?= $slot->slot_name;?></option>
                     <?php endforeach; ?>
                    </select>
                    <?= form_error('slot_id'); ?>
                </div>
            </div>
        
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="vehicle_number" class=" form-control-label">Vehicle Number</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="vehicle_number" placeholder="Enter Number here..." class="form-control form-control-sm">
                    <?= form_error('vehicle_number'); ?>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="vehicle_brand" class=" form-control-label">Vehicle Brand</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="vehicle_brand" placeholder="Enter brand here..." class="form-control form-control-sm">
                    <?= form_error('vehicle_brand'); ?>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="vehicle_model" class=" form-control-label">Vehicle Model</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="vehicle_model" placeholder="Enter model here..." class="form-control form-control-sm">
                    <?= form_error('vehicle_model'); ?>
                </div>
            </div>
            
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="vehicle_color" class=" form-control-label">Vehicle Color</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="vehicle_color" placeholder="Enter color here..." class="form-control form-control-sm">
                    <?= form_error('vehicle_color'); ?>
                </div>
            </div>
            <hr>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="vehicle_owner" class=" form-control-label">Vehicle Owner</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="vehicle_owner" placeholder="Enter color here..." class="form-control form-control-sm">
                    <?= form_error('vehicle_owner'); ?>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="vehicle_owner_phone" class=" form-control-label">Vehicle Owner Phone</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="vehicle_owner_phone" placeholder="Enter color here..." class="form-control form-control-sm">
                    <?= form_error('vehicle_owner_phone'); ?>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="vehicle_owner_email" class=" form-control-label">Vehicle Owner Email</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="vehicle_owner_email" placeholder="Enter color here..." class="form-control form-control-sm">
                    <?= form_error('vehicle_owner_email'); ?>
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