<?php $this->layout('layout', ['title' => 'Listes des Activités']); ?>

<?php $this->start('main_content');
  if ($w_flash_message) {
      echo '<div class="alert alert-' .$w_flash_message->level.'">'.$w_flash_message->message.'</div>';
  }
    foreach ($activities as $activity) { ?>
      <div class="media">
        <div class="media-left">
          <a href="#">
            <img class="media-object" src="https://mir-s3-cdn-cf.behance.net/projects/404/15995375.548a5c4f8d4a8.png" width="150px" alt="...">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading">Nom de L'auteur</h4>
          <?php echo $activity ['content'] ?>
            <a href="<?= $this->url("activity_delete", ["id" => $activity['id']]); ?>" onclick="confirm('Voulez-vous supprimer ?')">
              <i class="fa fa-trash"></i>
            </a>
        </div>
        <hr>
      </div>

  <?php   }
$this->stop('main_content'); ?>
