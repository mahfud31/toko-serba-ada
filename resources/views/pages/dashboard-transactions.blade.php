@extends('layouts.dashboard')

@section('title')
  Store Dashboard Transaction
@endsection

@section('content')
  <div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Transactions</h2>
        <p class="dashboard-subtitle">
          Big result start from the small one
        </p>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12 mt-2">
            <ul
              class="nav nav-pills mb-3"
              id="pills-tab"
              role="tablist"
            >
              <li class="nav-item" role="presentation">
                <a
                  class="nav-link active"
                  id="pills-home-tab"
                  data-toggle="pill"
                  href="#pills-home"
                  role="tab"
                  aria-controls="pills-home"
                  aria-selected="true"
                  >Sell Product</a
                >
              </li>
              <li class="nav-item" role="presentation">
                <a
                  class="nav-link"
                  id="pills-profile-tab"
                  data-toggle="pill"
                  href="#pills-profile"
                  role="tab"
                  aria-controls="pills-profile"
                  aria-selected="false"
                  >Buy Product</a
                >
              </li>
            </ul>
            <div class="card-body bg-info rounded py-0 mb-2 d-none d-md-block">
              <div class="row">
                <div class="col-md-1">
                  <div class="">Photo</div>
                </div>
                <div class="col-md-4">
                  <div class="">Product</div>
                </div>
                <div class="col-md-3">
                  <div class="">Buyer/Store</div>
                </div>
                <div class="col-md-3">
                  <div class="">Date Order</div>
                </div>
                <div class="col-md-1">
                  <div class="">Detail</div>
                </div>
              </div>
            </div>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                @forelse ($sellTransactions as $transaction )
                  <a href="{{ route('dashboard-transaction-details', $transaction->id) }}" class="card card-list d-block">
                    <div class="card-body p-3">
                      <div class="row">
                        <div class="col-md-1 d-none d-md-block">
                          <img src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                            class="w-100" alt=""
                          />
                        </div>
                        <div class="col-md-4">
                          {{ $transaction->product->name ?? '' }}
                        </div>
                        <div class="col-md-3">
                          {{ $transaction->transaction->user->name ?? '' }}
                        </div>
                        <div class="col-md-3">
                          {{ $transaction->created_at ?? '' }}
                        </div>
                        <div class="col-md-1 d-none d-md-block">
                          <img src="/images/dashboard-arrow-right.svg" alt=""/>
                        </div>
                      </div>
                    </div>
                  </a>
                @empty
                  <div class="col-12 card card-list d-block text-center py-2">
                    <h5 class="m-0">"Belum Ada produk yg terjual"</h5>
                  </div>
                @endforelse
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                @forelse ($buyTransactions as $transaction )
                  <a href="{{ route('dashboard-transaction-details', $transaction->id) }}" class="card card-list d-block">
                    <div class="card-body p-3">
                      <div class="row">
                        <div class="col-md-1 d-none d-md-block">
                          <img src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                            class="w-100" alt=""
                          />
                        </div>
                        <div class="col-md-4">
                          {{ $transaction->product->name ?? '' }}
                        </div>
                        <div class="col-md-3">
                          {{ $transaction->product->user->store_name ?? '' }}
                        </div>
                        <div class="col-md-3">
                          {{ $transaction->created_at ?? '' }}
                        </div>
                        <div class="col-md-1 d-none d-md-block">
                          <img src="/images/dashboard-arrow-right.svg" alt=""/>
                        </div>
                      </div>
                    </div>
                  </a>
                @empty
                  <div class="col-12 card card-list d-block text-center py-2">
                    <h5 class="m-0">"Belum Ada produk yg terjual"</h5>
                  </div>
                @endforelse
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection