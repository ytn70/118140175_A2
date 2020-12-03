<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <div class="box">
        <h1>Login Account</h1>
        <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url("auth") ?>" method="POST">
            <table border="0" cellpadding="7" cellspacing="0">
                <div>
                    <tr>
                        <td><label for="username">Username</label></td>
                        <td>:</td>
                        <td><input type="text" id="username" name="username" placeholder="username.."></td>
                        <td><?= form_error('username', '<div style="color: red;"><small>', '</small></div>'); ?></td>
                    </tr>

                </div>
                <div>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td>:</td>
                        <td><input type="password" id="password" name="password" placeholder="password.."></td>
                        <td><?= form_error('password', '<div style="color: red;"><small>', '</small></div>'); ?></td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <td colspan="3">
                            <center><button type="submit" name="login">Login</button></center>
                        </td>
                    </tr>
                </div>
            </table>
        </form>
    </div>
</body>

</html>