<div class="container-fluid">
    <div class="row">

        <!-- Tabel -->
        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List Karyawan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <small>
                                <table id="data" class="table table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <!-- <th>Id Item</th> -->
                                            <th>Nama</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php $status = array(
                                            '1' => 'Administrator',
                                            '2' => 'User',

                                        ); ?>
                                        <?php foreach ($karyawan as $row) { ?>
                                            <tr id="delete" class="<?= $row['idkaryawan'] ?>">
                                                <th scope="row"><?= $i; ?></th>
                                                <!-- <td><?= $row['idkaryawan']; ?></td> -->
                                                <td><?= $row['namalengkap']; ?></td>
                                                <td><?= $row['username']; ?></td>
                                                <td><?= $row['email']; ?></td>
                                                <td><?= $status[$row['userlevel']]; ?></td>

                                                <td>
                                                    <a href="<?php echo site_url() . 'karyawan/view_editekaryawan/' . $row['idkaryawan']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <br>
                                                    <br>
                                                    <button class="delete btn btn-sm btn-danger" data-id="<?= $row['idkaryawan'] ?>">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                        <?php
                                            $i++;
                                        }
                                        ?>



                                    </tbody>
                                </table>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>

<script>
    $(document).on("click.ev", ".delete", function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        swal({
            title: "Anda Yakin ?",
            text: "Data ini akan Dihapus Secara Permanen",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it !",
            closeOnConfirm: false
        }, function() {
            $.ajax({
                url: "<?= base_url('karyawan/delete_karyawan/') ?>",
                type: "post",
                data: {
                    idkaryawan: id
                },
                success: function() {
                    swal('Data Berhasil Di Hapus', '', 'success');
                    $("#delete").fadeTo("slow", 0.7, function() {
                        $("." + id).remove();
                    })

                },
                error: function() {
                    swal('data gagal di hapus', 'error');

                }
            })
        })
    });
</script>