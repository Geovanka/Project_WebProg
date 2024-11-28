<x-layout>

    <div class="d-flex justify-content-between align-items-center">
        <h3 class="admintitle">ADMIN DASHBOARD</h3>

        <a href="/showsponsorform" class="btn btn-outline-light addSponsor">
            <small>Add Sponsor</small>
        </a>

        <a href="/" class="btn btn-outline-light addSponsor">
            <small>Logout</small>
        </a>
    </div>

    <div class="container-fluid">
        <div class="row g-0">
            @foreach($sponsor as $s)
                <div class="col-12 col-md-6 col-lg-3 mb-4" style="padding: 0px 15px;">
                    <div class="card bg-transparent adminCard" style="width: 100%;">
                        <img src="{{ asset('storage/'.$s->image) }}" alt="Sponsor Img" class="card-img-top"
                        style="width:100%; height:300px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                        <div class="card-body" style="padding: 20px 15px; font-size: 13px; height: 260px;">
                            <h5 class="card-title">{{ $s->name }}</h5>
                            <p class="card-text">{{ $s->description }}</p>
                            <p class="card-text">{{ $s->email }}</p>
                            <a href="#" class="btn btn-primary" style="color: white;">Edit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
