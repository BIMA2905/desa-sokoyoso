<?php
use App\Models\PengajuanLayanan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class PengajuanLayananController extends Controller
{
    public function store(Request $request)
    {
        $request->merge([
            'jenis_layanan' => strtolower(
                (string) $request->input('jenis_layanan')
            ),
        ]);

        $data = $request->validate([
            'jenis_layanan' => [
                'required',
                Rule::in(['domisili', 'usaha', 'pengaduan']),
            ],

            'nama' => ['required', 'string', 'max:255'],
            'nik' => ['nullable', 'digits:16'],
            'no_hp' => ['required', 'string', 'max:20'],
            'alamat' => ['nullable', 'string', 'max:2000'],

            'nama_usaha' => [
                'required_if:jenis_layanan,usaha',
                'nullable', 'string', 'max:255'
            ],
            'alamat_usaha' => [
                'required_if:jenis_layanan,usaha',
                'nullable', 'string', 'max:2000'
            ],
            'jenis_usaha' => [
                'required_if:jenis_layanan,usaha',
                'nullable', 'string', 'max:255'
            ],

            'judul_pengaduan' => [
                'required_if:jenis_layanan,pengaduan',
                'nullable', 'string', 'max:255'
            ],
            'isi_pengaduan' => [
                'required_if:jenis_layanan,pengaduan',
                'nullable', 'string', 'max:5000'
            ],

            'keperluan' => [
                'required_if:jenis_layanan,domisili',
                'nullable', 'string', 'max:2000'
            ],
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'nik.digits' => 'NIK harus terdiri dari 16 angka.',
            'nama_usaha.required_if' => 'Nama usaha wajib diisi.',
            'alamat_usaha.required_if' => 'Alamat usaha wajib diisi.',
            'jenis_usaha.required_if' => 'Jenis usaha wajib diisi.',
            'judul_pengaduan.required_if' => 'Judul pengaduan wajib diisi.',
            'isi_pengaduan.required_if' => 'Detail pengaduan wajib diisi.',
            'keperluan.required_if' => 'Keperluan pengajuan wajib diisi.',
        ]);

        $data['status'] = 'Menunggu';

        PengajuanLayanan::create($data);

        return redirect()
            ->back()
            ->with('success', 'Pengajuan berhasil dikirim. Silakan tunggu proses dari petugas desa.');
    }
}

