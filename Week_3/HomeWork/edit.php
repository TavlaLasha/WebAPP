<div id="edit">
<a href="index.php" style="text-decoration:none; color:black; font-size:30px;">&#10006;</a>
    <h3>Edit</h3>
    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?=$text['id'];?>">
        <textarea name="text" cols="30" rows="5"><?=$text['text'];?></textarea>
        <select name="answer">
            <option value="1" <?php if($text['answer']==1){echo("selected='selected'");} ?>>True</option>
            <option value="0" <?php if($text['answer']==0){echo("selected='selected'");} ?>>False</option>
        </select>
        <input type="submit" name="edit" value="Update"><br><br>
        <input type="submit" name="remove" value="Remove Word">
    </form>
</div>