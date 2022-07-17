<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Ahli Ukur Kapal</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Daftar Marine Inspector</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<<<<<<< HEAD
  <form id="form_register" name="form_register" method="POST" action="./scripts/action_page.php" enctype="multipart/form-data">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
=======
<form id="form_register" name="form_register" method="POST" action="./scripts/action_page.php" enctype="multipart/form-data">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"><span style="color:red;">*</span>) Semua field wajib diisi</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>ID Registrasi</label>
                <input type="text" class="form-control" name="dis_no_urut" id="dis_no_urut" disabled value="<?php echo generate_reg_ID();?>" placeholder="No. Marine Inspector">
                <input type="hidden" name="no_urut" id="no_urut" value="<?php echo generate_reg_ID();?>">
                <small id="note" class="form-text text-muted"> <!-- #2 -->
                  <strong>No. Urut</strong> pendaftaran. Di generate secara <i><span style="color:red">otomatis</span></i> oleh sistem
                </small>
              </div>
              <div class="form-group">
                <label>Nama Lengkap <span style="color:red">*</span></label>
                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" pattern="^[A-Za-z \s*]+$" placeholder="Nama Lengkap" required>
              </div>
              <div class="form-group">
                <label>NIP <span style="color:red">*</span></label>
                <input type="text" class="form-control" name="txt_NIP" id="txt_NIP" placeholder="No. Induk Pegawai" required>
              </div>
              <div class="form-group">
                <label>Email <span style="color:red">*</span></label>
                <input type="text" class="form-control" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Alamat Email" required>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Password <span style="color:red">*</span></label>
                    <input type="password" class="form-control" name="password" id="password" pattern=".{4,}" title="Four or more characters" placeholder="Ketikan Password" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Retype Password <span style="color:red">*</span></label>
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" pattern=".{4,}" title="Four or more characters" placeholder="Ketikan Ulang Password" required>
                  </div>
                </div>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">&nbsp;</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Jenis Kelamin <span style="color:red">*</span>)</label>
                <select class="form-control select2bs4" name="kelamin" id="kelamin" style="width: 100%;">
                  <option>Laki-laki</option>
                  <option>Perempuan</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Tempat Lahir <span style="color:red">*</span>)</label>
                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="Bandung" placeholder="Tempat Kelahiran" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <!-- Date -->
              <div class="form-group">
                <label>Tanggal Lahir <span style="color:red">*</span>)</label></label>
                <div class="input-group date">
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="MM/DD/YYYY" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>No HP <span style="color:red">*</span>)</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                  </div>
                  <input type="text" name="no_telp" id="no_telp" class="form-control phone_number_3" value="" placeholder="+62-9999999999" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">&nbsp;</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>METODE PENGUKURAN <span style="color:red">*</span>)</label>
                <select class="form-control select2bs4" name="tipe_auk" id="tipe_auk" style="width: 100%;">
                  <option value="1">Metode Pengukuran Khusus</option>
                  <option value="2">Metode Pengukuran Dalam Negeri</option>
                  <option value="3">Metode Pengukuran Luar Negeri</option>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>No Elektrik MI/KODE AUK <span style="color:red">*</span>)</label>
                <input type="text" class="form-control" name="dis_kode_auk" id="dis_kode_auk" disabled placeholder="Nomer Elektrik MI">
                <input type="hidden" name="kode_auk" id="kode_auk" value="">
              </div>
            </div>
            <!-- /.col -->
          </div>
          <div class="row">
            <div class="col-md-6">
              <!-- Date -->
              <div class="form-group">
                <label>Tanggal Periksa <span style="color:red">*</span>)</label></label>
                <div class="input-group date">
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input type="date" class="form-control" id="tgl_periksa" name="tgl_periksa" placeholder="MM/DD/YYYY" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Diperiksa dan disetujui oleh <span style="color:red">*</span>)</label>
                <input type="text" class="form-control" name="nama_pemeriksa" id="nama_pemeriksa" value="Pak Bambang" placeholder="Diperiksa dan disetujui oleh" required>
              </div>
              <!-- /.form-group -->
            </div>
          </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Foto Diri <span style="color:red">*</span>)</label>
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <input type="file" id="myFile1" name="myFile1" accept="image/x-png,image/gif,image/jpeg" />
                </div>
             </div>
             <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                      <label>CV - Curiculum Vitae <span style="color:red">*</span>)</label>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <input type="file" id="myFile2" name="myFile2" accept="image/x-png,image/gif,image/jpeg" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Surat Tanda Tamat Pendidikan dan Pelatihan <span style="color:red">*</span>)</label>
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <input type="file" id="myFile3" name="myFile3" accept="image/x-png,image/gif,image/jpeg" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Lembar Pengukuhan <span style="color:red">*</span>)</label>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <input type="file" id="myFile4" name="myFile4" accept="image/x-png,image/gif,image/jpeg" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ijazah Formal <span style="color:red">*</span>)</label>
                        <small id="note" class="form-text text-muted"> <!-- #2 -->
                          (MI <strong>tipe A</strong> minimal ijazah pelaut ANT/ATT II atau S1 Teknik Perkapalan)<br>
                          (MI <strong>tipe B</strong> minimal ijazah pelaut ANT/ATT III atau D3 Teknik Perkapalan)
                        </small>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <input type="file" id="myFile5" name="myFile5" accept="image/x-png,image/gif,image/jpeg" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ijazah Formal Lainnya (<i>Optional</i>)</label>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <input type="file" id="myFile6" name="myFile6" accept="image/x-png,image/gif,image/jpeg" />
                </div>
            </div>
            <!-- /.card-body -->
        </div>
      </div>
        <!-- /.card -->
