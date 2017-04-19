<?php
if  (!empty($_POST)) {
    extract($_POST);
    require_once 'include/function.php';
    $erreur = [];
   if(empty($email)){
        $erreur['email'] = 'adresse e-mail manquante';
    }
    elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $erreur['email']='adresse e-mail invalide';
    }
    elseif (!mail_free()) {
        $erreur['email']='adresse e-mail déjà prise';
    }
    if(empty($password)){
        $erreur['password'] = 'mot de passe manquant';
    }
    elseif (strlen($password) <8) {
        $erreur['password'] = 'le mot de passe doit faire au moins 8 caractères';
    }
   if(empty($conf)){
        $erreur['conf'] = 'confirmation de mot de passe manquante';
    }
    elseif ($password != $conf) {
        $erreur['conf'] = 'le mot de passe de confirmation est different du mot de passe';
    }
    if (!$erreur){
        bdd_insert ('INSERT INTO membre (mail, password) VALUES  (:mail, :password)', [
            'mail'=> $email,
            'password'=>password_hash($password, PASSWORD_DEFAULT)
        ]);
        unset($email);
        $validation = 'inscription réussie !';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row menu">
                <div class="col-md-1 col-md-offset-1 bouton">
                    <p>mon_site</p>
                </div>
                <div class="col-md-1 col-md-offset-5 bouton">
                    <p>compte</p>
                </div>
                <div class="col-md-1 bouton">
                    <p>déconnexion</p>
                </div>
                <div class="col-md-1 bouton">
                    <p>inscription</p>
                </div>
                <div class="col-md-1 bouton">
                    <p>connexion</p>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-md-offset-4">
                    <div class="inscription">
                        <h1>ajout</h1>
                    </div>
                    <div class="formulaire">
                        <?php
                            if(isset($erreur['email'])){
                         ?>
                         <div class="alert alert-danger">
                                <?php echo $erreur['email'];?>
                         </div>
                         <?php
                            }
                          ?>
                          <?php
                              if(isset($erreur['password'])){
                           ?>
                           <div class="alert alert-danger">
                                  <?php echo $erreur['password'];?>
                           </div>
                           <?php
                              }
                            ?>
                            <?php
                                if(isset($erreur['conf'])){
                             ?>
                             <div class="alert alert-danger">
                                    <?php echo $erreur['conf'];?>
                             </div>
                             <?php
                                }
                              ?>
                              <?php
                              if(isset($validation)){
                              ?>
                              <div class="alert alert-success">
                                  <?php echo $validation; ?>
                              </div>
                              <?php
                              }
                              ?>
                        </div>
                    </div>
                </div>
            </div>
            <form class="" action="inscription.php" method="post">
                <input type="email" name="email" value="<?php if (isset($email)) echo $email; ?>" placeholder="e-mail">
                <input type="password" name="password" value="" placeholder="mot de passe">
                <input type="password" name="conf" value="" placeholder="confirmer le mot de passe">
                <br>
                <button type="submit" name="button" value="inscription">Inscription</button>
            </form>

    </body>
</html>
