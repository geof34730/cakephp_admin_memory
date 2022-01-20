<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary" style="background-color: ">
                <div class="box-header with-border">
                    <h3 class="box-title">Editer/Modifier une utilisateur</h3>
                </div>
                <?= $this->Form->create($user) ?>
                <div class="box-body">

                    <fieldset>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="form-group">
                            <?php
                            echo $this->Form->radio('civilite', ['Mr','Mme']);
                            ?>
                        </div>

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
                            "label" => "Email",
                            'disabled'=>false

                        ]);
                        echo '<input type="hidden" name="usernametemp" value="'.$usernameTEMP.'">';


                        echo $this->Form->control('pseudo',[
                            "class" => "form-control",
                            "label" => "Pseudonyme"
                        ]);

                        echo $this->Form->input('role', array('label'=>'Profil', 'type'=>'select', 'options'=>['guest'=>'GUEST', 'vip'=>'VIP', 'conseiller'=>'CONSEILLER','admin'=>'ADMIN'], 'empty'=>'choisissez', "class" => "form-control"));

                        echo "<b>AVATAR</b><br>";





                        if($this->viewVars['user']->avatar!=null && $this->viewVars['user']->avatarExtension!=null){
                            echo "<img src='".URL_AVATAR."/".$this->viewVars['user']->UUID.".".$this->viewVars['user']->avatarExtension."' width=50>";
                        }
                        else{
                                echo "<span class='glyphicon glyphicon-user' style='font-size:50px;'></span>";
                        }

                        echo $this->Form->control('optim1',[
                            "label" => "J’accepte les conditions de participation par tirage au sort.. (date : ".$this->viewVars['user']["dateoptim1"].")"
                        ]);
                        echo $this->Form->control('optim2',[
                            "label" => "J’accepte de recevoir par e-mail les notifications nécessaires au fonctionnement de la Communauté. (date : ".$this->viewVars['user']["dateoptim2"].")"
                        ]);
                        echo $this->Form->control('optim3',[
                            "label" => "J'accepte de recevoir par e-mail les actualités du site www.communauteculture.leclerc. (date : ".$this->viewVars['user']["dateoptim3"].")"
                        ]);
                        ?>

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                        <?php
                        echo $this->Form->control('adresse',[
                            "class" => "form-control",
                        ]);

                        echo $this->Form->control('complementAdresse',[
                            "class" => "form-control"
                        ]);

                        echo $this->Form->control('ville',[
                            "class" => "form-control"
                        ]);

                        echo $this->Form->control('codePostal',[
                            "class" => "form-control"
                        ]);
                        echo $this->Form->input('departement', array('label'=>'Departement ', 'type'=>'select', 'options'=>$departementListe, 'empty'=>'choisissez', "class" => "form-control"));
                        echo $this->Form->input('espaceculturel', array('label'=>'Espace culturel ', 'type'=>'select', 'options'=>$centreCulturelListe, 'empty'=>'choisissez', "class" => "form-control"));
                        echo $this->Form->control('numerosCarteLeclerc',[
                            "class" => "form-control"
                        ]);
                        ?>
                        </div>




                </div>
                <div>
                    <b>Demande de test en cours</b>
                    <table >
                        <?php


                        $demandeencours=false;
                        foreach ($queryDemandeDeTest as $queryDemandeDeTestQ):
                            //debug($queryDemandeDeTestQ);


                        if($queryDemandeDeTestQ->supprimable) {
                            $demandeencours = true;
                            ?>
                            <tr style="background-color:#99a4ac;border-bottom: solid 1px #1b6d85;">
                                <td style="padding:10px;"><b><?= $queryDemandeDeTestQ->titleProduit; ?></b></td>
                                <td style="width:150px;text-align: right;padding-right:10px;"><a
                                            href="javascript:confirmDelete('../deleteDemandeDeTest/<?= $queryDemandeDeTestQ->iddemande; ?>/<?= $queryDemandeDeTestQ->idUser; ?>');"
                                            class="btn btn-primary">Supprimer</a>





                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        <?php endforeach;
                        if(!$demandeencours){
                        ?>
                        <tr>
                            <td style="background-color:red;padding:10px;color:#ffffff;">pas de demande en cours</td>
                        </tr>
                        <?php
                        }

                        ?>

                        <tr>
                            <td style="padding-top:10px;">
                                <table>
                                    <tr>
                                        <td><a href="javascript:mymodalCompte();" class="btn btn-primary center-block" >HISTORIQUE DE COMPTE UTILISATEUR</a></td>



                                        <td style="padding-left:10px;"><a href="javascript:mymodalDemande();" class="btn btn-primary center-block   <?php if($user->demande_reponse_negative==0 && $user->demande_reponse_positive==0){echo " disabled ";}?>" >HISTORIQUE DE DEMANDES DE TEST</a></td>
                                        <td style="padding-left:10px;"><a href="javascript:mymodalTas();"  class="btn btn-primary center-block  <?php if($user->demande_reponse_positive==0){echo " disabled";}?>" >HISTORIQUE DE TAS GAGNANT</a></td>
                                        <td style="padding-left:10px;"><a href="javascript:mymodalAvis();"  class="btn btn-primary center-block  <?php if($user->nombre_avis_deposes==1 ){echo " disabled";}?>" >HISTORIQUE AVIS DEPOSES</a></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>

<style>
    .btn.btn-primary.center-block.disabled{
        background-color: silver;
        border-color: silver;
        color:grey;
    }
</style>

                <div >
                    <?php

                    echo $this->Form->control('demande_reponse_negative',[
                        "class" => "form-control",
                        'disabled'=> true,
                        'label'=> 'Nombre de demande de test non tirés au sort '

                    ]);
                    echo $this->Form->control('demande_reponse_positive',[
                        "class" => "form-control",
                        'disabled'=> true,
                        'label'=> 'Nombre de demande de test tirés au sort '

                    ]);
                    echo $this->Form->control('nombre_avis_deposes',[
                        "class" => "form-control",
                        'disabled'=> true,
                        'label'=> 'Nombre d’avis déposés'
                    ]);

                    $nbAvisReel=$this->viewVars['user']['nombre_avis_deposes']-1;

                    echo "Nombre réel d'avis déposés : <b>".$nbAvisReel."</b><br>&nbsp;<br>";

                    echo $this->Form->control('etatQualiteClient',[
                        "class" => "form-control",
                        'disabled'=> true,
                        "label"=>"Note moyenne de la qualité des avis"

                    ]);
                    echo $this->Form->control('inscriptionValide',[

                        "label" => "Inscription validée"
                    ]);
                    echo $this->Form->control('blacklist',[
                        "label" => "Compte bloqué",
                        "style" => "color:red;"
                    ]);


                    ?>
                </div>
                <?= $this->Form->button(__('ENREGISTRER'),array('class'=>'btn btn-primary center-block')) ?>
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
<script>

    function confirmDelete(delUrl)
    {
        if (confirm("Etes-vous sûr ?"))
        {
            document.location = delUrl;
        }
    }

    function mymodalCompte(){
      //  _widthmodal=$(window).width()-400;
        _widthmodal=600;
        _heighthmodal=$(window).height()-200;
        _widthIframe=_widthmodal-30;
        if(_heighthmodal>550){
            _heighthmodal=550;
        }
        $('.modal-body').html('<iframe src="/Historiqueconnect/edit/<?=$iduser;?>" width="'+_widthIframe+'" name="iframemodaluser" id="iframemodaluser" height="'+_heighthmodal+'" frameborder="0" allowtransparency="true"></iframe>')
        $('.modal-title').html('HISTORIQUE DE COMPTE UTILISATEUR')
        $('.modal-dialog').css(
            {
                'height':_heighthmodal,
                'width':_widthmodal
            }
        );

        $('#myModal').modal({
            title:'ddddd'
        })
    }

    function mymodalDemande(){
        //  _widthmodal=$(window).width()-400;
        _widthmodal=$(window).width()-400;;
        _heighthmodal=$(window).height()-200;
        _widthIframe=_widthmodal-30;
        if(_heighthmodal>550){
            _heighthmodal=550;
        }
        $('.modal-body').html('<iframe src="/Demandedetest/edit/<?=$iduser;?>" width="'+_widthIframe+'" name="iframemodaluser" id="iframemodaluser" height="'+_heighthmodal+'" frameborder="0" allowtransparency="true"></iframe>')
        $('.modal-title').html('HISTORIQUE DE DEMANDES DE TEST')
        $('.modal-dialog').css(
            {
                'height':_heighthmodal,
                'width':_widthmodal
            }
        );

        $('#myModal').modal({
            title:'ddddd'
        })

    }
    function mymodalTas(){
        //  _widthmodal=$(window).width()-400;
        _widthmodal=$(window).width()-400;;
        _heighthmodal=$(window).height()-200;
        _widthIframe=_widthmodal-30;
        if(_heighthmodal>550){
            _heighthmodal=550;
        }
        $('.modal-body').html('<iframe src="/tas/historiqueuser/<?=$iduser;?>" width="'+_widthIframe+'" name="iframemodaluser" id="iframemodaluser" height="'+_heighthmodal+'" frameborder="0" allowtransparency="true"></iframe>')
        $('.modal-title').html('HISTORIQUE DE TAS GAGNANT')
        $('.modal-dialog').css(
            {
                'height':_heighthmodal,
                'width':_widthmodal
            }
        );

        $('#myModal').modal({
            title:'ddddd'
        })

    }
    function mymodalAvis(){
        //  _widthmodal=$(window).width()-400;
        _widthmodal=$(window).width()-400;;
        _heighthmodal=$(window).height()-200;
        _widthIframe=_widthmodal-30;
        if(_heighthmodal>550){
            _heighthmodal=550;
        }
        $('.modal-body').html('<iframe src="/avis/historiqueavisuser/<?=$iduser;?>" width="'+_widthIframe+'" name="iframemodaluser" id="iframemodaluser" height="'+_heighthmodal+'" frameborder="0" allowtransparency="true"></iframe>')
        $('.modal-title').html('HISTORIQUE AVIS DEPOSES')
        $('.modal-dialog').css(
            {
                'height':_heighthmodal,
                'width':_widthmodal
            }
        );

        $('#myModal').modal({
            title:'ddddd'
        })

    }

</script>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
