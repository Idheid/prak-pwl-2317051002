<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Profil Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
    :root {
        --background: #fff0f6;         /* pink muda untuk background */
        --foreground: #4a154b;         /* ungu tua lembut untuk teks */
        --card: #ffffff;               /* putih untuk kartu */
        --card-foreground: #d63384;    /* pink medium */
        --primary: #f78fb3;            /* pink soft */
        --primary-foreground: #ffffff; /* putih */
        --secondary: #f3a6c8;          /* pink pastel */
        --muted: #f8d7e2;              /* pink sangat muda */
        --muted-foreground: #a05278;   /* ungu lembut */
        --border: #f5c2d6;             /* border pink */
        --ring: #f78fb3;
        --radius: 0.75rem;
    }

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #fff0f6 0%, #ffe6f0 100%);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
        color: var(--foreground);
    }

    .profile-card {
        background: var(--card);
        border-radius: var(--radius);
        box-shadow: 0 20px 25px -5px rgba(255, 105, 180, 0.15), 
                    0 10px 10px -5px rgba(255, 182, 193, 0.1);
        border: 1px solid var(--border);
        overflow: hidden;
        width: 100%;
        max-width: 600px;
    }

    .card-header {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .card-title {
        color: var(--primary-foreground);
        font-size: 24px;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
        letter-spacing: 1px;
    }

    .profile-content {
        padding: 32px;
        display: grid;
        grid-template-columns: 150px 1fr;
        gap: 20px;
        align-items: start;
    }

    .profile-image {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid var(--primary);
        object-fit: cover;
        box-shadow: 0 8px 20px rgba(255, 105, 180, 0.25);
        background: var(--muted);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        color: var(--muted-foreground);
    }

    .info-item {
        background: linear-gradient(135deg,#fff7fa 0%,#ffeaf2 100%);
        border: 2px solid var(--border);
        border-radius: calc(var(--radius) - 0.25rem);
        padding: 20px;
        transition: all .3s ease;
        position: relative;
        overflow: hidden;
        margin-bottom: 12px;
    }
    .info-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(255, 105, 180, 0.25);
        border-color: var(--primary);
    }

    .info-label {
        font-size: 14px;
        font-weight: 600;
        color: var(--primary);
        text-transform: uppercase;
        letter-spacing: .5px;
        margin-bottom: 8px;
        display: block;
    }
    .info-value {
        font-size: 18px;
        font-weight: 600;
        color: var(--foreground);
        font-family: 'Playfair Display', serif;
    }
    </style>
</head>
<body>
    <div class="profile-card">
        <div class="card-header">
            <h1 class="card-title">Kartu Profil Mahasiswa</h1>
        </div>

        <div class="profile-content">
            <!-- Foto + Upload -->
            <div class="photo-section">
                @if (!empty($foto))
                    <img src="{{ asset('storage/' . $foto) }}" class="profile-image" alt="Foto Profil">
                @else
                    <div class="profile-image">📷</div>
                @endif
                <span class="photo-label">Foto Profil</span>

                <form action="{{ route('upload-foto') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="foto" accept="image/*" required>
                    <button type="submit">Upload</button>
                </form>
            </div>

            <!-- Biodata -->
            <div class="info-section">
                <div class="info-item">
                    <span class="info-label">Nama</span>
                    <span class="info-value">{{ $nama ?? 'Nama Mahasiswa' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Kelas</span>
                    <span class="info-value">{{ $kelas ?? 'Kelas' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">NPM</span>
                    <span class="info-value">{{ $npm ?? 'NPM' }}</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
