<div class="container-fluid">
    <div class="row">

        <!-- Tabel -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">History <?php
                                                                            foreach ($idkaryawan as $row) {
                                                                                echo $row['namalengkap'];
                                                                            }
                                                                            ?>
                    </h6>

                    <?php
                    $id = $this->uri->segment(3);
                    echo "<form action='" . site_url() . "history/history_karyawan/" . $id . "' method='POST'>";
                    ?>

                    <div class="row">
                        <div class="col-auto ">
                            <label for="dari_tanggal" class="text-primary">Start Date</label>
                            <input type="date" name="dari_tanggal" id="dari_tanggal">
                        </div>
                        <div class="col-auto">
                            <label for="sampai_tanggal" class="text-primary">End Date</label>
                            <input type="date" name="sampai_tanggal" id="sampai_tanggal">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary btn-sm" name="caritanggal">
                                Search
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
                <!-- Card Body -->
                <div class="card-body ">
                    <div class="table-responsive">
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <small>
                                <table id="data" class="table table-bordered mb-0" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Item</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php

                                        $b = 1;
                                        $status = array(
                                            '1' => 'OK',
                                            '2' => 'Cukup Baik',
                                            '3' => 'Kurang Baik',
                                            '4' => 'Trouble',
                                        );


                                        foreach ($historyall as $row) {

                                            $pchenter = explode("\r\n", $row['keterangan']);
                                            $txtout = "";
                                            for ($i = 0; $i <= count($pchenter) - 1; $i++) {
                                                $pchpart = str_replace($pchenter[$i], "<br>" . $pchenter[$i], $pchenter[$i]);
                                                $txtout .= $pchpart;
                                            }

                                            echo "<tr>
                                    <td scope='row'>" . $b . "</td>   
                                    <td>" . $row['tanggal'] . "</td>
									<td>" . $row['jam'] . "</td>
									<td>" . $row['item'] . "</td>
									<td >" . $status[$row['status']]  . "</td>
									<td >" . $txtout .  "</td>
									</tr>";
                                            $b++;
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </small>
                        </div>
                    </div>
                </div>
                <!--
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $historyall['count'];
                                                                    ?> Repots</h6>
-->

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