<div class="list-group">
                    <a href="<?php echo base_url('profil'); ?>" class="list-group-item list-group-item-action <?php if ( $this->uri->uri_string() == 'profil' ){ echo 'active'; } ?>">
                        Profil
                    </a>
                    <a href="<?php echo base_url('editprofil'); ?>" class="list-group-item list-group-item-action <?php if ( $this->uri->uri_string() == 'editprofil' ){ echo 'active'; } ?>">Edit Profil</a>
                    <a href="<?php echo base_url('riwayat'); ?>" class="list-group-item list-group-item-action <?php if ( $this->uri->uri_string() == 'riwayat' ){ echo 'active'; } ?>">Riwayat</a>
                </div>