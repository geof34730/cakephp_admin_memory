<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Traduire l'APP</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php

                    echo $this->Form->create($uploadJsonTranSlation, ['type' => 'file']);
                    ?>

                    <fieldset>
                        <?php
                            echo $this->Form->input('jsonFile', array('type' => 'file','class' => 'btn ','label' => 'Upload fichier .Json de traduction de l\'app'));
                            echo $this->Form->button('Uploader', [
                                'type' => 'submit',
                                'escape' => true
                                ]);
                            ?>
                    </fieldset>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</section>

