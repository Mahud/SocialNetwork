<?php $this->layout('layout', ['title' => 'Ajoutez une activité']); // On hérite du fichier layout.php ?>

<?php $this->start('main_content'); ?>
    <form method="POST">
        <div class="form-group">
            <label for="content">Contenu de l'activité : </label>
            <input type="text" name="content" id="content" class="form-control">
        </div>
          <br>
        <div class="form-group">
            <label for="type">Type : </label>
            <select name="type" id="type" class="form-control">
              <option value="text">Texte</option>
              <option value="photo">Photo</option>
              <option value="video">Vidéo</option>
             </select>
        </div>
          <br>
        <button class="btn btn-default">Ajouter l'activité</button>
    </form>

<?php $this->stop('main_content'); ?>
