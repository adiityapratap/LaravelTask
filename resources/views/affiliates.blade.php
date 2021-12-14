<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('header')
    <body>
        <div class="flex-center position-ref full-height">
          
                <div class="top-right links">
                 
                   
                    
                </div>
         

            <div class="content">
                <div class="title m-b-md">
                Affiliates  Under 100 Kms
                </div>

                <div class="links">

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Distance</th>
    </tr>
  </thead>
  <tbody>
  	<?php  foreach ($affiliatesDistanceUnder100 as  $value) { ?>
  		 <tr>
      <th scope="row"><?php echo $value->affiliate_id; ?></th>
      
      <td><?php echo $value->name; ?></td>
       <td><?php echo $value->distance."KM"; ?></td>
    </tr>
  		
  <?php 	} ?>
   
    
  </tbody>
</table>


                </div>
            </div>
        </div>
    </body>
</html>
