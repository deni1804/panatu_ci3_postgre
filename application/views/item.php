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
                                            <td><?= $row['iditem']; ?></td>
                                            <td><?= $row['item']; ?></td>
                                            <td><?= $status[$row['idstatus']]; ?></td>
                                            <td><?= $row['keterangan']; ?></td>
                                            <td>
                                                <a href="<?php echo site_url() . 'history/view_edititem/' . $row['iditem']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <br>
                                                <br>

                                                <a href="#" data-toggle="modal" data-target="#deletemodal" class="btn btn-danger btn-sm">Delete</a>

                                                <!-- delete modal-->
                                                <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this item?</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">Select "Delete" to remove.</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                <a class="btn btn-danger" href="<?php echo site_url() . 'history/delete_item/' . $row['iditem']; ?>">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

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