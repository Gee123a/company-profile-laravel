<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Official Quotation - PT Elnusa Puspita Pratama</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f1f5f9;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: #0f172a;
        }
        .container {
            max-width: 640px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.06);
            border: 1px solid #e2e8f0;
        }
        .header {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            padding: 36px 32px;
            color: #ffffff;
            text-align: center;
        }
        .header .badge {
            display: inline-block;
            background: rgba(16, 185, 129, 0.15);
            color: #10b981;
            border: 1px solid rgba(16, 185, 129, 0.3);
            padding: 4px 12px;
            border-radius: 9999px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            letter-spacing: -0.5px;
        }
        .header p {
            margin: 8px 0 0;
            color: #94a3b8;
            font-size: 13px;
        }
        .content {
            padding: 32px;
        }
        .greeting {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 24px;
        }
        .quotation-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px 24px;
            margin-bottom: 24px;
        }
        .quotation-id {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
            font-size: 12px;
            color: #64748b;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 1px dashed #cbd5e1;
            display: flex;
            justify-content: space-between;
        }
        .data-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
        }
        .data-row:last-child {
            border-bottom: none;
        }
        .data-label {
            color: #64748b;
            font-weight: 500;
        }
        .data-value {
            font-weight: 700;
            color: #0f172a;
            text-align: right;
        }
        .highlight-badge {
            background: #ecfdf5;
            color: #047857;
            padding: 2px 8px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
        }
        .notes-box {
            background: #f1f5f9;
            border-left: 4px solid #10b981;
            padding: 14px 18px;
            border-radius: 0 8px 8px 0;
            font-size: 13px;
            color: #334155;
            line-height: 1.6;
            margin-bottom: 24px;
        }
        .cta-box {
            text-align: center;
            padding: 24px 0 12px;
        }
        .btn {
            display: inline-block;
            background: #10b981;
            color: #042f2e;
            text-decoration: none;
            font-weight: 700;
            padding: 14px 28px;
            border-radius: 10px;
            font-size: 14px;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.25);
        }
        .footer {
            background: #0f172a;
            padding: 24px 32px;
            text-align: center;
            color: #64748b;
            font-size: 12px;
            line-height: 1.6;
        }
        .footer a {
            color: #10b981;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        {{-- Header --}}
        <div class="header">
            <span class="badge">Official Engineering Quotation</span>
            <h1>PT Elnusa Puspita Pratama</h1>
            <p>General Contractor, Civil Engineering & Project Management</p>
        </div>

        {{-- Main Body --}}
        <div class="content">
            <p class="greeting">
                Yth. Bpk/Ibu <strong>{{ $inquiry->name }}</strong>,<br>
                Terima kasih telah menghubungi <strong>PT Elnusa Puspita Pratama</strong>. Berikut kami lampirkan rincian estimasi quotation awal berdasarkan kebutuhan spesifikasi proyek yang Anda ajukan:
            </p>

            {{-- 3 Data Points Card --}}
            <div class="quotation-card">
                <div class="quotation-id">
                    <span><strong>REF:</strong> QUO-{{ str_pad($inquiry->id, 5, '0', STR_PAD_LEFT) }}</span>
                    <span><strong>TANGGAL:</strong> {{ $inquiry->created_at ? $inquiry->created_at->format('d M Y, H:i') : date('d M Y, H:i') }} WIB</span>
                </div>

                <div class="data-row">
                    <span class="data-label">Nama Klien / Instansi</span>
                    <span class="data-value">{{ $inquiry->name }}</span>
                </div>

                <div class="data-row">
                    <span class="data-label">Email Pemohon</span>
                    <span class="data-value">{{ $inquiry->email }}</span>
                </div>

                {{-- DATA 1: Layanan --}}
                <div class="data-row">
                    <span class="data-label">1. Kebutuhan Layanan (Service)</span>
                    <span class="data-value highlight-badge">{{ $inquiry->service_type ?? 'Konstruksi Bangunan Sipil' }}</span>
                </div>

                {{-- DATA 2: Skala Proyek / Anggaran --}}
                <div class="data-row">
                    <span class="data-label">2. Skala & Estimasi Anggaran</span>
                    <span class="data-value">{{ $inquiry->project_scale ?? 'Skala Menengah (Rp 500 Juta - Rp 2 Miliar)' }}</span>
                </div>

                {{-- DATA 3: Durasi Pengerjaan / Scope --}}
                <div class="data-row">
                    <span class="data-label">3. Target Timeline Pengerjaan</span>
                    <span class="data-value">{{ $inquiry->timeline ?? 'Standar (3 - 6 Bulan)' }}</span>
                </div>
            </div>

            {{-- Message / Requirement Notes --}}
            <div style="font-size: 13px; font-weight: 700; color: #475569; margin-bottom: 8px; text-transform: uppercase;">
                Catatan Kebutuhan Proyek:
            </div>
            <div class="notes-box">
                "{{ $inquiry->message }}"
            </div>

            <p style="font-size: 13px; color: #64748b; line-height: 1.6;">
                Tim Engineering & Project Estimation kami sedang meninjau dokumen teknis dan akan menghubungi Anda dalam kurun waktu 1x24 jam kerja untuk penjadwalan survey lokasi serta pembahasan Rencana Anggaran Biaya (RAB) definitif.
            </p>

            <div class="cta-box">
                <a href="https://wa.me/628811812904?text={{ urlencode('Halo PT Elnusa Puspita Pratama, saya ingin konsultasi mengenai Quotation Ref: QUO-' . str_pad($inquiry->id, 5, '0', STR_PAD_LEFT)) }}" class="btn">
                    Hubungi Tim Engineering (WhatsApp)
                </a>
            </div>
        </div>

        {{-- Footer --}}
        <div class="footer">
            <strong>PT Elnusa Puspita Pratama</strong><br>
            Jalan Manyar Kertoadi No. 93, Surabaya, Jawa Timur, Indonesia<br>
            Telepon: +62 88 1181 2904 &bull; Email: <a href="mailto:ivan@uccca.site">ivan@uccca.site</a><br>
            <span style="font-size: 11px; color: #475569; display: block; margin-top: 8px;">
                Terkirim otomatis melalui Cloud Mail Server Purelymail (uccca.site) untuk pemenuhan tugas Cloud Computing.
            </span>
        </div>
    </div>
</body>
</html>
