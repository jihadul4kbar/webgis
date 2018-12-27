<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-status bg-blue"></div>
                    <div class="card-header">
                        <h3 class="card-title">Katagori Lokasi </h3>  
                    </div>
                    <a href="<?php echo base_url();?>Kategori/addData" class="btn btn-square btn-primary">Add Data</a>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr> 
                                    <th> No</th>
                                    <th> Nama Katagori </th>
                                    <th> Icon</th>
                                    <th> Keterangan</th>
                                    <th>Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no=1; 
                                foreach ($data_kategori as $kategori) { ?>
                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $kategori->nama_kategori;?></td>
                                    <td><?php echo $kategori->icon;?></td>
                                    <td><?php echo $kategori->keterangan;?></td>
                                    <td><a href="#" class="btn btn-sm btn-blue"><i class="fe fe-edit"></i> </a> <a href="#" class="btn btn-sm btn-danger"><i class="fe fe-trash"></i></a> </td>
                                </tr>
                            <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>