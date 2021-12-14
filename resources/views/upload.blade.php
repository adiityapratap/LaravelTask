<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @include('header')

    <body>
        <div class="flex-center position-ref full-height">
          
                <div class="top-right links">
                </div>
          

            <div class="content">
                <div class="title m-b-md">
                  Upload Affiliates Data
                </div>

                <div class="links">

                   <?php
         echo Form::open(array('url' => '/uploadfile','files'=>'true','enctype'=>"multipart/form-data",'class' => 'form-bootstrap'));
         echo 'Select the file to upload.';
         echo Form::file('affiliates');
         echo Form::submit('Upload File',['class' => 'btn btn-danger']);
         echo Form::close();
      ?>
                </div>
            </div>
        </div>
    </body>
</html>
