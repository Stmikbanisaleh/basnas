<div class="row">
    <div class="col-xs-12">
        <form class="form-horizontal" role="form" action="<?php echo base_url("profile/update")?>" method="post">
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        
                        <div class="form-group">
                            <div class="col-sm-9">
                                <input type="hidden" id="e_nip" required name="e_nip" class="form-control" value="<?php echo $nip; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>
                            <div class="col-sm-9">
                                <input type="text" id="e_nama" required name="e_nama" class="form-control" value="<?php echo $nama; ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-9">
                                <input type="hidden" id="e_jabatan" required name="e_jabatan" class="form-control" value="<?php echo $this->session->userdata('jabatan'); ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>
                            <div class="col-sm-9">
                                <input type="email" id="e_email" required name="e_email" placeholder="Email" class="form-control" value="<?php echo $email; ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password </label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="e_password" id="e_password" placeholder="" value=""></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit"class="btn btn-sm btn-success pull-left">
                    <i class="ace-icon fa fa-save"></i>
                    Ubah
                </button>
            </div>
        </form>
    </div>

</div>