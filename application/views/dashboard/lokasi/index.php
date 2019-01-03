          <div class="container">
            <div class="row">
                <div class="col-12">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">Pemetaan Lokasi </h3>
                  </div>
                  <a href="<?php echo base_url();?>lokasi/create" class="btn btn-square btn-primary">Add Data</a>
                  <div class="card-body">
                  <table class="table table-bordered">
                            <thead>
                                <tr> 
                                    <th> No</th>
                                    <th> Nama Lokasi </th>
                                    <th> Latitude</th>
                                    <th> Logitude</th>
                                    <th> Gambar</th>
                                    <th> Katagori</th>
                                    <th> Keterangan</th>
                                    <th> Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach ($lokasi_data as $lokasi) { ?>
                                
                            
                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $lokasi->nama;?></td>
                                    <td><?php echo $lokasi->latitude;?></td>
                                    <td><?php echo $lokasi->longitude;?></td>
                                    <td><a href="#" class="btn btn-azure btn-sm">Gambar</a></td>
                                    <td>Masjid</td>
                                    <td>-</td>
                                    <td>
                                        <a href='<?=site_url('lokasi/update/'.$lokasi->idlokasi)?>' class='btn btn-sm btn-primary'><i class='fa fa-pencil-square-o'></i></a>
                                        <a href='<?=site_url('lokasi/delete/'.$lokasi->idlokasi)?>' class='btn btn-sm btn-danger' onclick="javasciprt: return confirm('Are You Sure ?');"><i class='fa fa-trash-o'></i></a>
                                    </td>

                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                  </div>
                </div>
                </div>
            </div>
        </div>