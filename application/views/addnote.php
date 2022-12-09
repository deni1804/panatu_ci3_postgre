<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">ADD Note</h1>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <form class="user" method="POST" action="<?= base_url('pantau/add_note'); ?>">
                            <div class="form-group">
                                <textarea class="form-control" id="note" name="note" rows="10" placeholder="Note...." value="<?= set_value('note'); ?>"></textarea>
                                <?= form_error('note', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class=" form-group">
                                <label for="exampleFormControlSelect1">Sift</label>

                                <select class="form-control col-sm-4 mb-3 mb-sm-0" id="shift" name="shift">
                                    <option value="1">Malam</option>
                                    <option value="2">Pagi</option>
                                    <option value="3">Sore</option>
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