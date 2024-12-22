<x-layout>
  <x-navbar/>

  <main>
  @if(session('errorMessage'))
    <div class="alert alert-danger">
        <strong>Error!</strong> {{ session('errorMessage') }}
    </div>
  @else
      <!-- Your normal page content goes here -->

    <div class="w-100 overflow-hidden position-relative bg-black text-white" data-aos="fade">
      <div class="position-absolute w-100 h-100 bg-black opacity-75 top-0 start-0"></div>
      <div class="container py-vh-4 position-relative mt-5 px-vw-5 text-center">
        <div class="row d-flex align-items-center justify-content-center py-vh-5">
          <div class="col-12 col-xl-10">
            <span class="h5 text-secondary fw-lighter">Our Mission</span>
            <h1 class="display-huge mt-3 mb-3 lh-1">Sponsor Made Easy</h1>
          </div>
          <div class="col-12 col-xl-8">
            <p class="lead text-secondary">We are committed to bridging the gap between sponsors and organizations, streamlining the sponsorship agreement process for seamless collaboration and mutual success.</p>
          </div>
          <div class="col-12 text-center">
            <a href="#sponsors" class="btn btn-xl btn-light">Explore
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
              </svg>
            </a>
          </div>
        </div>
      </div>

    </div>

    <div class="w-100 position-relative bg-black text-white bg-cover d-flex align-items-center">
      <div class="container-fluid px-vw-5 d-flex justify-content-center align-items-center">
        <div class="position-absolute w-100 h-50 bg-dark bottom-0 start-0"></div>
        <div class="row d-flex align-items-center position-relative justify-content-center px-0 g-5">
          <div class="col-12 col-md-6 col-lg-3">
            <img src="{{ asset('assets/images/Logo_Binus_White.png') }}" width="180" height="1732" alt="abstract image"
              class="img-fluid position-relative rounded-5 shadow" data-aos="fade-up" data-aos-duration="3000">
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <img src="{{ asset('assets/images/logo_prasmul_white.png') }}" width="180" height="1732" alt="abstract image"
              class="img-fluid position-relative rounded-5 shadow" data-aos="fade-up" data-aos-duration="2000">
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <img src="{{ asset('assets/images/logo_uph_White.png') }}" width="180" height="1732" alt="abstract image"
              class="img-fluid position-relative rounded-5 shadow" data-aos="fade-up" data-aos-duration="3000">
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <img src="{{ asset('assets/images/logo_trisakti_White.png') }}" width="180" height="1732" alt="abstract image"
              class="img-fluid position-relative rounded-5 shadow" data-aos="fade-up" data-aos-duration="3000">
          </div>
        </div>
      </div>
    </div>
    <div class="bg-dark" id="sponsors">
      <div class="row d-flex align-items-center justify-content-center py-vh-5">
        <div class="col-12 col-xl-10 text-center">
          <span class="h5 text-secondary fw-lighter">What's Next?</span>
          <h2 class="mt-3 mb-3 lh-1">Check Out Our Sponsors!</h2>
        </div>
      </div>
    </div>

    <div class="bg-black py-vh-3">
      <div class="container bg-black px-vw-3 py-vh-3 rounded-5 shadow">
        <div class="row gx-5">
          @foreach($sponsor as $s)
          <div class="col-12 col-md-4 col-lg-3 mb-4">
            <div class="card bg-transparent" data-aos="zoom-in-up" style="height: 630px;">
              <div class="bg-dark shadow rounded-5 p-0 h-100 d-flex flex-column">
                <img src="{{ 'storage/'.$s->image }}" alt="Sponsor's Image"
                  class="img-fluid rounded-5 no-bottom-radius" loading="lazy" style="width: 250px; height: 270px">
                <div class="flex-grow-1" style="padding: 2.4rem;">
                  <h2 class="fw-lighter multi-line-truncate" style="height: 85px; font-size:23px;">{{ $s->name }}</h2>
                  <p class="pb-4 text-secondary" style="height: 145px; font-size:16px; overflow: hidden;">{{ $s->description }}</p>
                  <p class="email-text">{{ $s->email }}</p>
                  {{-- <a href="{{ route('sponsor.show', ['id' => $s->id]) }}" class="link-fancy link-fancy-light" style="font-size:15px">Read more</a> --}}
                  <a href="{{ route('show.sponsor', $s->id) }}" class="link-fancy link-fancy-light" style="font-size:15px">Read more</a>

                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    
    </div>
  @endif
  </main>

  <x-footer/>
</x-layout>
