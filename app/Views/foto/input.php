<?php
echo $this->extend('template/index');
echo $this->section('content');
?>


<div class="row">
    <div class="col-md-12">
    <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo $title_card; ?></h3>
            </div>
            <!-- /.card-header -->
            <form action="<?php echo $action; ?>" method="post">
                <div class="card-body">
                    <?php 
                    if (validation_errors()) {
                    ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <h5><i class="icon fas fa-warning"></i> Alert!</h5>
                            <?php echo  validation_list_errors() ?>
                        </div>
                    <?php
                    }
                    ?>  
                    
                    <?php
                    if(session()->getFlashdata('error')) {
                        ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-warning"></i> Error</h5>
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                        <?php
                    }
                    ?>

                    <?php echo csrf_field() ?>
                    <div class="form-group">
                        <label for="IDfoto"> IDfoto</label>
                        <input type="text" name="IDfoto" id="IDfoto" value="<?php echo empty(set_value('IDfoto')) ? (empty($edit_data['IDfoto']) ? "":$edit_data['IDfoto']) : set_value('IDfoto') ; ?>" class="form-control">
                    </div>
            <div class="card-body">
                    <div class="form-group">
                        <label for="Jenis_foto"> Jenis_foto</label>
                        <input type="text" name="Jenis_foto" id="<?php echo empty(set_value('Jenis_foto')) ? (empty($edit_data['Jenis_foto']) ? "":$edit_data['Jenis_foto']) : set_value('Jenis_foto') ?>" class="form-control">
                    </div>
            <div class="card-body">
                    <div class="form-group">
                        <label for="harga"> Harga</label>
                        <input type="text" name="Harga" id="Harga" value="<?php echo empty(set_value('Harga')) ? (empty($edit_data['Harga']) ? "":$edit_data['Harga']) : set_value('Harga') ?>" class="form-control">
                    </div>
            <div class="card-body">
                    <div class="form-group">
                        <label for="Fotografer"> Fotografer</label>
                        <input type="text" name="Fotografer" id="Fotografer" value="<?php echo empty(set_value('Fotografer')) ? (empty($edit_data['Fotografer']) ? "":$edit_data['Fotografer']) : set_value('Fotografer') ?>" class="form-control">
                    </div>
            <div class="card-body">
                    <div class="form-group">
                        <label for="password"> password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
            <div>

            <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i>Simpan</button>
                </div>
            </form>
        </div>
    <div>
 </div>
<?php
echo $this->endSection();