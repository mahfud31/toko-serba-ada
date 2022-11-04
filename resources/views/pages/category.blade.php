@extends('layouts.app')

@section('title')
  Store Category Page
@endsection

@push('addon-style')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@endpush

@section('content')
  <div class="page-content page-home">
    <section class="store-trend-categories">
      <div class="container">
        <div class="row">
          <div class="col-12" data-aos="fade-up">
            <h5><a href="{{ route('categories') }}" class="text-dark"><u>All Categories</u></a> </h5>
          </div>
        </div>
        <div class="row" data-aos="fade-left" data-aos-delay="100">
          <div class="owl-carousel px-3 ">
            @forelse ($categories as $category)
              <div class="item mt-2 ml-2">
                <a href="{{ route('categories-detail', $category->slug) }}" class="component-categories d-block">
                  <div class="categories-image">
                    <img src="{{ Storage::url($category->photo) }}" alt="" class="w-75 m-auto" />
                  </div>
                  <p class="categories-text">{{ $category->name }}</p>
                </a>
              </div>
            @empty
              <div class="col-12 text-center py-5">
                Belum Ada Kategori Produk
              </div>
            @endforelse
          </div>
        </div>
      </div>
    </section>

    <section class="store-new-products">
      <div class="container">
        <div class="row">
          <div class="col-12" data-aos="fade-up">
            <h5>All Products</h5>
          </div>
        </div>
      <div class="row">
          @php
              $incrementProduct = 0;
          @endphp
          @forelse ($products as $product)
            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $incrementProduct += 100 }}">
              <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                <div class="products-thumbnail">
                  <div class="products-image" style="
                    @if ($product->galleries)
                      background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                    @else
                      background-color: #eee @endif
                  "></div>
                  </div>
                  <div class="products-text">
                    {{ $product->name }}
                  </div>
                  <div class="products-price">
                    @currency($product->price)
                  </div>
                </a>
            </div>
          @empty
            <div class="col-12 text-center py-5">
              Belum Ada Produk
            </div>
          @endforelse
        </div>
        <div class="row ">
          <div class="col-12 mt-4 d-flex justify-content-center">
            {{ $products->links() }}
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@push('addon-script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.owl-carousel').owlCarousel({
        margin: 20,
        dots: false,
        responsive: {
          0: {
            items: 3,
          },
          600: {
            items: 5,
          },
          1000: {
            items: 7,
          },
        },
      });
    });
  </script>
@endpush
