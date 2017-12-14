<div class="reg">
<h2><?php echo $title; ?></h2>
    <p class ="reginfo">
            Fyll i dina uppgifter nedan, och tryck på login.
    </p> 
<?php echo form_open('users/login'); ?>
<div class="table">

            
 <ul>      
     <li><input type="text" name="username" placeholder="Ange användarnamn" required autofocus></li>
     
     <li><input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus></li>
            
     <li><button type="submit">Login</button></li>
    </ul> 
</div>

<? echo form_close(); ?>
</div>