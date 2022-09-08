@extends('layouts.app')

@section('content')
@php
  $role=Auth::user()->role;
@endphp
<!--begin::Section-->
<div>
  <!--begin::Heading-->
  <div class="col-12 d-flex">
    <h1 class="anchor fw-bolder mb-5" id="striped-rounded-bordered">Daftar Project</h1>
    @if($role=="gardener"||$role=="designer")
    <button class="ms-auto btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Project</button>
    @endif
  </div>
  <!--end::Heading-->
  <!--begin::Block-->
  <div class="my-5 table-responsive">
    <table id="myTable" class="table table-striped table-hover table-rounded border gs-7">
      <thead>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
          <th>No</th>
          <th>Nama Project</th>
          <th>Keterangan</th>
          <th>Status</th>
          @if($role=="gardener"||$role=="designer")
          <th>Action</th>
          @endif
        </tr>
      </thead>
      <tbody>
        @php
          $no=1;
        @endphp
        @foreach ($projects as $project)
        <tr>
          <td>{{ $no }}</td>
          <td id="n{{ $project->id }}" style="min-width: 150px">{{ $project->nama }}</td>
          <td id="k{{ $project->id }}" >{{ $project->keterangan }}</td>
          <td id="s{{ $project->id }}" >{{ $project->status }}</td>
          @if($role=="gardener"||$role=="designer")
          <td style="min-width: 100px">
            <a href="#" class="btn btn-icon btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit({{ $project->id }})"><i class="bi bi-pencil-fill"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus" onclick="hapus({{ $project->id }})"><i class="bi bi-x-lg"></i></a>
          </td>
          @endif
        </tr>
        @php
          $no++
        @endphp
        @endforeach
      </tbody>
    </table>
  </div>
  <!--end::Block-->
</div>
<!--end::Section-->

@if($role=="gardener"||$role=="designer")
<div class="modal fade" tabindex="-1" id="tambah">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Tambah Project</h3>
          <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <form class="form" method="post" action="home">
          @csrf
          <input type="hidden" name="tipe" value="store">
          <div class="modal-body">
            <div class="row g-9 mb-8">
              <div class="col-md-8">
                <label class="required fw-bold mb-2">Nama</label>
                <input type="text" class="form-control form-control-solid" name="nama" required>
              </div>
              <div class="col-md-4">
                <label class="required fw-bold mb-2">Status</label>
                <select class="form-select form-select-solid" name="status" tabindex="-1" aria-hidden="true" required>
                  <option value="Selesai">Selesai</option>
                  <option value="Berjalan">Berjalan</option>
                </select>
              </div>
            </div>
            <div class="row g-9 mb-8">
              <div class="col-12">
                <label class="required fw-bold mb-2">Keterangan</label>
                <input type="text" class="form-control form-control-solid" name="keterangan" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="edit">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="et">Edit Project</h3>
          <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <form class="form" method="post" action="home">
          @csrf
          <input type="hidden" name="tipe" value="update">
          <div class="modal-body">
            <input type="hidden" class="d-none" id="ei" name="id">
            <div class="row g-9 mb-8">
              <div class="col-md-8">
                <label class="required fw-bold mb-2">Nama</label>
                <input type="text" class="form-control form-control-solid" id="en" name="nama" required>
              </div>
              <div class="col-md-4">
                <label class="required fw-bold mb-2">Status</label>
                <select class="form-select form-select-solid" id="es" name="status" tabindex="-1" aria-hidden="true" required>
                  <option value="Selesai">Selesai</option>
                  <option value="Berjalan">Berjalan</option>
                </select>
              </div>
            </div>
            <div class="row g-9 mb-8">
              <div class="col-12">
                <label class="required fw-bold mb-2">Keterangan</label>
                <input type="text" class="form-control form-control-solid" name="keterangan" id="ek" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success" name="s_edit">Submit</button>
          </div>
        </form>
      </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="hapus">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Hapus Project</h3>
          <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <form class="form" method="post" action="home">
          @csrf
          <input type="hidden" name="tipe" value="delete">
          <div class="modal-body">
            <input type="hidden" class="d-none" id="di" name="id">
            <label class="fw-bold mb-2" id="dd">Apakah anda yakin ingin menghapus project ini?</label>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger" name="s_hapus">Delete</button>
          </div>
        </form>
      </div>
  </div>
</div>

<script type="text/javascript">
  function edit(id){
    $("#ei").val(id);
    $("#en").val($("#n"+id).text());
    $("#ek").val($("#k"+id).text());
    $("#es").val($("#s"+id).text());
    $("#et").text("Edit "+$("#n"+id).text());
  }
  function hapus(id){
    $("#di").val(id);
    $("#dd").text("Apakah anda yakin ingin menghapus "+$("#n"+id).text()+"?");
  }
</script>
@endif
@endsection
