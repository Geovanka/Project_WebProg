<x-layout>

    <div class="d-flex justify-content-between align-items-center">
        <h3 class="admintitle">ADMIN DASHBOARD</h3>

        <a href="/showsponsorform" class="btn btn-outline-light addSponsor">
            <small>Add Sponsor</small>
        </a>

        @if (Auth::guard('admin')->check())
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" aria-label="Download this template" class="btn btn-outline-light addSponsor">
                    <small>Log Out</small>
                </button>
            </form>
        @endif
    </div>

    <div class="container-fluid">
        <div class="row g-0">
            @if($sponsor->isEmpty())
                <p class="text-light">No transactions found for your search.</p>
            @else
            @foreach($sponsor as $s)
                <div class="col-12 col-md-6 col-lg-3 mb-4" style="padding: 0px 15px;">
                    <div class="card bg-transparent adminCard" style="width: 100%;">
                        <img src="{{ asset('storage/'.$s->image) }}" alt="Sponsor's Image" class="card-img-top"
                        style="width:100%; height:300px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                        <div class="card-body" style="padding: 20px 15px; font-size: 13px; height: 260px;">
                            <h5 class="card-title">{{ $s->name }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($s->description, 100, '...') }}</p>
                            <p class="card-text">Email: {{ $s->email }}</p>
                            <p class="card-text">Phone: {{ $s->phoneNum }}</p>
                            <p class="card-text">Created: {{ $s->created_at }} Updated: {{ $s->updated_at }}</p>
                            <a href="{{ route('admin.edit', $s->id)}}" class="btn btn-primary edit-button" style="color: white;" data-id="{{ $s->id }}">Edit</a>
                            <form action="{{ route('admin.delete', $s->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this sponsor?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="color: red;">Delete</button>
                            </form>
                            {{-- <script>
                                function confirmAndHide(button, message) {
                                    if (confirm(message)) {
                                        button.closest('form').parentElement.querySelectorAll('form').forEach(form => {
                                        form.style.display = 'none';
                                    });
                                        return true;
                                    }
                                    return false;
                                }
                            </script> --}}
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
            <div class="pagination">
                {{ $sponsor->links('pagination::tailwind') }}
            </div>
        </div>
    </div>

</x-layout>
