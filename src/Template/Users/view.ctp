<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User $user
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Civilite') ?></th>
            <td><?= h($user->civilite) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($user->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prenom') ?></th>
            <td><?= h($user->prenom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pseudo') ?></th>
            <td><?= h($user->pseudo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UUID') ?></th>
            <td><?= h($user->UUID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adresse') ?></th>
            <td><?= h($user->adresse) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ville') ?></th>
            <td><?= h($user->ville) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ComplementAdresse') ?></th>
            <td><?= h($user->complementAdresse) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NumerosCarteLeclerc') ?></th>
            <td><?= h($user->numerosCarteLeclerc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Avatar') ?></th>
            <td><?= h($user->avatar) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('AvatarExtension') ?></th>
            <td><?= h($user->avatarExtension) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FacebookId') ?></th>
            <td><?= h($user->facebookId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FacebookPicture') ?></th>
            <td><?= h($user->facebookPicture) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('InscriptionValide') ?></th>
            <td><?= $this->Number->format($user->inscriptionValide) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CodePostal') ?></th>
            <td><?= $this->Number->format($user->codePostal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Departement') ?></th>
            <td><?= $this->Number->format($user->departement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Espaceculturel') ?></th>
            <td><?= $this->Number->format($user->espaceculturel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Demande Reponse Negative') ?></th>
            <td><?= $this->Number->format($user->demande_reponse_negative) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NombreTestRealise') ?></th>
            <td><?= $this->Number->format($user->nombreTestRealise) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CumuleNoteAvis') ?></th>
            <td><?= $this->Number->format($user->cumuleNoteAvis) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dateblocked') ?></th>
            <td><?= h($user->dateblocked) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PasswordModifed') ?></th>
            <td><?= h($user->passwordModifed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Blacklist') ?></th>
            <td><?= $user->blacklist ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
