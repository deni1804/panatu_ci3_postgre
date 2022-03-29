<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">EDIT ITEM</h1>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <form class="user" method="POST" action="<?= base_url('history/edit_item'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control" id="iditem" name="iditem" placeholder="ID Item" value="<?= $IdItem['IdItem']; ?>" readonly>
                                <?= form_error('iditem', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="itemname" placeholder="Item Name" value="<?= $IdItem['Item']; ?>">
                                <?= form_error('itemname', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Description"><?= $IdItem['Keterangan']; ?></textarea>
                            </div>
                            <div class=" form-group">
                                <label for="idstatus">Status</label>

                                <select class="form-control col-sm-4 mb-3 mb-sm-0" id="idstatus" name="idstatus">
                                    <option value="1" <?= ($IdItem['IdStatus'] == 1 ? 'selected' : ''); ?>>Active</option>
                                    <option value="9" <?= ($IdItem['IdStatus'] == 9 ? 'selected' : ''); ?>>Inactive</option>
                                </select>

                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                UPDATE
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>