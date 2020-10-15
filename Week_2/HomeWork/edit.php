<div id="edit">
    <h3>Edit</h3>
    <form action="index.php" method="post">
        <a href="index.php" style="text-decoration:none; color:black; font-size:30px;">&#10006;</a>
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
        <input type="text" style="text-align:center;" name="eng" value="<?=$word[0]['eng_ver'];?>" placeholder="English Version">&#10143;
        <input type="text" style="text-align:center;" name="geo" value="<?=$word[0]['ge_ver'];?>" placeholder="Georgian Version">
        <input type="submit" name="edit" value="Update"><br><br>
        <input type="submit" name="remove" value="Remove Word">
    </form>
</div>