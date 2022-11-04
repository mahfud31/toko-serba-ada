@extends('layouts.admin')

@section('title')
  Product Gallery Dashboard
@endsection

@section('content')
  <div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Product Gallery Dashboard</h2>
        <p class="dashboard-subtitle">List of Product Gallery</p>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <a href="{{ route('gallery-product.create') }}" class="btn btn-primary mb-3">
                  + Tambah Foto Produk Baru
                </a>
                <div class="table-responsive">
                  <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('addon-script')
  <script>
    var datatable = $('#crudTable').DataTable({
      processing: true,
      serverside: true,
      ordering: true,
      ajax: {
        url: '{!! url()->current() !!}',
      },
      columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex',width: '10%' },
        { data: 'product.name', name: 'product.name',width: '35%' },
        { data: 'photos', name: 'photos',width: '30%' },
        {
          data: 'action', 
          name: 'action',
          orderable: false,
          searcable: false,
          width: '15%',

        },
      ]
    })
  </script>
@endpush