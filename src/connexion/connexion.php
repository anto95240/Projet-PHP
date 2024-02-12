<?php
  require_once (__DIR__ . '/../../includes/header.php');
?>

<div class="container mt-5 rounded bg-success">
<form>
  <div class="form-group mb-3">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="quelquechose@gmail.com">
    <small id="emailHelp" class="form-text text-muted">Votre secret sera bien gardé...</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mot de Passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Pas: Motdepasse :)">
  </div>
  <div class="form-check mb-3">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" disabled>
  <label class="form-check-label" for="defaultCheck2">Se Souvenir (Cette action est temporairement desactivée)</label>
</div>
  <button type="submit" class="btn btn-primary mb-3">Se connecter</button>
</form>
</div>
<div class="container"><button class="btn btn-primary mt-5 center">Notez que vous pouvez naviguer sur le site et faire des achats mais vous serez restreint si vous ne vous connectez pas</button>
</div>

<?php
  require_once (__DIR__ . '/../../includes/footer.php');
?>