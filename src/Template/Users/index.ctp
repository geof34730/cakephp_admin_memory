
<link rel="stylesheet" href="/admin_l_t_e/plugins/datatables/dataTables.bootstrap.css"/>
<style>

    a.btn.btn-outline-danger{
        border-color: #d9534f;
        color:#d9534f;
    }
    a.btn.btn-outline-succes{
        border-color: #5cb85c;
        color:#5cb85c;
    }
</style>


<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Liste des Utilisateurs</h3>
                </div>
                    <div class="row">
                        <div class="col-sm-1" style="text-align: right;">
                        <h4><b>FILTER:</b></h4>
                        </div>
                        <div class="col-sm-2">
                            <select id="implication" class="form-control">
                                <option value="all">COEFFICIENT DE QUALITÉ</option>
                                <option value="SUPER">SUPER</option>
                                <option value="BIEN">BIEN</option>
                                <option value="MOYEN">MOYEN</option>
                                <option value="MAUVAIS">MAUVAIS</option>
                                <option value="TRES MAUVAIS">TRES MAUVAIS</option>
                                <option value="BLACK LISTE">BLACK LISTE</option>
                            </select>
                        </div>

                        <div class="col-sm-2">

                        <select id="statut" class="form-control">
                            <option value="all">PROFIL UTILISATEUR</option>
                            <option value="GUEST">GUEST</option>
                            <option value="VIP">VIP</option>
                            <option value="CONSEILLER">CONSEILLER</option>
                            <option value="ADMIN">ADMIN</option>
                        </select>
                        </div>

                        <div class="col-sm-6"><div  class="dataTables_filter"><label>Search:<input type="search" id="searchculture" class="form-control input-sm" placeholder="" ></label></div></div>


                    </div>

                <!-- /.box-header -->
                <div class="box-body">
                        <table  id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">NOM</th>
                                    <th scope="col">PRENOM</th>
                                    <th scope="col">COEFFICIENT DE QUALITÉ</th>
                                    <th scope="col">USERNAME</th>
                                    <th scope="col">PROFIL</th>
                                    <th scope="col">PSEUDO</th>
                                    <th scope="col" class="actions" align="center"><?= __('ACTION') ?></th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?= h($user->nom) ?></td>
                                            <td><?= h($user->prenom) ?></td>


                                            <?php if ($user->etatQualiteClient >= 40  && !$user->blacklist) { ?>
                                                <td style="background-color: green;color:#fff;text-align: center;padding-top:15px;">
                                                    SUPER
                                                </td>
                                            <?php } ?>

                                            <?php if ($user->etatQualiteClient >= 30 && $user->etatQualiteClient <= 39 && !$user->blacklist) { ?>
                                                <td style="background-color: #0d6aad;color:#fff;text-align: center;padding-top:15px;">
                                                    BIEN
                                                </td>
                                            <?php } ?>

                                            <?php if ($user->etatQualiteClient >= 20 && $user->etatQualiteClient <= 29 && !$user->blacklist) { ?>
                                                <td style="background-color: #c87f0a;color:#fff;text-align: center;padding-top:15px;">
                                                    MOYEN
                                                </td>
                                            <?php } ?>

                                            <?php if ($user->etatQualiteClient >= 10 && $user->etatQualiteClient <= 19 && !$user->blacklist) { ?>
                                                <td style="background-color: red;color:#fff;text-align: center;padding-top:15px;">
                                                    MAUVAIS
                                                </td>
                                            <?php } ?>

                                            <?php if ($user->etatQualiteClient >= 0 && $user->etatQualiteClient <= 9 && !$user->blacklist) { ?>
                                                <td style="background-color: #720e9e;color:#fff;text-align: center;padding-top:15px;">
                                                    TRES MAUVAIS
                                                </td>
                                            <?php } ?>

                                            <?php if ($user->blacklist) { ?>
                                                <td style="background-color: #000000;color:#fff;text-align: center;padding-top:15px;">
                                                    BLACK LISTE
                                                </td>
                                            <?php } ?>


                                            <td><?= h($user->username) ?></td>
                                            <td><?= h($user->role) ?></td>


                                            <td><?= h($user->pseudo) ?></td>

                                            <td align="center">
                                                <?= $this->Html->link(__('Editer / Modifier'), ['action' => 'edit', $user->id], ['class' => 'btn btn-outline-succes']) ?>
                                                <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete  ' . h($user->prenom) . ' ' . h($user->nom) . ' ?', $user->id), 'class' => 'btn btn-outline-danger']) ?>
                                            </td>
                                        </tr>


                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</section>
<!-- /.content -->
<?php
$this->Html->css([
    'AdminLTE./plugins/datatables/dataTables.bootstrap',
],
    ['block' => 'css']);

$this->Html->script([
    'AdminLTE./plugins/datatables/jquery.dataTables.min',
    'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
],
    ['block' => 'script']);
?>

<?php $this->start('scriptBotton'); ?>
<script>
    $(function () {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "iDisplayLength": 20
        });
    });



    /* Custom filtering function which will search data in column four between two values */
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var implicationTable = data[2]
            var statutTable = data[4]
            //console.log(implicationTable)
            if (implicationTable==$('#implication').val() ||  $('#implication').val()=='all'){
                if (statutTable==$('#statut').val().toLowerCase() ||  $('#statut').val()=='all') {
                    return true;
                }
                else{
                    return false
                }
            }
            else{
                return false;
            }
        }
    );

    $(document).ready(function(){
        var table = $('#example2').DataTable();
            $('#implication, #statut').change( function() {
                table.draw();
            });


        $('#searchculture').on( 'keyup', function () {
            table.search( this.value ).draw();
        } );


    });
</script>
<style>
    #example2_filter{
        display: none;
    }
    div.dataTables_filter{
        text-align: left;
        text-transform: uppercase;
    }
</style>
<?php $this->end(); ?>