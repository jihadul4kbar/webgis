<div class="container">
            <div class="row">
                <div class="col-12">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">Pemetaan Lokasi </h3>
                  </div>
                  <div class="card-body">
                    <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Lokasi</label>
                            <div class="col-sm-12">
                            <input type="text" name="lokasi" class="form-control <?php echo form_error('lokasi') ? 'is-invalid':'' ?>" placeholder="Lokasi">
                            </div>
                            <div class="invalid-feedback">
									<?php echo form_error('lokasi') ?>
							</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Latitude</label>
                            <div class="col-sm-12">
                            <input type="text" name="latitude" class="form-control" placeholder="Latitude">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Logitude</label>
                            <div class="col-sm-12">
                            <input type="text" name="logitude" class="form-control" placeholder="Logitude">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Katagori</label>
                            <div class="col-sm-12">
                            <select class="form-control">
                            <?php foreach ($kategori as $row) { ?>
                                <option value="<?php echo $row->idkategori;?>"><?php echo $row->nama_kategori;?></option>
                            <?php } ?>
                            </select>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-12">
                            <textarea class="form-control"></textarea>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control">
                            </div>
                    </div>
                    <div class="form-group row">
                            <div class="col-sm-12">
                            <button type="submit" class="btn btn-block btn-azure"> <?php echo $button ?></button>
                            </div>
                    </div>
                    </form>
                  </div>
                </div>
                </div>
            </div>
        </div>