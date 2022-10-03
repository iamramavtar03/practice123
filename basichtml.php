<?php
if(isset($_REQUEST['add']))
{
  $a=$_REQUEST['num1'];
  $b=$_REQUEST['num2'];
  
  $c=$a+$b;
}
?>
<html>
<form name="form1" method="post" action="basichtml.php">
  <table>
<tr>
<td>Enter the number 1</td>
<td><input name="num1"/></td>
</tr>
<tr>
<td>Enter the number 2</td>
<td><input name="num2"/></td>
</tr>
<tr>
  <td><button type="submit" name="add">Add</button></td>
</tr>
<tr>
  <td>Total</td>
<td>  <?php echo $c; ?></td>
</tr>
</table>

  </html>