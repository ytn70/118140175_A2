<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('article/edit/' . $news_item['id']); ?>
<table>
    <tr>
        <td><label for="judul">Title</label></td>
        <td><input type="input" id="judul" name="judul" size="50" value="<?php echo $news_item['judul'] ?>" /></td>
    </tr>
    <tr>
        <td><label for="isi">Text</label></td>
        <td><textarea id="isi" name="isi" rows="10" cols="40"><?php echo $news_item['isi'] ?></textarea></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Edit news item" /></td>
    </tr>
</table>

<input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
</form>