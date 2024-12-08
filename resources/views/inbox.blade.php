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
            <form class="form-inline d-flex flex-row" action="{{ route('inbox') }}" method="GET">
              <input class="form-control mr-sm-2" type="search" placeholder="Search by user or event" aria-label="Search" value="{{ $search ?? '' }}" name="search" style="margin-right: 20px;">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </nav>


          <div class="row clearfix">
            @if($transactions->isEmpty())
              <p class="text-light">No transactions found for your search.</p>
            @else
            @foreach($transactions as $t)
            <div class="col-12">
              <ul class="mail_list list-group list-unstyled">
                  <!-- start of inbox -->
                  <li class="list-group-item unread" style="background: none; border-left: 2px solid gray;">
                    <div class="media" style="background: none;">
                      <div class="media-body">
                        <div class="media-heading">
                          <a href="mail-single.html" class="m-r-10 text-light">{{$t->user->name}}</a>

                          @if($t->status === 'pending')
                            <span class="badge bg-warning text-dark">On check</span>
                          @elseif($t->status === 'accepted')
                            <span class="badge bg-success text-light">Accepted</span>
                          @elseif($t->status === 'rejected')
                            <span class="badge bg-danger text-light">Rejected</span>
                          @elseif($t->status === 'negotiated')
                            <span class="badge bg-warning text-light">Negotiated</span>
                          @endif
                          <small class="text-muted">
                            <time class="hidden-sm-down" style="color: white; margin-left: 20px;" datetime="2017">{{$t->created_at}}</time>
                            <i class="zmdi zmdi-attachment-alt"></i> 
                          </small>
                        </div>
                        
                        <p class="msg" style="color: white;">{{$t->event->name}}</p>
                        <p class="msg" style="color: white;">{{$t->event->description}}</p>
                        <br>



                        <!-- Accept and Decline Buttons -->
                        <div class="btn-group mt-2">
                          <a href="{{ asset('storage/' . $t->file_path) }}" class="btn btn-outline-light" target="_blank">
                            <small>View Proposal</small>
                          </a>
                          <!-- <a href="{{ route('transactions.accept', $t->id) }}" class="btn btn-outline-light">
                            <small>Accept</small>
                          </a> -->
                          @if($t->status === 'pending')
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
                  @endforeach
                @endif
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
