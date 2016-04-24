<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo isset($title)?$title:'Portal Ilmu Berbagi'; ?></title>
</head>

<body>

<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="content-wrap">
                            <table  cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="thetitle">
                                        <h2>Portal Ilmu Berbagi Foundation</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <h3><?php if(isset($name)) echo $name; else echo 'Hey';?>, Selamat Datang di Portal Ilmu Berbagi Foundation!</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <p>Selamat, Anda telah terdaftar sebagai <a href="<?php echo base_url();?>">Member Komunitas Ilmu Berbagi Fondation</a>.</p>
                                        <p>Berikut kami kirimkan informasi akun member Anda :</p>
										<p>
											Nama : <?php echo $name;?><br/>
											Kode : <?php echo $code;?><br/>
											Username : <?php echo $username;?><br/>
											Password : <?php echo $password;?><br/>
										</p>
                                        <p>Anda telah diberikan akses ke layanan-layanan komunitas Ilmu Berbagi, Kami harap Anda dapat segera melengkapi informasi data diri anda di halaman yang telah kami sediakan.</p>
										
										<p>
											Sebelum menggunakan Akun Anda di layanan-layanan Ilmu Berbagi, silakan klik ,link di bawah untuk melakukan aktivasi akun diatas. <a href="<?php echo site_url().'login/activation/'.md5($password);?>">Aktivasi Akun</a>
										</p>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="content-block">
                                        <?php echo isset($footer)?$footer:'Terimakasih. Ilmu Berbagi Foundation Support Team.'; ?><br>
                                        <span class="alert">This email message was auto-generated. Please do not respond.</span>
                                    </td>
                                </tr>
                              </table>
                        </td>
                    </tr>
                </table>
                <div class="footer">
                    <table width="100%">
                        <tr>
                            <td class="aligncenter content-block">2016 &copy; Ilmu Berbagi Foundation IT Division</td>
                        </tr>
                    </table>
                </div></div>
        </td>
        <td></td>
    </tr>
</table>

</body>
</html>
