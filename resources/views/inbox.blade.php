<x-layout>
  <x-navbar />
  <main>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <div class="container text-light">
      <br><br><br><br><br>
      <section class="content inbox">
        <div class="container-fluid">
          <nav class="navbar navbar-dark">
            <form class="form-inline">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </nav>
          <div class="row clearfix">
            <div class="col-md-12 col-lg-12 col-xl-12">
              <ul class="mail_list list-group list-unstyled">
              <div class="col-12 col-lg-10 col-xl-8" style="background: none;">
                <div class="row d-flex align-items-start" style="background: none;" data-aos="fade-right">
                  <!-- start of inbox -->
                  @foreach($transactions as $t)
                  <li class="list-group-item unread" style="background: none;">
                    <div class="media" style="background: none;">
                      <div class="pull-left" style="background: none;">
                        <div class="controls" style="background: none;">
                          <div class="checkbox">
                            <input type="checkbox" id="basic_checkbox_2">
                            <label for="basic_checkbox_2"></label>
                          </div>
                          <a href="javascript:void(0);" class="favourite col-amber hidden-sm-down" data-toggle="active">
                            <i class="zmdi zmdi-star"></i>
                          </a>
                        </div>
                        <div class="thumb hidden-sm-down m-r-20">
                          <img src="assets/images/xs/avatar2.jpg" class="rounded-circle border border-light" alt="">
                        </div>
                      </div>
                      <div class="media-body">
                        <div class="media-heading">
                          <a href="mail-single.html" class="m-r-10 text-light">{{$t->user->name}}</a>
                          <span class="badge bg-amber text-dark">Shop</span>
                          <small class="float-right text-muted">
                            <time class="hidden-sm-down" style="background: none; color: white;" datetime="2017">{{$t->user->created_at}}</time>
                            <i class="zmdi zmdi-attachment-alt"></i> 
                          </small>
                        </div>
                        <p class="msg" style="color: white;">{{$t->event->name}}</p>
                        <p class="msg" style="color: white;">{{$t->event->description}}</p>
                        <br>
                        <!-- Accept and Decline Buttons -->
                        <div class="btn-group mt-2">
                        <div class="btn-group mt-2">
                          <a href="{{ asset('storage/' . $t->file_path) }}" class="btn btn-outline-light" target="_blank">
                            <small>View Proposal</small>
                          </a>
                          <a href="" class="btn btn-outline-light">
                            <small>Accept</small>
                          </a>
                          <a href="" class="btn btn-outline-light">
                            <small>Decline</small>
                          </a>
                        </div>
                      </div>
                    </div>
                  </li>
                  @endforeach
                </div>
              </div>
              </ul>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item">
                    <a class="page-link bg-dark text-light border-light" href="#">Previous</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link bg-dark text-light border-light" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link bg-dark text-light border-light" href="#">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link bg-dark text-light border-light" href="#">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link bg-dark text-light border-light" href="#">Next</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  <x-footer />
</x-layout>
