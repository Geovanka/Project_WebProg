<x-layout>
  <x-navbar />
  <main>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <div class="container bg-dark text-light">
      <br><br><br><br><br>
      <section class="content inbox">
        <div class="container-fluid">
          <div class="row clearfix">
            <div class="col-lg-12">
              <div class="card action_bar bg-dark border-light">
                <div class="body">
                  <div class="row clearfix">
                    <div class="col-lg-1 col-md-2 col-3">
                      <div class="checkbox inlineblock delete_all text-light">
                        <input id="deleteall" type="checkbox">
                        <label for="deleteall">All</label>
                      </div>
                    </div>
                    <div class="col-lg-5 col-md-4 col-6">
                      <div class="input-group search">
                        <input type="text" class="form-control bg-dark text-light border-light" placeholder="Search...">
                        <span class="input-group-addon bg-dark text-light border-light">
                          <i class="zmdi zmdi-search"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row clearfix">
            <div class="col-md-12 col-lg-12 col-xl-12">
              <ul class="mail_list list-group list-unstyled">
                <li class="list-group-item unread ls-none bg-dark text-light border-light">
                  <div class="media">
                    <div class="pull-left">
                      <div class="controls">
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
                        <a href="mail-single.html" class="m-r-10 text-light">Simply dummy text</a>
                        <span class="badge bg-amber text-dark">Shop</span>
                        <small class="float-right text-muted">
                          <time class="hidden-sm-down" datetime="2017">12:35 AM</time>
                          <i class="zmdi zmdi-attachment-alt"></i>
                        </small>
                      </div>
                      <p class="msg">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      <br>
                      <!-- Accept and Decline Buttons -->
                      <div class="btn-group mt-2">
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
              </ul>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center bg-dark">
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
