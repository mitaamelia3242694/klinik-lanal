@extends('main')

@section('title', 'Tambah Data Pasien - Klinik')

@section('content')
<section class="blank-content">
        <h3>Tambah Resep</h3>
        <form class="form-pasien">
          <div class="form-grid">
            <div>
              <label>Nama Dokter</label>
              <input type="text" name="nama_dokter" required />
            </div>
            <div>
              <label>Ruang Tinjauan</label>
              <input type="text" name="ruang_tinjauan" required />
            </div>
            <div>
              <label>Status Obat</label>
              <select name="status_obat" required>
                <option value="">-- Pilih Status --</option>
                <option value="Racikan">Racikan</option>
                <option value="Non Racikan">Non Racikan</option>
              </select>
            </div>
            <div>
              <label>Nama Obat</label>
              <input type="text" name="nama_obat" required />
            </div>
            <div>
              <label>Jumlah</label>
              <input type="number" name="jumlah" required />
            </div>
            <div>
              <label>Dosis / Signa</label>
              <input type="text" name="signa" required placeholder="misal: 3x1, 2x sehari" />
            </div>
            <div>
              <label>Aturan Pakai</label>
              <input type="text" name="aturan_pakai" placeholder="Setelah makan, sebelum tidur, dll" />
            </div>
            <div>
              <label>Harga</label>
              <input type="number" name="harga" />
            </div>
            <div>
              <label>Embalase</label>
              <input type="number" name="embalase" placeholder="Biaya pengemasan" />
            </div>
            <div>
              <label>Indikasi Obat</label>
              <textarea name="indikasi" rows="3"></textarea>
            </div>
            <div>
              <label>Keterangan</label>
              <textarea name="keterangan" rows="3"></textarea>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-warning">Reset</button>
          </div>
        </form>
      </section>

<style>
.form-pasien {
  background: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0,0,0,0.05);
  max-width: 1000px;
  margin: 0 auto;
}

.blank-content h3 {
  text-align: left;
  margin-bottom: 25px;
  font-size: 20px;
  color: #333;
}

.form-pasien label {
  font-weight: 600;
  margin-bottom: 6px;
  display: block;
  text-align: left;
}

.form-pasien input, 
.form-pasien select,
.form-pasien textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border-radius: 5px;
  border: 1px solid #ccc;
  font-size: 14px;
  box-sizing: border-box;
}

.form-pasien .form-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

.form-pasien .form-actions {
  margin-top: 30px;
  text-align: left;
}

.btn {
  padding: 10px 18px;
  border: none;
  border-radius: 6px;
  font-size: 14px;
  cursor: pointer;
  margin-right: 10px;
}

.btn-primary {
  background-color: #007bff;
  color: white;
}

.btn-warning {
  background-color: #ffc107;
  color: black;
}
</style>
@endsection
