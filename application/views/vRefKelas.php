<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Referensi Kelas
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Ref. Kelas</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Form Kelas</h3>
    </div>
    <?=form_open($action,'class="form-horizontal"'); ?>
    <div class="box-body">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="kelas" class="col-sm-2 control-label">Kelas </label>
          <div class="col-sm-10">
            <input type="text" name="kelas" id="kelas" class="form-control input-sm" placeholder="Nama Kelas">
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="kelas" class="col-sm-2 control-label">Status </label>
          <div class="col-sm-6">
            <select name="status" class="form-control input-sm">
              <option value="0">Tidak Aktif</option>
              <option value="1" selected>Aktif</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" name="idkelas" id="idkelas" value="false">
    <input type="hidden" name="edit" id="edit" value="false">
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="form-group">
        <div class="text-center">
          <button type="submit" name="btnsimpan" id="btnsimpan" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
          <button type="reset" name="btnreset" id="btnreset" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i> Reset</button>
        </div>
      </div>
    </div>
    <!-- /.box-footer-->
    <?=form_close(); ?>
  </div>
  <!-- /.box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Data Kelas</h3>
    </div>
    <div class="box-body">
      <table id="dtable" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Kelas</th>
            <th>Status</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($dtTable as $row) { ?>
          <tr>
            <td><?=$row->id;?></td>
            <td><?=$row->kelas;?></td>
            <td><?=[0=>'Tidak Aktif','Aktif'][$row->status];?></td>
            <td>
              <button class="btn btn-warning btn-xs" onclick="editdata(<?=$row->id;?>);"><i class="fa fa-edit"></i> Edit</button>
              <a href="<?=base_url().'RefKelas/delete/'.$row->id;?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data ini ?')"><i class="fa fa-trash-o"></i> Hapus</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<!-- /.content -->

<script>
  function editdata(id) {
    $.ajax({
      url : "<?php echo base_url('RefKelas/xedit/')?>" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('#idkelas').val(data.id);
        $('#kelas').val(data.kelas).focus();
        $('#status').val(data.status).change();
        $('#edit').val(true);
        $('#btnsimpan').html('<i class="fa fa-check-square-o"></i> Update').removeClass('btn-primary').addClass('btn-warning');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert("<?=$this->lang->line('getdata_err');?>");
      }
    }); 
  }
  
  $('#btnreset').click(function() {
    $('#idkelas').val(false);
    $('#edit').val(false);
    $('#btnsimpan').html('<i class="fa fa-save"></i> Simpan').removeClass('btn-warning').addClass('btn-primary');
  })  
  
</script>