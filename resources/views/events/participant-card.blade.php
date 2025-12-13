<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kartu Peserta - {{ $registration->stand_number }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
        }
        .card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #667eea;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #667eea;
            font-size: 28px;
            margin-bottom: 5px;
        }
        .header p {
            color: #666;
            font-size: 14px;
        }
        .stand-number {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            text-align: center;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 25px;
        }
        .stand-number h2 {
            font-size: 16px;
            margin-bottom: 10px;
            opacity: 0.9;
        }
        .stand-number .number {
            font-size: 72px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .info-section {
            margin-bottom: 25px;
        }
        .info-section h3 {
            color: #667eea;
            font-size: 16px;
            margin-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 8px;
        }
        .info-row {
            display: table;
            width: 100%;
            margin-bottom: 10px;
        }
        .info-label {
            display: table-cell;
            width: 35%;
            color: #666;
            font-size: 13px;
            padding: 5px 0;
        }
        .info-value {
            display: table-cell;
            width: 65%;
            font-weight: bold;
            font-size: 13px;
            padding: 5px 0;
        }
        .qr-section {
            text-align: center;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            margin-top: 25px;
        }
        .qr-section img {
            width: 150px;
            height: 150px;
            margin-bottom: 10px;
        }
        .qr-section p {
            font-size: 11px;
            color: #666;
        }
        .footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 2px dashed #ddd;
            color: #999;
            font-size: 11px;
        }
        .badge {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="card">
        <!-- Header -->
        <div class="header">
            <h1>KARTU PESERTA EVENT</h1>
            <p>PROVENDA - Promosi Event Daerah</p>
        </div>

        <!-- Stand Number -->
        <div class="stand-number">
            <h2>NOMOR STAND ANDA</h2>
            <div class="number">{{ $registration->stand_number }}</div>
        </div>

        <!-- Event Info -->
        <div class="info-section">
            <h3>Informasi Event</h3>
            <div class="info-row">
                <div class="info-label">Nama Event:</div>
                <div class="info-value">{{ $registration->event->nama_event }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tanggal:</div>
                <div class="info-value">{{ \Carbon\Carbon::parse($registration->event->tanggal_event)->format('d F Y, H:i') }} WIB</div>
            </div>
            <div class="info-row">
                <div class="info-label">Lokasi:</div>
                <div class="info-value">{{ $registration->event->lokasi }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Kategori:</div>
                <div class="info-value">
                    <span class="badge">{{ $registration->event->kategori ?? 'Umum' }}</span>
                </div>
            </div>
        </div>

        <!-- UMKM Info -->
        <div class="info-section">
            <h3>Data UMKM</h3>
            <div class="info-row">
                <div class="info-label">Nama UMKM:</div>
                <div class="info-value">{{ $registration->nama_umkm }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Pemilik:</div>
                <div class="info-value">{{ $registration->pemilik }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Kategori:</div>
                <div class="info-value">{{ ucfirst($registration->kategori) }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">No WhatsApp:</div>
                <div class="info-value">{{ $registration->no_wa }}</div>
            </div>
        </div>

        <!-- QR Code -->
        <div class="qr-section">
            <img src="data:image/png;base64,{{ $qrCodeBase64 }}" alt="QR Code">
            <p>Scan QR Code ini saat check-in di lokasi event</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Kartu ini adalah bukti pendaftaran resmi. Harap dibawa saat datang ke event.</p>
            <p>Dicetak pada: {{ now()->format('d F Y, H:i') }} WIB</p>
        </div>
    </div>
</body>
</html>