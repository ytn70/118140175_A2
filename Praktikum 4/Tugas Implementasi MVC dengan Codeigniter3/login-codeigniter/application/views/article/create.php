<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<form action="<?= base_url('article/create') ?>" method="POST">

    <table>
        <tr>
            <td><label for="judul">Judul</label></td>
            <td>:</td>
            <td><input type="input" id="judul" name="judul" size="50" /></td>
        </tr>
        <tr>
            <td><label for="isi">Isi</label></td>
            <td>:</td>
            <td><textarea id="isi" name="isi" rows="10" cols="40"></textarea></td>
        </tr>
        <tr>
            <td colspan="3">
                <center><input type="submit" name="submit" value="Buat Artikel" /></center>
            </td>
        </tr>
    </table>

    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
</form>