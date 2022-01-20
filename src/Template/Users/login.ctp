<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary" style="background-color: ">
                <div class="box-header with-border">
                    <h3 class="box-title">IDENTIFICATION</h3>
                </div>
                <div style="padding:0 50px 50px 50px">

                    <?= $this->Form->create($user,['novalidate'=> true]);?>
                    <?= $this->Flash->render() ?>
                            <div class="form-group has-feedback">
                                <?= $this->Form->control('username',[
                                    'label' => false,
                                    'type' => 'email',
                                    'class' => 'form-control',
                                    'placeholder' => 'E-mail'
                                ]) ?>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <?= $this->Form->control('password',[
                                    'label' => false,
                                    'type' => 'password',
                                    'class' => 'form-control',
                                    'placeholder' => 'Password',

                                ]) ?>



                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="row">

                                <!-- /.col -->
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-primary center-block">Sign In</button>
                                </div>
                                <!-- /.col -->
                            </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
</section>
