1. Halaman Login

Pada halaman login, user akan diminta untuk menginput username dan
password, apabila password/username salah, maka akan ada error message
yang dibuat dengan cara men-set $_SESSION['errors']

selain itu, SQL injection juga sudah ditangani dengan menggunakan
PDO prepared statement.

Validasi login digunakan dengan javascript, apabila ada field yang kosong
maka alert akan muncul

Dari segi backend, variabel $_SESSION['role'] juga di-set guna membedakan
priviledge yang dimiliki masing-masing role, lebih lengkap akan dibahas di
home.

Selain itu ada juga link yang mengarah kepada halaman register.

2. Register

Pada halaman register, user yang ingin mendaftar akan diminta untuk menginput
email, role, password dan confirm password.

Validasi juga menggunakan javascript seperti pada login.

Register juga menggunakan variabel $_SESSION['errors'] untuk memberikan
pesan error apabila password dan confirm password tidak sama.
Selain itu, apabila email telah terdaftar sebelumnya, maka akan diberi
error message juga.

3. Home

Halaman home bergantung pada $_SESSION['role']
apabila role sebagai admin maka tombol add student akan di echo, selain itu tidak.

apabila role sebagai kasir maka tombol delete (untuk delete movie) tidak akan di echo
tombol delete jika diklik akan menampilkan konfirmasi, jika ya maka data movie yang terpilih akan
dihapus dari database.

pada navbar ada 3 tombol, home (yang akan me redirect pada home), profile, dan logout

tombol profile jika diklik akan mengeluarkan modal yang menampilkan Coder's Profile
tombol logout apabila diklik akan menanyakan konfirmasi logout, jika ya maka akan logout(session_destroy())

tombol mata(view) akan me redirect user ke halaman details, view memiliki value id dari movie
pada barisnya, yang akan digunakan pada halaman details.

4. Details

Halaman detail menampilkan detail movie berdasarkan id yang dipilih di home
Jika $_SESSION['role'] adalah admin maka akan terdapat tombol edit

5. Edit

Tombol edit menampilkan data lengkap mengenai movie, dan field movie_id di disabled agar tidak dapat diganti
selain movie_id, data dapat diubah. Data poster optional, boleh diubah boleh tidak

6. Add movie

Mirip seperti edit, namun menampilkan form kosong, ada validasi apabila ada field yang tidak diisi.
ada juga validasi yang dilakukan untuk tipe file yang diterima (png, jpg, jpeg), selain itu maka
akan muncul alert