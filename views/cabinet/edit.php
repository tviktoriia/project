<!DOCTYPE html>
<html>
   <head>
      <title>Форма обратной связи</title>
      <meta charset="utf-8" />
      <link href="../../../views/css/bootstrap.css" rel="stylesheet">
      <link href="../../../views/css/newstyle.css" rel="stylesheet">
      <script src="../../../views/js/jquery.js"></script>
      <script src="../../../views/js/bootstrap.min.js"></script>
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
               <a class="navbar-brand" href="#"><img src="../../../views/img/logo2.png"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav">
                  <li><a href="/project/index.php/form/">Главная</a></li>
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
                  <li><a href="#"><img src="../../../views/img/facebook.png" height="26" width="27"></a></li>
                  <li><a href="#"><img src="../../../views/img/vk.png" height="26" width="27"></a></li>
                  <li><a href="#"><img src="../../../views/img/tv.png" height="26" width="27"></a></li>
               </ul>
               </li>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
            <span class="glyphicon glyphicon-globe globe"></span>
            <!-- /.container -->
         </nav>
      </header>
      <div class="row-fluid">
      <div class="new-all">
         <div class="new">
            <h2>Редактировать отзыв</h2>
         </div>
         <form enctype="multipart/form-data" class="form-horizontal" name="create_recall"  id="form-all" method="POST">
            <div class="form-group">
               <label  class="col-sm-2 control-label">Автор</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="input_author" name="author" placeholder="Введите имя" value="<?= $recall['author']; ?>">
                  <div id="author"></div>
               </div>
            </div>
            <div class="form-group">
               <label  class="col-sm-2 control-label">E-mail</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="e_mail" name="e_mail" value="<?= $recall['e_mail']; ?>" >
                  <div id="mail"></div>
               </div>
            </div>
            <div class="form-group">
               <label  class="col-sm-2 control-label">Дата</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="e_mail" name="date" value="<?= $recall['date']; ?>" >
                  <div id="date"></div>
               </div>
            </div>
            <div class="form-group">
               <label for="inputPassword3" class="col-sm-2 control-label">Текст отзыва</label>
               <div class="col-sm-10">
                  <textarea class="form-control" id="textarea" name="text_name" rows="3" placeholder="Введите текст"><?= $recall['text_name']; ?></textarea>
                  <div id="text_name"></div>
               </div>
            </div>
            <div class="form-group">
               <label for="inputPassword3" class="col-sm-2 control-label">Изменино ли администратором</label>
               <div class="col-sm-10">
                  <select class="form-control" name="change_admin">
                     <option>Не изменино</option>
                     <option>Изменино</option>
                  </select>
                  <div id="text_name"></div>
               </div>
            </div>
            <div class="form-group">
               <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" name="save_recall_admin" class="btn btn-default">Сохранить</button></br>
               </div>
            </div>
         </form>
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