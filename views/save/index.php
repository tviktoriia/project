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
                     <li class="active-link"><a href="#">Главная</a></li>
                     <li><a href="#">Портфолио</a></li>
                     <li><a href="#">Оставить отзыв</a></li>
                     <?php require_once(ROOT.'/models/User.php'); ?>
                     <?php if (User::isGuest()): ?>
                     <li>
                        <a href="/project/index.php/user/login/">Вход на сайт</a>
                     </li>
                     <?php else: ?>
                     <li>
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
               <span class="glyphicon glyphicon-globe globe"></span>
         </nav>
      </header>
      <div class="container">
      <div class="row">
      <div class="span12 der3">
      <form class="form-group" name="form_sort" action="FrontController.php" method="post">
      <label class="radio-inline">
      <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="date"> По дате
      </label>
      <label class="radio-inline">
      <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="author"> По автору
      </label>
      <label class="radio-inline">
      <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="e_mail"> По e-mail
      </label>
      <span id="error-radio"></span>
      <div class="form-group">
      <label class="control-label"></br>
      <input type="text" class="form-control col-xs-2" name="input_date" placeholder="Поиск...">
      </label>
      <span id="error-input"></span>
      </div>
      <button type="submit" name="check-submit" id="form-sort" onclick="return validate_form();" class="btn btn-info">Отсортировать отзывы</button></br></br>
      </form>
      <p class="save"><?=$save_recall; ?></p>
      </div>
      </div>
      </div>
      </div>
      <footer>
         <div class="container">
            <p class="pull-right">tviktoriia@rambler.ru</p>
         </div>
      </footer>
      <script src="../../views/js/main.js"></script>
   </body>
</html>