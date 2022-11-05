@extends('layouts.admin')

@section('title')
  Transaction Dashboard
@endsection

@section('content')
  <div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">transaction Dashboard</h2>
        <p class="dashboard-subtitle">List of Transaction</p>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Trx Code</th>
                        <th>Store Name</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Date Order</th>
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
        { data: 'DT_RowIndex', name: 'DT_RowIndex',width: '7.5%' },
        { data: 'code', name: 'code' },
        { data: 'user.store_name', name: 'user.store_name' },
        { data: 'total_price', name: 'total_price', render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp. ' )},
        { data: 'transaction_status', name: 'transaction_status' },
        { data: 'created_at', name: 'created_at'},
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searcable: false,
          width: '15%',

        },
      ],
    })
  </script>
@endpush