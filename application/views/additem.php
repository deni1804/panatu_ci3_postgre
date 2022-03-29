<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">ADD ITEM</h1>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <form class="user" method="POST" action="<?= base_url('history/add_item'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control" id="iditem" name="iditem" placeholder="ID Item" value="<?= set_value('iditem'); ?>">
                                <?= form_error('iditem', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="itemname" name="itemname" placeholder="Item Name" value="<?= set_value('itemname'); ?>">
                                <?= form_error('itemname', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label><a href="#" data-toggle="modal" data-target="#example"> Example Description </a></label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Description" value="<?= set_value('keterangan'); ?>"></textarea>
                                <?= form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class=" form-group">
                                <label for="exampleFormControlSelect1">Status</label>

                                <select class="form-control col-sm-4 mb-3 mb-sm-0" id="idstatus" name="idstatus">
                                    <option value="1">Active</option>
                                    <option value="9">Inactive</option>
                                </select>

                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Add
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>