>>>>>>> 6a9184ed2d09ef4b1e22deef2b21004a7c31cbff
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"><span style="color:red;">*</span>) Semua field wajib diisi</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
<<<<<<< HEAD
              <div class="col-md-12">
                <div class="form-group">
                  <label>ID Registrasi</label>
                  <input type="text" class="form-control" name="dis_no_urut" id="dis_no_urut" disabled value="<?php echo $conn->get_newid();?>" placeholder="No. Marine Inspector">
                  <input type="hidden" name="no_urut" id="no_urut" value="<?php echo $conn->get_newid();?>">
                  <small id="note" class="form-text text-muted"> <!-- #2 -->
                    <strong>No. Urut</strong> pendaftaran. Di generate secara <i><span style="color:red">otomatis</span></i> oleh sistem
                  </small>
                </div>
                <div class="form-group">
                  <label>Nama Lengkap <span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" pattern="^[A-Za-z \s*]+$" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group">
                  <label>NIP <span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="txt_NIP" id="txt_NIP" placeholder="No. Induk Pegawai" required>
                </div>
                <div class="form-group">
                  <label>Email <span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Alamat Email" required>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Password <span style="color:red">*</span></label>
                      <input type="password" class="form-control" name="password" id="password" pattern=".{4,}" title="Four or more characters" placeholder="Ketikan Password" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Retype Password <span style="color:red">*</span></label>
                      <input type="password" class="form-control" name="confirm_password" id="confirm_password" pattern=".{4,}" title="Four or more characters" placeholder="Ketikan Ulang Password" required>
                    </div>
                  </div>
                </div>
                <!-- /.form-group -->
=======
              <div class="col-md-6">&nbsp;</div>
              <div class="col-md-6 text-right">
                  <input class="btn btn-warning" id="btn_reset" type="reset" value="Reset"/>
                  <input class="btn btn-primary" name="submit" id="btn_submit" type="submit" value="Submit"/>
