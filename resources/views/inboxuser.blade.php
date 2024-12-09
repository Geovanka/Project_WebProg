<x-layout>
  <x-navbar />
  <main>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <div class="container text-light">
      <br><br><br><br><br>
      <section class="content inbox">
        <div class="container-fluid">
          <nav class="navbar navbar-dark">
            <form class="form-inline d-flex flex-row">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="margin-right: 20px;">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </nav>
          <div class="row clearfix">
            <div class="col-md-12 col-lg-12 col-xl-12">
              <ul class="mail_list list-group list-unstyled">
              <div class="col-12 col-lg-10 col-xl-8" style="background: none;">
                <div class="row d-flex align-items-start" style="background: none;" data-aos="fade-right">
                  <!-- start of inbox -->

                  <div class="row mb-3">
                    <form action="/inboxuser" method="GET" id="eventFilterForm" class="col-sm-12">
                      <label for="eventName" class="col-sm-2 col-form-label">Pick Event</label>
                      <div class="col-sm-10">
                          <select id="eventSelect" name="event_id" class="form-control" aria-label="Default select example"
                          onchange="document.getElementById('eventFilterForm').submit()">
                          <option value="" disabled selected>Open this select menu</option>
                              @foreach($events as $e)
                              <option value="{{ $e->id }}" {{ request('event_id') == $e->id ? 'selected' : '' }}>
                                {{ $e->name }}
                              </option>
                              @endforeach
                          </select>
                      </div>
                    </form>
                  </div>
                  @if($transactions->contains('negotiation', '!=', null))
                  @foreach($transactions as $t)
                    @if($t->negotiation)
                    <div class="col-12">
                      <ul class="mail_list list-group list-unstyled">
                        <li class="list-group-item unread" style="background: none; border-left: 1px solid gray;">
                            <div class="media" style="background: none;">
                            <div class="media-body">
                                <div class="media-heading">
                                @if($t->sponsor)
                                    <a href="mail-single.html" class="m-r-10 text-light">{{ $t->sponsor->name }}</a>
                                @else
                                    <a href="mail-single.html" class="m-r-10 text-light">No Sponsor</a>
                                @endif

                                @if($t->status === 'pending')
                                    <span class="badge bg-warning text-dark">On check</span>
                                @elseif($t->status === 'accepted')
                                    <span class="badge bg-success text-light">Accepted</span>
                                @elseif($t->status === 'rejected')
                                    <span class="badge bg-danger text-light">Rejected</span>
                                @elseif($t->status === 'negotiated')
                                    <span class="badge bg-warning text-light">Negotiated</span>
                                @endif
                                <small class="float-right text-muted">
                                    <time class="hidden-sm-down" style="background: none; color: white;" datetime="2017">{{$t->created_at}}</time>
                                    <i class="zmdi zmdi-attachment-alt"></i> 
                                </small>
                                </div>
                                <p class="msg" style="color: white;">{{$t->event->name}}</p>
                                <p class="msg" style="color: white;">{{$t->negotiation}}</p>
                                <br>

                                <script>
                                    function confirmAndHide(button, message) {
                                    if (confirm(message)) {
                                        button.closest('form').parentElement.querySelectorAll('form').forEach(form => {
                                        form.style.display = 'none';
                                        });
                                        return true;
                                    }
                                    return false;
                                    }
                                </script>
                                </div>
                            </div>
                            </div>
                        </li>
                      </ul>
                    </div>
                    @endif
                  @endforeach
                  @else
                    <span>No transaction from Sponsor</span>
                  @endif
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </main>
  <x-footer />
</x-layout>
