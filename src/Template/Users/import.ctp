<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary" style="background-color: ">
                <div class="box-header with-border">
                    <h3 class="box-title">Importer/Inviter des utilisateurs</h3>
                </div>
                <?=$this->Form->create('userInvitationImport',array('type'=>'file'));?>
                <a href="../upload/import_invitationuser.csv" class="btn btn-warning" style="margin:10px;">Téléchargez le modèle CSV initial d'importation d'utilisateur</a>
                <div class="box-body">
                    <fieldset>
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <?php
                            echo $this->Form->input('role', array('label'=>'Profil', 'type'=>'select', 'options'=>['guest'=>'GUEST', 'vip'=>'VIP', 'conseiller'=>'CONSEILLER'],  "class" => "form-control"));
                            echo $this->Form->input('csv_file_import_user', array('type' => 'file','class' => 'btn '));
                            echo $this->Form->button(__('IMPORTER'),['class' => 'center-block btn btn-primary']);
                            ?>
                        </div>
                </div>
                <?php
                echo $this->Form->end();
                ?>
            </div>
        </div>
    </div>
</section>
<style>
    body input[type="radio"]{

        margin-left:10px;
    }
</style>