>>>>>>> 6a9184ed2d09ef4b1e22deef2b21004a7c31cbff
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">&nbsp;</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Jenis Kelamin <span style="color:red">*</span>)</label>
                  <select class="form-control select2bs4" name="kelamin" id="kelamin" style="width: 100%;">
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Tempat Lahir <span style="color:red">*</span>)</label>
                  <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="Bandung" placeholder="Tempat Kelahiran" required>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <!-- Date -->
                <div class="form-group">
                  <label>Tanggal Lahir <span style="color:red">*</span>)</label></label>
                  <div class="input-group date">
                      <div class="input-group-append">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                      <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="MM/DD/YYYY" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>No HP <span style="color:red">*</span>)</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                    </div>
                    <input type="text" name="no_telp" id="no_telp" class="form-control phone_number_3" value="" placeholder="+62-9999999999" required>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">&nbsp;</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>METODE PENGUKURAN <span style="color:red">*</span>)</label>
                  <select class="form-control select2bs4" name="tipe_auk" id="tipe_auk" style="width: 100%;">
                    <option value="1">Metode Pengukuran Khusus</option>
                    <option value="2">Metode Pengukuran Dalam Negeri</option>
                    <option value="3">Metode Pengukuran Luar Negeri</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>No Elektrik MI/KODE AUK <span style="color:red">*</span>)</label>
                  <input type="text" class="form-control" name="dis_kode_auk" id="dis_kode_auk" disabled placeholder="Nomer Elektrik MI">
                  <input type="hidden" name="kode_auk" id="kode_auk" value="">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-md-6">
                <!-- Date -->
                <div class="form-group">
                  <label>Tanggal Periksa <span style="color:red">*</span>)</label></label>
                  <div class="input-group date">
                      <div class="input-group-append">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                      <input type="date" class="form-control" id="tgl_periksa" name="tgl_periksa" placeholder="MM/DD/YYYY" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Diperiksa dan disetujui oleh <span style="color:red">*</span>)</label>
                  <input type="text" class="form-control" name="nama_pemeriksa" id="nama_pemeriksa" value="Pak Bambang" placeholder="Diperiksa dan disetujui oleh" required>
                </div>
                <!-- /.form-group -->
              </div>
            </div>
                <!-- /.row -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Foto Diri <span style="color:red">*</span>)</label>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <div class="col-md-6">
                      <input type="file" id="myFile1" name="myFile1" accept="image/x-png,image/gif,image/jpeg" />
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>CV - Curiculum Vitae <span style="color:red">*</span>)</label>
                      </div>
                      <!-- /.form-group -->
                  </div>
                  <div class="col-md-6">
                      <input type="file" id="myFile2" name="myFile2" accept="image/x-png,image/gif,image/jpeg" />
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Surat Tanda Tamat Pendidikan dan Pelatihan <span style="color:red">*</span>)</label>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <div class="col-md-6">
                      <input type="file" id="myFile3" name="myFile3" accept="image/x-png,image/gif,image/jpeg" />
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Lembar Pengukuhan <span style="color:red">*</span>)</label>
                      </div>
                      <!-- /.form-group -->
                  </div>
                  <div class="col-md-6">
                      <input type="file" id="myFile4" name="myFile4" accept="image/x-png,image/gif,image/jpeg" />
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Ijazah Formal <span style="color:red">*</span>)</label>
                          <small id="note" class="form-text text-muted"> <!-- #2 -->
                            (MI <strong>tipe A</strong> minimal ijazah pelaut ANT/ATT II atau S1 Teknik Perkapalan)<br>
                            (MI <strong>tipe B</strong> minimal ijazah pelaut ANT/ATT III atau D3 Teknik Perkapalan)
                          </small>
                      </div>
                      <!-- /.form-group -->
                  </div>
                  <div class="col-md-6">
                      <input type="file" id="myFile5" name="myFile5" accept="image/x-png,image/gif,image/jpeg" />
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Ijazah Formal Lainnya (<i>Optional</i>)</label>
                      </div>
                      <!-- /.form-group -->
                  </div>
                  <div class="col-md-6">
                      <input type="file" id="myFile6" name="myFile6" accept="image/x-png,image/gif,image/jpeg" />
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
        </div>
          <!-- /.card -->
          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">&nbsp;</div>
                <div class="col-md-6 text-right">
                    <input class="btn btn-warning" id="btn_reset" type="reset" value="Reset"/>
                    <input class="btn btn-primary" name="submit" id="btn_submit" type="submit" value="Submit"/>
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </form>
</div>
<!-- /.content-wrapper -->
<audio id="error" src="./sounds/KDE_Error_2.ogg"></audio>
<audio id="success" src="./sounds/KDE_Chimes_2.ogg"></audio>
