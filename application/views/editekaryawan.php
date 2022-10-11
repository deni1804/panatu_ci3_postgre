<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">EDIT KARYAWAN</h1>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <form class="user" method="POST" action="<?= base_url('karyawan/editekaryawan'); ?>">

                            <div class="form-group">
                                <input type="text" class="form-control" id="idkaryawan" name="idkaryawan" placeholder="Nama Lengkap" value="<?= $idkaryawan['idkaryawan']; ?>" readonly>
                                <?= form_error('idkaryawan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="namalengkap" name="namalengkap" placeholder="Nama Lengkap" value="<?= $idkaryawan['namalengkap']; ?>">
                                <?= form_error('namalengkap', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class=" form-group">
                                <input type="text" class="form-control" id="username" name="username" placeholder="User Name" value="<?= $idkaryawan['username']; ?>">
                                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>

                            </div>
                            <div class=" form-group">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= $idkaryawan['email']; ?>">
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>

                            </div>
                            <div class=" form-group">
                                <label for="exampleFormControlSelect1">User Lavel</label>

                                <select class="form-control col-sm-4 mb-3 mb-sm-0" id="userlevel" name="userlevel">
                                    <option value="1" <?= ($idkaryawan['userlevel'] == 1 ? 'selected' : ''); ?>>Administrator</option>
                                    <option value="2" <?= ($idkaryawan['userlevel'] == 2 ? 'selected' : ''); ?>>User</option>
                                </select>

                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Update Account
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>