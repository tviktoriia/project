<?php require_once(ROOT.'/views/header/header.php'); ?>
<div class="container">
   <div class="row">
      <div class="span12">
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
            <div id="error-radio"></div>
            <div class="form-group">
               <label class="control-label"></br>
               <input type="text" class="form-control col-xs-2" name="input_date" id="date-sort" placeholder="Поиск...">
               </label>
               <div id="error-input"></div>
            </div>
      </div>
      <button type="submit" name="check-submit" id="form-sort" onclick="return validate_form();" class="btn btn-info">Отсортировать отзывы</button></br></br>
      </form>
   </div>
</div>
<!--Сортировать-->
<!--Контент -->
<div class="container">
   <div class="row">
      <div class="span12">
         <?php foreach ($postsList as $value): ?>
         <div class="panel panel-default">
            <div class="panel-heading">
               <div class="media">
                  <div class="media-left">
                     <img class="media-object" src="../../views/img/<?php if($value['image'] == ' ' || $value['image'] == NULL): ?>no_foto2.png<?php else: ?><?=$value['image']; ?><?php endif; ?>"></br>
                  </div>
                  <div class="media-body">
                     <?php if ($value['change_admin'] == "Изменино"): ?>
                     <div class="pull-right">
                        <span class="label label-info"><?=$value['change_admin']; ?></span>
                     </div>
                     <?php endif; ?></br>
                     <?=$value['author']; ?></br>
                     <?=$value['text_name']; ?></br>
                     <?=$value['date']; ?></br>
                  </div>
               </div>
            </div>
         </div>
         <?php endforeach; ?>
         <div id="new-div">
            <div id="panel-heading">
               <div id="media">
                  <div id="media-left">
                  </div>
                  <div id="media-body">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--Новий отзыв -->
<div class="container">
   <div class="row">
      <div class="new-all">
         <div class="new">
            <h2>Создать новый отзыв</h2>
         </div>
         <form enctype="multipart/form-data" class="form-horizontal" name="create_recall" action="/project/index.php/form/save" id = "form-all" method="post">
            <div class="form-group">
               <label for="inputEmail3" class="col-sm-2 control-label">Введите имя</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="input_author" name="author" placeholder="Введите имя">
                  <div id="author"></div>
               </div>
            </div>
            <div class="form-group">
               <label for="inputEmail3" class="col-sm-2 control-label">Введите e-mail</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="e_mail" name="e_mail" placeholder="Введите e-mail" >
                  <div id="mail"></div>
               </div>
            </div>
            <div class="form-group">
               <label for="exampleInputFile" class="col-sm-2 control-label">Загрузить изображение</label>
               <div class="col-sm-10">
                  <input type="file" class="size-image" name="image" id="exampleInputFile">
                  <p class="help-block help">Допустимо загружать только изображения: .gif, .png, .jpg</p>
               </div>
            </div>
            <div class="form-group">
               <label for="inputPassword3" class="col-sm-2 control-label">Введите текст</label>
               <div class="col-sm-10">
                  <textarea class="form-control" id="textarea" name="text_name" rows="3" placeholder="Введите текст"></textarea>
                  <div id="text_name"></div>
               </div>
            </div>
            <div class="form-group">
               <div class="col-sm-offset-2 col-sm-10">
                  <button type="button"  name ="reviews" id="reviews" onclick="return valid_all();" class="btn btn-default">Просмотреть</button>
                  <button type="submit" name="save_recall" onclick="return validate_create_recall();" class="btn btn-default">Сохранить</button></br>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<footer>
   <div class="container">
      <p class="pull-right">tviktoriia@rambler.ru</p>
   </div>
</footer>
<script src="../../views/js/main.js"></script>
<script src="../../views/js/validation.js"></script></script>
</body>
</html>