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

                  <div class="row mb-3">
                    <form action="/inboxuser" method="GET" id="eventFilterForm" class="col-sm-12">
                      <label for="eventName" class="col-sm-2 col-form-label">Pick Event</label>
                      <div class="col-sm-10">
                          <select id="eventSelect" name="event_id" class="form-control" aria-label="Default select example"
                          onchange="document.getElementById('eventFilterForm').submit()">
                          <option value="" disabled selected>Open this select menu</option>
                              @foreach($events as $e)
                              <!-- <option value="{{ $e->id }}" {{ request('event_id') == $e->id ? 'selected' : '' }}>
                                {{ $e->name }}
                              </option> -->
                              <option value="{{ $e->id }}">
                              @endforeach
                          </select>
                      </div>
                    </form>
                  </div>
                  @foreach($transactions as $t)
                    @if($t->negotiation)
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
                                @endif
                                <small class="float-right text-muted">
                                    <time class="hidden-sm-down" style="background: none; color: white;" datetime="2017">{{$t->created_at}}</time>
                                    <i class="zmdi zmdi-attachment-alt"></i> 
                                </small>
                                </div>
                                <p class="msg" style="color: white;">{{$t->event->name}}</p>
                                <p class="msg" style="color: white;">{{$t->negotiation}}</p>
                                <br>



                                <!-- Accept and Decline Buttons -->
                                <div class="btn-group mt-2">
                                <a href="{{ asset('storage/' . $t->file_path) }}" class="btn btn-outline-light" target="_blank">
                                    <small>View Proposal</small>
                                </a>
                                <!-- <a href="{{ route('transactions.accept', $t->id) }}" class="btn btn-outline-light">
                                    <small>Accept</small>
                                </a> -->
                                @if($t->status !== 'accepted' && $t->status !== 'rejected')
                                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#acceptModal{{ $t->id }}">
                                    <small>Accept</small>
                                    </button>

                                    <div class="modal fade" id="acceptModal{{ $t->id }}" tabindex="-1" role="dialog" aria-labelledby="acceptModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="acceptModalLabel">Confirm Acceptance</h5>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to accept this proposal?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('transactions.accept', $t->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Yes, Accept</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                            
                                    <!-- <a href="{{ route('transactions.reject', $t->id) }}" class="btn btn-outline-light">
                                    <small>Decline</small>
                                    </a> -->
            
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $t->id }}">
                                    <small>Reject</small>
                                    </button>

                                    <div class="modal fade" id="rejectModal{{ $t->id }}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="rejectModalLabel">Confirm Rejection</h5>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to reject this proposal?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('transactions.reject', $t->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Yes, Reject</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#negotiateModal{{ $t->id }}">
                                      <small>Negotiate</small>
                                    </button>

                                    <div class="modal fade" id="negotiateModal{{ $t->id }}" tabindex="-1" role="dialog" aria-labelledby="negotiateModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="negotiateModalLabel">Confirm Negotiation</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('transactions.negotiate', $t->id) }}" method="POST">
                                            @csrf
                                                <div class="mb-3">
                                                    <label for="negotiate" class="form-label">How do you want to negotiate?</label>
                                                    <textarea class="form-control" id="negotiation" name="negotiation" rows="3" placeholder="Enter negotiation description"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-success">Submit Negotiation</button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                @endif
                                

                                </div>



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
                        @else
                            <span>No transaction from Sponsor</span>
                        @endif
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </main>
  <x-footer />
</x-layout>
