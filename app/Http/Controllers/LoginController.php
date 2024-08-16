<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\RegisterEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function signin(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);

        $pelanggan = DB::table('ebengkel_new_database.tb_pelanggan')
            ->where('delete_pelanggan', 'N')
            ->where('email_pelanggan', $email)
            ->where('password_pelanggan', $password)
            ->get();

        if ($pelanggan->isEmpty()) {
            return back()->with('alert', 'danger_Your email or password is invalid.')->withInput($request->all());
        } else {
            $data_pelanggan = $pelanggan->first();

            Session::put('id_pelanggan', $data_pelanggan->id_pelanggan);

            $values = [
                'id_pelanggan' => $data_pelanggan->id_pelanggan,
                'tgl_log_pelanggan' => now(),
            ];

            DB::table('tb_log_pelanggan')->insert($values);

            return redirect()->route('beranda');
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'telp' => 'required|string|max:12',
            'email' => 'required|email|max:255|unique:tb_pelanggan,email_pelanggan',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $nama = $request->nama;
        $telp = preg_replace('/\D/', '', $request->telp);
        $email = $request->email;
        $password = md5($request->password);
        $foto = 'logos/avatar.png';

        $pelanggan = DB::table('ebengkel_new_database.tb_pelanggan')
            ->where('delete_pelanggan', 'N')
            ->where(function ($query) use ($email, $telp) {
                $query->where('telp_pelanggan', $telp)
                      ->orWhere('email_pelanggan', $email);
            })
            ->get();

        if ($pelanggan->isEmpty()) {
            $values = [
                'nama_pelanggan' => $nama,
                'telp_pelanggan' => $telp,
                'email_pelanggan' => $email,
                'password_pelanggan' => $password,
                'foto_pelanggan' => $foto,
            ];

            $save = DB::table('tb_pelanggan')->insert($values);

            if ($save) {
                $details = [
                    'nama' => $nama,
                    'telp' => $telp,
                    'email' => $email,
                ];

                $subject = 'Selamat! Akun berhasil dibuat.';
                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->Host = 'mail.ebengkelku.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'support@ebengkelku.com';
                    $mail->Password = 'IXK40i6o3mm*';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port = 465;

                    $mail->SMTPOptions = [
                        'ssl' => [
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true,
                        ],
                    ];

                    $mail->setFrom('support@ebengkelku.com', 'E-BENGKELKU.COM');
                    $mail->addAddress($email);

                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body = view('beranda', ['details' => $details]);

                    $mail->send();
                    $mail->clearAddresses();
                } catch (Exception $e) {
                    echo 'Message could not be sent.';
                    echo $e;
                }
            }

            return back()->with('alert', 'success_Success Register.');
        } else {
            return back()->with('alert', 'danger_Your phone or email is already registered.')->withInput($request->all());
        }
    }

    public function forgot(Request $request)
    {
        $email = $request->email;

        $pelanggan = DB::table('ebengkel_new_database.tb_pelanggan')
            ->where('delete_pelanggan', 'N')
            ->where('email_pelanggan', $email)
            ->get();

        if ($pelanggan->isEmpty()) {
            return back()->with('alert', 'danger_Your email is invalid.')->withInput($request->all());
        } else {
            $data_pelanggan = $pelanggan->first();
            $to_email = $data_pelanggan->email_pelanggan;
            $data = ['id_pelanggan' => $data_pelanggan->id_pelanggan];

            Mail::send('login.email_lupa_password', $data, function ($message) use ($to_email) {
                $message->to($to_email)->subject('Reset Password');
                $message->from('support@ebengkelku.com', 'eBengkelku');
            });

            return back()->with('alert', 'success_Please check your email.');
        }
    }

    public function lupa_password(Request $request)
    {
        $email = $request->query('q_01');
        $password = $request->query('q_02');

        $pelanggan = DB::table('tb_pelanggan')
            ->where('delete_pelanggan', 'N')
            ->whereRaw('md5(email_pelanggan) = ?', [$email])
            ->whereRaw('md5(password_pelanggan) = ?', [$password])
            ->get();

        if ($pelanggan->isEmpty()) {
            return redirect()->route('login');
        } else {
            $data_pelanggan = $pelanggan->first();
            return view('login.lupa_password', compact('id', 'email', 'password'));
        }
    }

    public function reset_password(Request $request)
    {
        $id = $request->pelanggan;
        $password = md5($request->password);

        DB::table('tb_pelanggan')
            ->where('id_pelanggan', $id)
            ->where('delete_pelanggan', 'N')
            ->update(['password_pelanggan' => $password]);

        return back()->with('alert', 'success_Success to change your password.');
    }

    public function logout(Request $request)
    {
        // Hapus sesi dan regenerasi token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Arahkan ke beranda
        return redirect()->route('beranda');
    }
}
