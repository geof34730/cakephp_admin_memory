<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary" style="background-color: ">
                <div class="box-header with-border">
                    <h3 class="box-title">Créer/Inviter un utilisateur</h3>
                </div>

                <?= $this->Form->create($userinvitation) ?>
                <div class="box-body">

                    <fieldset>

                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <?php
                            echo $this->Form->control('nom',[
                                "class" => "form-control",
                                "label" => "Nom"

                            ]);
                            echo $this->Form->control('prenom',[
                                "class" => "form-control",
                                "label" => "Prénom"

                            ]);
                            echo $this->Form->control('username',[
                                "class" => "form-control",
                                "label" => "Email"
                            ]);

                            echo $this->Form->control('UUID',[
                                "class" => "form-control",
                                "label" => "UUID",
                                "type" => "hidden"
                            ]);


                            echo $this->Form->input('role', array('label'=>'Profil', 'type'=>'select', 'options'=>['guest'=>'GUEST', 'vip'=>'VIP','conseiller'=>'CONSEILLER'], 'empty'=>'choisissez', "class" => "form-control"));
                        ?>
                        </div>
                </div>
                <?= $this->Form->button(__('INVITER'),array('class'=>'btn btn-primary center-block')) ?>
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



