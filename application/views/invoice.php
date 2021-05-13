<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> Invoice</h1>
          <p>Invoice for Vehicle Parking</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Invoice</a></li>
        </ul>
      </div>
      <?php foreach ($veh as $veh): ?>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i> Parkor Parking Pvt Ltd.</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right">
                    <?php if ($veh->cat_name === 'Two Wheeler') {
                        echo "<span><i class='fa fa-motorcycle fa-3x'></i></span>";
                          } 
                          elseif($veh->cat_name == 'Three Wheeler'){
                            echo "<i class='fa fa-bus fa-3x'></i>";
                          }
                          elseif($veh->cat_name == 'Four Wheeler'){
                            echo "<i class='fa fa-car fa-3x'></i>";
                          }
                      ?>
                  </h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">From
                  <address><strong>Parkor</strong><br>Thana Chowk, Purnia<br>Email: support@parkor.com</address>
                </div>
                <div class="col-4">To
                  <address><strong><?= $veh->vehicle_owner;?></strong><br>Phone: <?= $veh->vehicle_owner_phone;?><br>Email: <?= $veh->vehicle_owner_email;?></address>
                </div>
              
                <div class="col-4"><b>
                    <?php foreach ($token as $tok) {
                      echo "Token : #".$tok->token_generated;
                    } ?>
                  </b><br><br><b>Payment Due:</b> <?php echo date('j F, Y',strtotime($veh->vehicle_toex));?></div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Vehicle Number</th>
                        <th>In time</th>
                        <th>Out time</th>
                        <th>Minutes Stayed</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?= $veh->vehicle_number;?><br>
                        <small>
                          <?= $veh->vehicle_brand;?> <?= $veh->vehicle_model;?>, <?= $veh->vehicle_color;?>
                        </small>
                      </td>
                        <td><?= $veh->vehicle_toen;?></td>
                        <td><?= $veh->vehicle_toex;?></td>
                        <?php foreach ($token as $token): ?>
                        <td><?= $token->minutes_stayed;?></td>
                        <td><?= $token->token_price;?></td>
                      <?php endforeach;?>
                      </tr>
                 <?php endforeach;?>
                    </tbody>
                  </table>

                </div>
              </div>
              <div class="row d-print-none mt-2">
                <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </main>