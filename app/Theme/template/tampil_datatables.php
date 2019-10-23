<div class="container my-3">
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-hover bg-white table-bordered" id="data-table">
          <thead class="text-center">
            <tr>
              <th width="25">No</th>
              <th>Header 1</th>
              <th>Header 2</th>
              <th>Header 3</th>
              <th width="140"></th>
            </tr>
          </thead>
          <tbody class="text-capitalize">
            <?php 
            $no = 1;
            if (isset($data) AND !empty($data)) {
              foreach ($data as $row) { ?>
              <tr>
                <td class="text-center"><?php echo $no++; ?></td>
                <td><?php echo $row[1] ?></td>
                <td><?php echo $row[2] ?></td>
                <td><?php echo $row[3] ?></td>
                <td>
                  <a class="btn btn-primary btn-sm" href="#">
                    <i class="mdi mdi-account-settings-variant text-white"></i>
                  </a>
                  <a class="btn btn-success btn-sm" href=#>
                    <i class="mdi mdi-account-edit text-white"></i>
                  </a>
                  <a class="btn btn-danger btn-sm small" onclick="return notif_logout()" href="#">
                    <i class="mdi mdi-account-remove text-white"></i>
                  </a>
                </td>
              </tr>
               <?php
              }
            } else { ?>
               <tr>
                 <td colspan="5" class="text-center">Belum Ada Data</td>
               </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>