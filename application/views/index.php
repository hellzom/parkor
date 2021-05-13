
    <main class="app-content">
      <div class="app-title">
        <div>
          <h4>Dashboard</h4>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <?= $this->session->flashdata('addCat'); ?>
      <?= $this->session->flashdata('addParking'); ?>

      Slots : 
      <br>
      <hr>
      <div class="row">
        <?php foreach ($veh as $veh): ?>
       
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon">
            <?php if ($veh->cat_name === 'Two Wheeler') {
              echo "<i class='icon fa fa-motorcycle fa-3x'></i>";
                } 
                elseif($veh->cat_name == 'Three Wheeler'){
                  echo "<i class='icon fa fa-bus fa-3x'></i>";
                }
                elseif($veh->cat_name == 'Four Wheeler'){
                  echo "<i class='icon fa fa-car fa-3x'></i>";
                } ?>
            <div class="info">
              <span class="badge badge-dark mb-1">Slot : <?= $veh->slot_id;?></span> <a href="<?= base_url();?>home/remove_parking/<?=$veh->vehicle_id;?>/empty_slot/<?= $veh->slot_id;?>" class="badge badge-danger mb-1 text-white">Remove</a>
              <div class="font-weight-bold"><?= $veh->vehicle_number;?></div>
              <p><small><?= $veh->vehicle_brand;?> <?= $veh->vehicle_model;?>, <?= $veh->vehicle_color;?> </small></p>
            </div>
          </div>
        </div>

      <?php endforeach;?>

      <?php foreach ($slot as $slot): ?>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <span class="badge badge-dark mb-1">Slot : <?= $slot->slot_id;?></span>
              <div class="font-weight-bold">VACANT</div>
              <p><small>Slot is Vacant!</small></p>
            </div>
          </div>
        </div>
      <?php endforeach;?>
      
      </div>
      
    </main>
    