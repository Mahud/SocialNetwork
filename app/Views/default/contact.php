<?php $this->layout('layout', ['title' => 'Contactez-nous']); // On hérite du fichier layout.php ?>

<?php $this->start('main_content'); ?>
    <form method="POST">
        <div class="form-group">
            <label for="name">Nom : </label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
          <br>
        <div class="form-group">
            <label for="message">Message : </label>
            <textarea name="message" id="message" class="form-control"></textarea>
        </div>
          <br>
        <button class="btn btn-default">Envoyer</button>
    </form>
<?php $this->stop('main_content'); ?>
