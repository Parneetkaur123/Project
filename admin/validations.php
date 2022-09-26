<?php
class validation
{
    function valid()
    {
        if(isset($_POST['submit']))
        {
        
           if(empty($_POST['username']) && empty($_POST['password']))
           {
             echo "please fill both fields";
             exit();
           }

        }
 
    }


   function list()
    {
        if (!empty($_POST['submit']))
      {
        $field = array();

     if(isset($_POST['tittle']) && empty($_POST['tittle'])) 
     {
        $field['tittle'] = "This field is mandatory";
     }

     if(isset($_POST['description']) && empty($_POST['description'])) 
     {
        $field['description'] = "This field is mandatory";
     }
      
    }
    
  }
  function password()
  {
   if(isset($_POST['submit']))
   {
       $pass= $_POST['password'];
       $confirm = $_POST['confirmpassword'];
       if(empty($confirm))
       {
          echo "please confirm password";
       }
       else
       {
       if($pass != $confirm)
       {
           echo "password incorrect";
       }
      }
   }
  }
  
}
?>