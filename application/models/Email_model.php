<?php

class Email_model extends CI_Model
{
    public function daftar($data)
    {
        $mailtext = '<!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>SIPP | Account Verifications</title><meta name="viewport" content="width=device-width, initial-scale=1.0">    </head><body style="margin: 0; padding: 0;"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="padding: 10px 0 30px 0;"><table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;"><tbody><tr><td align="center" bgcolor="#00B25D" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"><img src="' . base_url('assets/email/reg01') . '/h1.gif" alt="SIPP Email" width="300" height="230" style="display: block;"></td></tr><tr><td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;"><b>Halo, ' . $data['nama'] . ' &#128521;</b></td></tr><tr><td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">Sistem Informasi Pondok Pesantren adalah aplikasi digital yang mengelola pendaftaran santri baru pada Pondok Pesantren Al Hikmah 1, dengan sistem digital pendaftaran dapat di laksanakan dengan efektif serta efisien, juga untuk mendukung single data, dimana data seluruh santri dikumpulkan pada satu sistem agar teratur serta menghindari adanya data ganda, pemalsuan data, serta penumpukan file fisik yang mengakibatkan hal-hal yang tidak diinginkan.</td></tr><tr><td><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td width="260" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td><img src="' . base_url('assets/email/reg01') . '/left.gif" alt="" width="100%" height="140" style="display: block;"></td></tr>';

        $mailtext .= '<tr><td style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">Selamat ! kamu telah menyelesaikan tahap pertama pada sistem pendaftaran Lembaga Pendidikan Yayasan Pondok Pesantren Al Hikmah 1 &#128522;, ditahap berikutnya adalah aktivasi akun, silahkan masukkan kode aktivasi dibawah ini :</td></tr><tr><td style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 30px; line-height: 20px; text-align: center;"> <b>' . $data['kode'] . '</b></td></tr></tbody></table></td><td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td><td width="260" valign="top"><table border="0" cellpadding="0" cellspacing="0"width="100%"><tbody><tr>        <td><img src="' . base_url('assets/email/reg01') . '/right.gif" alt="" width="100%" height="140" style="display: block;"></td></tr>';

        $mailtext .= '<tr><td style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">Setelah mengaktivasi akun, tahap berikutnya adalah login <a href="https://sipp.alhikmah1.or.id"><b>Disini</b></a> dengan akun yang sudah terdaftar untuk melakukan pengisian biodata, pendaftaran sekolah, pendaftaran pondok pesantren, dan melengkapi data-data lain. Silahkan login dengan akun :</td></tr><tr><td style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: left;"><b>ID Pengguna : ' . $data['idppdb'] . '</b><br><b>Kata Sandi : </b><i>(Your Password)</i></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td bgcolor="#365AAD" style="padding: 30px 30px 30px 30px;"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">®Alhikmah1 since 2021<br>Customer Service</td><td align="right" width="25%"><table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;"><a href="https://www.instagram.com/pp.alhikmah1/" style="color: #ffffff;"><img src="' . base_url('assets/email/reg01') . '/ig.gif" alt="Instagram" width="38" height="38" style="display: block;" border="0"></a></td><td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td><td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;"><a href="https://www.facebook.com/ponpesalhikmah1benda/" style="color: #ffffff;"><img src="' . base_url('assets/email/reg01') . '/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0"></a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></body></html>';

        return $mailtext;
    }

    public function daftarWA($data)
    {
        $message = "Halo, " . $data['nama'] . "%0A%0AUsername = *" . $data['idppdb'] . "*%0APassword = _(Password anda)_" . "%0AKode Aktivasi = *" . $data['kode'] . "*";
        $message .= "%0A%0A_Sistem Informasi Pondok Pesantren_%0A@Alhikmah1";
        return urldecode($message);
    }
}
