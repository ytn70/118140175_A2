<h2><?= $title; ?></h2>

<?= $this->session->flashdata('message'); ?>
<a href="<?php echo site_url('article/create'); ?>">Tambah artikel</a>
<table border='1' cellpadding='4'>
    <tr>
        <td align="center"><strong>Judul kegiatan</strong></td>
        <td align="center"><strong>Deskripsi</strong></td>
        <td align="center"><strong>Kepunyaan</strong></td>
        <td align="center"><strong>Aksi</strong></td>
    </tr>
    <?php
    $data = $this->session->userdata();
    ?>
    <?php foreach ($article as $item) :
        $query = array('id' => $item['owned']);
        $punya = $this->db->get_where('user', $query)->row_array();
    ?>
        <tr>
            <td><?php echo $item['judul']; ?></td>
            <td><?php echo $item['isi']; ?></td>
            <td><?php echo $punya['fname']; ?></td>

            <td>

                <?php if ($data['login_succ']) :
                    if ($data['id'] == 1 || $data['id'] != 1 && $data['id'] == $item['owned']) :
                ?>
                        <a href="<?php echo site_url('article/edit/' . $item['id']); ?>">Edit</a> |
                        <a href="<?php echo site_url('article/delete/' . $item['id']); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>

                    <?php endif; ?>
                <?php endif; ?>

            </td>
        </tr>
    <?php endforeach; ?>
</table>