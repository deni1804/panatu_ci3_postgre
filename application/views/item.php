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
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $row['IdItem']; ?></td>
                                            <td><?= $row['Item']; ?></td>
                                            <td><?= $status[$row['IdStatus']]; ?></td>
                                            <td><?= $row['Keterangan']; ?></td>
                                            <td>
                                                <a href="<?php echo site_url() . 'history/view_edititem/' . $row['IdItem']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <br>
                                                <br>
                                                <a href="<?php echo site_url() . 'history/delete_item/' . $row['IdItem']; ?>" class="btn btn-danger btn-sm">Delete</a>
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