<?php include("header.php") ?>

<form action="storeReview.php" method="post" accept-charset="utf-8">
    <fieldset class="field">
<?php 
    $pid =$_REQUEST['pid'];
    $img =$_REQUEST['img'];
    $pname=$_REQUEST['pname'];
    echo '<legend>Write A Review for <spam style="color:blue">'.$pname.' </legend>
    <center>
    <ul id="wrRevie"><li><fieldset> <img src= '.$img.'></fieldset></li>
    <li>  
    <table cellspacing="10px" align="center">
    <tr align="center"> <td>Name</td> <td><input type="text" name="uname" id="uname" ></td></tr>

  <tr align="center"> <td> E-mail</td> <td><input type="text" name="email" id="email" ></td></tr>
  
    <tr align="center"> <td> Rating</td> <td> <input type="radio" name="rating" value="5" /> 5 
      <input type="radio" name="rating" value="4" /> 4
        <input type="radio" name="rating" value="3" /> 3
        <input type="radio" name="rating" value="2" /> 2 
        <input type="radio" name="rating" value="1" /> 1 <td>
    </tr>

    <tr> <td>Review</td> <td><textarea name="review" rows="8" cols="40"> </textarea> </td> </tr>

    <tr><td colspan=2 align="center"><input type="submit" value="Submit Review"></td></tr>
    </table>
    <input type="hidden" name="product_id" value="'.$pid.'" id="product_id"> </li> </ul> </center>';

?>
</fieldset>
</form>
</div>
