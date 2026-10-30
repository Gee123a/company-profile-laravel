<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="id">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Official Engineering Quotation - PT Elnusa Puspita Pratama</title>
    <style type="text/css">
        /* Client-specific resets */
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; border: 0; outline: none; text-decoration: none; }
        table { border-collapse: collapse !important; }
        body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; background-color: #f4f6f8; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; color: #1e293b; }

        /* Typography & Utility */
        .mono { font-family: ui-monospace, 'SF Mono', SFMono-Regular, Menlo, Monaco, Consolas, monospace; }
        .spec-label { font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.08em; }
        .spec-value { font-size: 14px; font-weight: 700; color: #0f172a; line-height: 1.4; }

        @media only screen and (max-width: 640px) {
            .mobile-full { width: 100% !important; max-width: 100% !important; }
            .mobile-p-20 { padding: 24px 20px !important; }
            .mobile-stack { display: block !important; width: 100% !important; }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f6f8;">

    {{-- Wrapper Container --}}
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f4f6f8; table-layout: fixed;">
        <tr>
            <td align="center" style="padding: 40px 16px 50px 16px;">

                {{-- Main Document Card --}}
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 640px; background-color: #ffffff; border-radius: 12px; overflow: hidden; border: 1px solid #e2e8f0; box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);" class="mobile-full">

                    {{-- Top Brand Accent Bar --}}
                    <tr>
                        <td height="4" style="background: linear-gradient(90deg, #059669 0%, #10b981 50%, #0284c7 100%); line-height: 4px; font-size: 4px;">&nbsp;</td>
                    </tr>

                    {{-- Masthead Header --}}
                    <tr>
                        <td style="background-color: #0f172a; padding: 36px 36px 32px 36px;" class="mobile-p-20">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td>
                                        <div style="font-size: 10px; font-weight: 800; color: #10b981; letter-spacing: 0.15em; text-transform: uppercase; margin-bottom: 8px;">
                                            Departemen Engineering & Estimasi Biaya
                                        </div>
                                        <h1 style="margin: 0; font-size: 22px; font-weight: 800; color: #ffffff; letter-spacing: -0.02em; line-height: 1.2;">
                                            PT ELNUSA PUSPITA PRATAMA
                                        </h1>
                                        <p style="margin: 6px 0 0 0; font-size: 12px; color: #94a3b8; font-weight: 400; line-height: 1.5;">
                                            General Contractor &bull; Civil Construction &bull; MEP Engineering
                                        </p>
                                    </td>
                                    <td align="right" valign="top" style="width: 140px;">
                                        <div style="background-color: #1e293b; border: 1px solid #334155; border-radius: 8px; padding: 8px 12px; text-align: right;">
                                            <div class="mono" style="font-size: 9px; font-weight: 600; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em;">Dokumen Resmi</div>
                                            <div class="mono" style="font-size: 12px; font-weight: 700; color: #38bdf8; margin-top: 2px;">
                                                QUO-{{ str_pad($inquiry->id, 5, '0', STR_PAD_LEFT) }}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Document Meta Strip --}}
                    <tr>
                        <td style="background-color: #f8fafc; border-bottom: 1px solid #e2e8f0; padding: 14px 36px;" class="mobile-p-20">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="font-size: 12px; color: #64748b;">
                                        <strong>Tanggal Pengajuan:</strong> {{ $inquiry->created_at ? $inquiry->created_at->format('d F Y, H:i') : date('d F Y, H:i') }} WIB
                                    </td>
                                    <td align="right" style="font-size: 12px; color: #059669; font-weight: 700;">
                                        &bull; Status: Estimasi Awal
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Body Content --}}
                    <tr>
                        <td style="padding: 36px;" class="mobile-p-20">

                            {{-- Salutation --}}
                            <p style="margin: 0 0 16px 0; font-size: 15px; line-height: 1.6; color: #334155;">
                                Kepada Yth. Bpk/Ibu <strong style="color: #0f172a;">{{ $inquiry->name }}</strong>,
                            </p>
                            <p style="margin: 0 0 28px 0; font-size: 14px; line-height: 1.6; color: #475569;">
                                Terima kasih atas kepercayaan Anda kepada PT Elnusa Puspita Pratama. Berdasarkan rincian kebutuhan teknis yang Anda ajukan melalui portal web resmi kami, berikut adalah ikhtisar spesifikasi dokumen penawaran awal:
                            </p>

                            {{-- Table: 3 Data Points Specifications --}}
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden; margin-bottom: 28px;">
                                <tr style="background-color: #f1f5f9;">
                                    <th align="left" style="padding: 12px 18px; font-size: 11px; font-weight: 800; color: #334155; text-transform: uppercase; letter-spacing: 0.08em; border-bottom: 1px solid #cbd5e1; width: 35%;">Parameter Kebutuhan</th>
                                    <th align="left" style="padding: 12px 18px; font-size: 11px; font-weight: 800; color: #334155; text-transform: uppercase; letter-spacing: 0.08em; border-bottom: 1px solid #cbd5e1;">Spesifikasi Proyek (3 Data Kebutuhan)</th>
                                </tr>

                                {{-- DATA 1: Layanan --}}
                                <tr>
                                    <td style="padding: 14px 18px; border-bottom: 1px solid #e2e8f0; background-color: #ffffff; vertical-align: top;">
                                        <div class="spec-label">1. Kategori Layanan</div>
                                        <div style="font-size: 11px; color: #94a3b8; margin-top: 2px;">Service Scope</div>
                                    </td>
                                    <td style="padding: 14px 18px; border-bottom: 1px solid #e2e8f0; background-color: #ffffff; vertical-align: top;">
                                        <span style="display: inline-block; background-color: #ecfdf5; color: #047857; border: 1px solid #a7f3d0; font-size: 13px; font-weight: 700; padding: 3px 10px; border-radius: 6px;">
                                            {{ $inquiry->service_type ?? 'Konstruksi Bangunan Sipil & Komersial' }}
                                        </span>
                                    </td>
                                </tr>

                                {{-- DATA 2: Skala Proyek & Anggaran --}}
                                <tr>
                                    <td style="padding: 14px 18px; border-bottom: 1px solid #e2e8f0; background-color: #f8fafc; vertical-align: top;">
                                        <div class="spec-label">2. Skala & Anggaran</div>
                                        <div style="font-size: 11px; color: #94a3b8; margin-top: 2px;">Budget Estimation</div>
                                    </td>
                                    <td style="padding: 14px 18px; border-bottom: 1px solid #e2e8f0; background-color: #f8fafc; vertical-align: top;">
                                        <div class="spec-value" style="color: #0f172a;">
                                            {{ $inquiry->project_scale ?? 'Skala Menengah (Rp 500 Juta - Rp 2 Miliar)' }}
                                        </div>
                                    </td>
                                </tr>

                                {{-- DATA 3: Target Timeline Pengerjaan --}}
                                <tr>
                                    <td style="padding: 14px 18px; background-color: #ffffff; vertical-align: top;">
                                        <div class="spec-label">3. Target Timeline</div>
                                        <div style="font-size: 11px; color: #94a3b8; margin-top: 2px;">Duration Window</div>
                                    </td>
                                    <td style="padding: 14px 18px; background-color: #ffffff; vertical-align: top;">
                                        <div class="spec-value" style="color: #0369a1;">
                                            {{ $inquiry->timeline ?? 'Standar Operasional (3 - 6 Bulan)' }}
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            {{-- Project Description Box --}}
                            <div style="font-size: 11px; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 8px;">
                                Catatan Spesifikasi dari Klien:
                            </div>
                            <div style="background-color: #f8fafc; border: 1px solid #e2e8f0; border-left: 4px solid #059669; border-radius: 0 8px 8px 0; padding: 16px 20px; font-size: 13px; color: #334155; line-height: 1.6; margin-bottom: 30px;">
                                "{{ $inquiry->message }}"
                            </div>

                            {{-- Next Steps Pipeline --}}
                            <div style="font-size: 11px; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 14px;">
                                Tahapan Selanjutnya (Engineering Workflow):
                            </div>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 28px;">
                                <tr>
                                    <td style="padding: 10px 0; border-bottom: 1px dashed #e2e8f0;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td valign="top" style="width: 26px;">
                                                    <div style="width: 20px; height: 20px; background-color: #0f172a; color: #ffffff; border-radius: 50%; text-align: center; font-size: 11px; font-weight: 700; line-height: 20px;">1</div>
                                                </td>
                                                <td style="font-size: 13px; color: #334155; line-height: 1.5;">
                                                    <strong>Kajian Dokumen Teknis:</strong> Tim estimator menghitung volume material, peralatan, dan tenaga ahli.
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0; border-bottom: 1px dashed #e2e8f0;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td valign="top" style="width: 26px;">
                                                    <div style="width: 20px; height: 20px; background-color: #0f172a; color: #ffffff; border-radius: 50%; text-align: center; font-size: 11px; font-weight: 700; line-height: 20px;">2</div>
                                                </td>
                                                <td style="font-size: 13px; color: #334155; line-height: 1.5;">
                                                    <strong>Koordinasi & Site Survey:</strong> Penjadwalan verifikasi kontur tanah dan akses logistik ke lokasi.
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td valign="top" style="width: 26px;">
                                                    <div style="width: 20px; height: 20px; background-color: #059669; color: #ffffff; border-radius: 50%; text-align: center; font-size: 11px; font-weight: 700; line-height: 20px;">3</div>
                                                </td>
                                                <td style="font-size: 13px; color: #334155; line-height: 1.5;">
                                                    <strong>Penerbitan RAB Definitif:</strong> Penyerahan dokumen kontrak kerja sama dan kurva S pengerjaan proyek.
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            {{-- Notice box --}}
                            <div style="background-color: #f1f5f9; border-radius: 8px; padding: 14px 18px; font-size: 12px; color: #64748b; line-height: 1.5;">
                                Apabila Anda memerlukan penyesuaian spesifikasi atau konsultasi mendesak, silakan langsung membalas (reply) email ini.
                            </div>

                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="background-color: #0f172a; padding: 28px 36px; border-top: 1px solid #1e293b;" class="mobile-p-20">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #94a3b8; font-size: 12px; line-height: 1.6;">
                                        <strong style="color: #ffffff;">PT Elnusa Puspita Pratama</strong><br />
                                        Jalan Manyar Kertoadi No. 93, Surabaya, Jawa Timur, Indonesia<br />
                                        Kontak: <a href="mailto:ivan@uccca.site" style="color: #38bdf8; text-decoration: none;">ivan@uccca.site</a> &bull; Web: <a href="https://epp.uccca.site" style="color: #38bdf8; text-decoration: none;">epp.uccca.site</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 16px; border-top: 1px solid #1e293b; margin-top: 16px;">
                                        <div class="mono" style="font-size: 10px; color: #64748b; line-height: 1.4;">
                                            Sistem Email Otomatis Komputasi Awan (Purelymail SMTP &bull; Domain uccca.site) &bull; Cloud Computing Project
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
                {{-- End Document Card --}}

            </td>
        </tr>
    </table>

</body>
</html>
