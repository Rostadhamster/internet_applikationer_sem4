<div class ="reg">
    <h2><?=$title; ?></h2>
    <p class ="reginfo">
            Fyll i dina uppgifter nedan, och välj ett användarnamn samt lösenord för att kunna ta del av Tasty Recepie!
    </p>    
    
<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
    <div class="table">
<ul>
   <li><input type="text" class="form-control" name="name" placeholder="Namn"></li>
        
  <li><input type="text" class="form-control" name="username" placeholder="Användarnamn"></li>

   <li><input type="password" class="form-control" name="password" placeholder="Lösenord"></li>

   <li><input type="password" class="form-control" name="password2" placeholder="Repetera Lösenord"></li>
    
    <li><button type="submit">Submit</button></li>
</ul>
<?php form_close(); ?>
</div>