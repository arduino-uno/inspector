<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Personal info</h3>
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
              <!-- left column -->
              <div class="col-md-5">
                <div class="text-center">
                  <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-thumbnail" alt="avatar">
                  <h6>Upload a different photo...</h6>

                  <input type="file" class="form-control">
                </div>
                <div class="row-fluid mt-3">
                  <div class="span8">
                  	 <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.uk/maps?f=q&source=s_q&hl=en&geocode=&q=15+Springfield+Way,+Hythe,+CT21+5SH&aq=t&sll=52.8382,-2.327815&sspn=8.047465,13.666992&ie=UTF8&hq=&hnear=15+Springfield+Way,+Hythe+CT21+5SH,+United+Kingdom&t=m&z=14&ll=51.077429,1.121722&output=embed"></iframe>
                	</div>
                </div>
              </div>
              <!-- edit form column -->
              <div class="col-md-7 personal-info">
                <form class="form-horizontal" id="form_profile" name="form_profile" method="POST" action="./scripts/profile_page.php"/>
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Kode AUK:</label>
                    <div class="col-lg-12">
                      <input class="form-control" name="dis_kode_auk" id="dis_kode_auk" type="text" disabled value="Table ID">
                      <input name="kode_auk" id="kode_auk" type="text" value="" hidden>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Nama Login:</label>
                    <div class="col-lg-12">
                      <input class="form-control" name="nama_login" id="nama_login" pattern="[A-Za-z0-9]+" type="text" value="" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Nama Lengkap:</label>
                    <div class="col-lg-12">
                      <input class="form-control" name="nama_lengkap" id="nama_lengkap" pattern="^[A-Za-z \s*]+$" type="text" value="" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-12">
                      <input class="form-control" name="email" id="email" type="email" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Alamat Email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label">No. Telp:</label>
                    <div class="col-lg-12">
                      <input class="form-control phone_number_3" name="no_telp" id="no_telp" type="text" value="" placeholder="+62-9999999999" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>New Password <span style="color:red">*</span></label>
                        <input type="password" class="form-control" name="password" id="password" pattern=".{4,}" title="Four or more characters" placeholder="Ketikan Password">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Retype New Password <span style="color:red">*</span></label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" pattern=".{4,}" title="Four or more characters" placeholder="Ketikan Ulang Password">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Alamat Lengkap:</label>
                    <div class="col-lg-12">
                      <textarea class="form-control" name="alamat" id="alamat" rows="8" placeholder="Alamat Anda">&nbsp;</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Time Zone:</label>
                    <div class="col-lg-12">
                      <div class="ui-select">
                        <select id="user_time_zone" class="form-control">
                          <option value="Hawaii">(GMT-10:00) Hawaii</option>
                          <option value="Alaska">(GMT-09:00) Alaska</option>
                          <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                          <option value="Arizona">(GMT-07:00) Arizona</option>
                          <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                          <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                          <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                          <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 justify-content-end">
                      <input class="btn btn-warning" id="btn_reset" type="reset" value="Reset"/>
                      <input class="btn btn-primary" name="submit" id="btn_submit" type="submit" value="Submit"/>
                  </div>
                </form>
              </div>
            </div>
            <!-- // row profile -->
          </div>
        </div>
      </div>
    </section>
</div>
<!-- /.content-wrapper -->
