<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>

            <?php endif; ?>

            <?= $this->session->flashdata('perpustakaan_message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#perpustakaanModal">Add New Menu</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Information</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Register Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($admin as $a) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $a['nama']; ?></td>
                            <td><?= $a['kondisi']; ?></td>
                            <td><?= $a['keterangan']; ?></td>
                            <td><?= $a['jumlah']; ?></td>
                            <td><?= $a['tanggal_register']; ?></td>

                            <td>
                                <a href="" data-toggle="modal" data-target="#perpustakaanUpdateModal" data-id="<?= $a['id_perpustakaan'] ?>" data-menu="<?= $a['nama'] ?>" class="badge badge-success edit">edit</a>
                                <a href="<?= base_url('menu/delete_menu'); ?>/<?= $a['id_perpustakaan'] ?>" onclick="return confirm ('Yakin?')" class="badge badge-danger">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="perpustakaanModal" tabindex="-1" aria-labelledby="perpustakaanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="perpustakaanModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Book Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="kondisi" name="kondisi" placeholder="Kondisi">
                    </div>
                    <!-- <div class="form-group">
                        <select name="kondisi" id="kondisi" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($admin as $a) : ?>
                                <option value="<?= $a['kondisi']; ?>"></option>
                            <?php endforeach; ?>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Information">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Amount">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="tanggal_register" name="tanggal_register" placeholder="Amount">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="perpustakaanUpdateModal" tabindex="-1" aria-labelledby="perpustakaanUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="perpustakaanUpdateModalLabel">Update Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('update_menu'); ?>" id="update" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>