<div class="container-fluid">
    <div class="row">

        <!-- Tabel -->
        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List Item</h6>
                    <a href="<?php echo site_url() . 'history/view_additem'; ?>" class="btn btn-primary btn-sm">Add Item </a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <table id="data" class="table table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Item</th>
                                        <th>Item</th>
                                        <th>Status</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php $status = array(
                                        '1' => 'Active',
                                        '9' => 'Inactive',

                                    ); ?>
                                    <?php foreach ($item as $row) { ?>
                                        <tr id="delete" class="<?= $row['iditem'] ?>">
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $row['iditem']; ?></td>
                                            <td><?= $row['item']; ?></td>
                                            <td><?= $status[$row['idstatus']]; ?></td>
                                            <td><?= $row['keterangan']; ?></td>
                                            <td>
                                                <a href="<?php echo site_url() . 'history/view_edititem/' . $row['iditem']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <br>
                                                <button class="delete" data-id="<?= $row['iditem'] ?>">
                                                    Delete
                                                </button>
                                                <!-- <a onclick="deleteitem(<?php echo $row['iditem'] ?>)" href="#" data-toggle="tooltip" data-placement="bottom" title="Hapus Item" class="btn btn-sm btn-danger">Delete</a> -->

                                            </td>
                                        </tr>

                                    <?php
                                        $i++;
                                    }
                                    ?>



                                </tbody>
                            </table>
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
                url: "<?= base_url('history/delete_item/') ?>",
                type: "post",
                data: {
                    iditem: id
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