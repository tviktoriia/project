<!DOCTYPE html>
<html>
   <head>
      <title>Форма обратной связи</title>
      <meta charset="utf-8" />
      <link href="../../views/css/bootstrap.css" rel="stylesheet">
      <link href="../../views/css/newstyle.css" rel="stylesheet">
      <script src="../../views/js/jquery.js"></script>
      <script src="../../views/js/bootstrap.min.js"></script>
   </head>
   <body>
      <header>
         <nav class="navbar navbar-default menu">
            <div class="container">
               <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#"><img src="../../views/img/logo2.png"></a>
               </div>
               <!-- Collect the nav links, forms, and other content for toggling -->
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                     <li><a href="#">Главная</a></li>
                     <li><a href="#">Портфолио</a></li>
                     <li><a href="#">Оставить отзыв</a></li>
                     <?php require_once(ROOT.'/models/User.php'); ?>
                     <?php if (User::isGuest()): ?>
                     <li>
                        <a href="/project/index.php/user/login/">Вход на сайт</a>
                     </li>
                     <?php else: ?>
                     <li  class="active-link">
                        <a href="/project/index.php/cabinet/">Акаунт</a>
                     </li>
                     <li>
                        <a href="/project/index.php/user/logout/">Выход</a>
                     </li>
                     <?php endif; ?>
                  </ul>
                  <ul class="nav navbar-nav navbar-right icons">
                     <li><a href="#"><img src="../../views/img/facebook.png" height="26" width="27"></a></li>
                     <li><a href="#"><img src="../../views/img/vk.png" height="26" width="27"></a></li>
                     <li><a href="#"><img src="../../views/img/tv.png" height="26" width="27"></a></li>
                  </ul>
                  </li>
                  </ul>
               </div>
               <!-- /.navbar-collapse -->
               <span class="glyphicon glyphicon-globe globe"></span>
               <!-- /.container -->
         </nav>
      </header>
      <div class="container">
      <div class="row">
      <table class="table table-striped">
      <?php foreach($postsList as $value): ?>
      <tr class="table table-striped">
      <td width="70%">
      <div class="media">
      <div class="media-left">
      <a href="#">
      <img class="media-object" src="../../views/img/<?php if($value['image'] == ' ' || $value['image'] == NULL): ?>no_foto.png<?php else: ?><?=$value['image']; ?><?php endif; ?>" width="64" ></br>
      </a>
      </div>
      <div class="media-body">
      <p><?= $value['author']; ?></p>
      <p><?= $value['text_name']; ?></p>
      <p><?= $value['date']; ?></p>
      </div>
      </div>
      </td>
      <td width="10%"><a href="/project/index.php/cabinet/status/<?= $value['id']; ?>">Изменить</a></br><?= $value['status']; ?>
      </td>
      <td width="10%"><a class="edit" href="/project/index.php/cabinet/edit/<?= $value['id']; ?>">Редактировать</a></td>
      </tr>
      <?php endforeach; ?>
      </table>
      </div>
      </div>
      </div>
      <footer>
         <div class="container">
            <div class="row">
               <p class="pull-right">tviktoriia@rambler.ru</p>
            </div>
         </div>
      </footer>
      <script src="../../views/js/main.js"></script>
   </body>
</html>