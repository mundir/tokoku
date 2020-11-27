<?= $this->extend('layoutAdmin_v') ?>

<?= $this->section('content') ?>
<?= form_open('admin/kategori/simpan', ['class' => 'form-horizontal']); ?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card-box">
            <!-- id_kategori disabled -->
            <?php $val = ($submit == "Tambah") ? $dataTabel : $dataTabel->id ?>
            <div class="form-group row">
                <?= form_label('ID Kategori', 'idkat', ['class' => 'col-md-2 col-form-label']); ?>
                <div class="col-md-10">
                    <?= form_input('id', $val, ["class" => "form-control", 'readonly' => 'readonly']); ?>

                </div>
            </div>

            <!-- 'group_kategori' -->
            <?php
            $fld = 'group_kategori';
            $label = 'Group';
            $class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
            $extra = [
                'id' => $fld,
                'class' => $class,
            ];
            $dtt = ($submit == 'Edit') ? $dataTabel->$fld : '';
            $val = (old($fld) != null) ? old($fld) : $dtt;
            $err = $validasi->getError($fld);
            ?>

            <div class="form-group row">
                <?= form_label($label, $fld, ['class' => 'col-md-2 col-form-label']); ?>
                <div class="col-md-10">
                    <?php
                    foreach ($dataGroup as $row) {
                        $options[$row->id] = $row->nama_group;
                    }

                    echo form_dropdown($fld, $options, $val, $extra);

                    ?>
                    <div class="invalid-feedback">
                        <?= $err ?>
                    </div>
                </div>
            </div>


            <!-- 'nama_kategori' -->
            <?php
            $fld = 'nama_kategori';
            $label = 'Nama kategori';
            $class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
            $extra = [
                'id' => $fld,
                'class' => $class,
            ];
            $dtt = ($submit == 'Edit') ? $dataTabel->$fld : '';
            $val = (old($fld) != null) ? old($fld) : $dtt;
            $err = $validasi->getError($fld);
            ?>

            <div class="form-group row">
                <?= form_label($label, $fld, ['class' => 'col-md-2 col-form-label']); ?>
                <div class="col-md-10">
                    <?= form_input($fld, $val, $extra); ?>
                    <div class="invalid-feedback">
                        <?= $err ?>
                    </div>
                </div>
            </div>

            <hr>
            <div class="text-right">
                <a href="<?= $cancel; ?>" class="btn btn-primary">Cancel</a>
                <?= form_submit('submit', $submit, ['class' => 'btn btn-primary']); ?>
            </div>
        </div>

    </div>


</div>
<?= form_close(); ?>

<?= $this->endSection(); ?>