<!-- top section -->
 <main class="app-content">
      <div class="app-title">
        <div>
          <h4>Manage Parking</h4>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="#">Manage Parking</a></li>
        </ul>
      </div>

<!-- end top section -->
<?= $this->session->flashdata('billGenerate'); ?>
<?= $this->session->flashdata('removeParking'); ?>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Vehicle Number</th>
                      <th>Type</th>
                      <th>Slot</th>
                      <th>Owner & Contact</th>
                      <th>Time of Entry</th>
                      <th>Time of Exit</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($veh as $veh): ?>
                    <tr>
                      <td><?= $veh->vehicle_number;?><br>
                        <small>
                          <?= $veh->vehicle_brand;?> <?= $veh->vehicle_model;?>, <?= $veh->vehicle_color;?>
                        </small>
                      </td>
                      <td><?php if ($veh->cat_name === 'Two Wheeler') {
                        echo "<span><i class='fa fa-motorcycle fa-lg'></i></span>";
                          } 
                          elseif($veh->cat_name == 'Three Wheeler'){
                            echo "<i class='fa fa-bus fa-lg'></i>";
                          }
                          elseif($veh->cat_name == 'Four Wheeler'){
                            echo "<i class='fa fa-car fa-lg'></i>";
                          }
                      ?></td>
                      <td><?= $veh->slot_id;?></td>
                      <td><small><?= $veh->vehicle_owner;?> <br>
                        (<?= $veh->vehicle_owner_phone;?>)</small>
                      </td>
                      <td><?= $veh->vehicle_toen;?></td>
                      <td><?= $veh->vehicle_toex;?></td>
                      <td><?php if ($veh->vehicle_status == 0) {
                        echo "<span class='badge badge-success'>IN</span>";
                          } 
                          else{
                            echo "<span class='badge badge-danger'>OUT</span>";
                          }
                      ?>
                        
                      </td>
                      <td><?php 
                          if ($veh->vehicle_status == 0) { ?>
                            <a href="<?= base_url();?>home/remove_parking/<?=$veh->vehicle_id;?>/empty_slot/<?= $veh->slot_id;?>" class="badge badge-danger text-white">Remove</a>
                         <?php } else{ ?>
                          <a href="<?= base_url();?>home/generate_bill/<?=$veh->vehicle_id;?>/" class="badge badge-info">Generate Bill</a>
                          <a href="<?= base_url();?>home/invoice/<?=$veh->vehicle_id;?>/" class="badge badge-dark">Invoice</a>
                        <?php } ?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>