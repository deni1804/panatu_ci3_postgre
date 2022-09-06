<div class="container-fluid">
    <div class="row">

        <!-- Tabel -->
        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">History <?php
                                                                            foreach ($idkaryawan as $row) {
                                                                                echo $row['namalengkap'];
                                                                            }
                                                                            ?>
                    </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <table id="data" class="table table-bordered mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Item</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    /*
                                    $idkaryawan['jam'];
                                    $idkaryawan['item'];
                                    $idkaryawan['status'];
                                    $idkaryawan['keterangan'];

                                    
                                    $status = array(
                                        '1' => 'OK',
                                        '2' => 'Cukup Baik',
                                        '3' => 'Kurang Baik',
                                        '4' => 'Trouble',
                                    );
                                    
                                    foreach ($historyall as $row) {
                                        echo "<tr>
									<td>" . $row['tanggaljam'] . "</td>
									<td>" . $row['iditem'] . "</td>
									<td >" . $status[$row['status']] . "</td>
									<td >" . $row['keterangan'] .  "</td>
									</tr>";
                                    }
                                    */
                                    foreach ($historyall as $row) {
                                        echo "<tr>
                                    <td>" . $row['tanggal'] . "</td>
									<td>" . $row['jam'] . "</td>
									<td>" . $row['item'] . "</td>
									<td >" . $row['status'] . "</td>
									<td >" . $row['keterangan'] .  "</td>
									</tr>";
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

    /*
        function deleteitem(iditem) {
            swal({
                    title: "Anda Yakin?",
                    text: "Data <?php echo $row['iditem']; ?> Akan Dihapus Secara Permanen!",
                    type: "warning",
                    showCancelButton: true,
                    // confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                },
                function() {
                    $.ajax({
                        url: "<?php echo base_url('history/delete_item/') ?>",
                        type: "post",
                        data: {
                            iditem: iditem
                        },
                        success: function() {
                            swal('Data Berhasil Di Hapus', ' ', 'success');
                            $("#delete").fadeTo("slow", 0.7, function() {
                                $(this).remove();
                            })

                        },
                        error: function() {
                            swal('data gagal di hapus', 'error');
                        }
                    });

                });
        }
        */
</script>