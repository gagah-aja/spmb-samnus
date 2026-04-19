<div class="form-group">
    <label>Kategori</label>
    <select name="kategori_id" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach ($kategoris as $k)
            <option value="{{ $k->id }}"
                {{ old('kategori_id', $berita->kategori_id ?? '') == $k->id ? 'selected' : '' }}>
                {{ $k->nama }}
            </option>
        @endforeach
    </select>
    @error('kategori_id')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label>Judul Berita</label>
    <input type="text" name="judul"
        value="{{ old('judul', $berita->judul ?? '') }}"
        placeholder="Judul berita..." required>
    @error('judul')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label>Gambar Sampul</label>

    <div class="image-upload-wrapper">
        <input type="file" name="gambar" id="gambarInput" accept="image/*" hidden>

        <div class="image-preview" onclick="document.getElementById('gambarInput').click()">
            <img id="previewImage"
                src="{{ isset($berita) && $berita->gambar ? asset('storage/' . $berita->gambar) : 'https://via.placeholder.com/150x120?text=Upload+Image' }}"
                alt="Preview">
            <span class="upload-text">Klik untuk upload</span>
        </div>
    </div>

    @error('gambar')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label>Status</label>
    <select name="status">
        <option value="draft" {{ old('status', $berita->status ?? '') === 'draft' ? 'selected' : '' }}>
            Draft
        </option>
        <option value="published" {{ old('status', $berita->status ?? '') === 'published' ? 'selected' : '' }}>
            Published
        </option>
    </select>
    @error('status')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label>Konten Berita</label>
    <textarea name="konten" rows="8" placeholder="Isi konten berita..." required>{{ old('konten', $berita->konten ?? '') }}</textarea>
    @error('konten')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<!-- STYLE -->
<style>
.image-upload-wrapper {
    display: flex;
}

.image-preview {
    width: 200px;
    height: 140px;
    border: 2px dashed #cbd5e1;
    border-radius: 12px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    overflow: hidden;
    background: #f8fafc;
    transition: 0.3s;
    position: relative;
}

.image-preview:hover {
    border-color: #3b82f6;
    background: #eef6ff;
}

.image-preview img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.upload-text {
    position: absolute;
    bottom: 5px;
    font-size: 12px;
    background: rgba(0,0,0,0.5);
    color: white;
    padding: 2px 6px;
    border-radius: 6px;
}
</style>

<!-- SCRIPT -->
<script>
    const input = document.getElementById('gambarInput');
    const preview = document.getElementById('previewImage');

    input.addEventListener('change', function () {
        const file = this.files[0];

        if (file) {
            // validasi gambar
            if (!file.type.startsWith('image/')) {
                alert('File harus gambar!');
                return;
            }

            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            }

            reader.readAsDataURL(file);
        }
    });
</script>